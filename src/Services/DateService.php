<?php

declare(strict_types=1);

namespace isDayOff\Services;

use DateTime;
use Exception;
use isDayOff\Client\Request;
use isDayOff\Collections\DaysCollection;
use isDayOff\Collections\FiltersCollection;
use IsDayOff\Exception\IsDayOffException;
use isDayOff\Filters\MonthFilter;
use isDayOff\Filters\YearFilter;
use isDayOff\Models\DayModel;

/**
 * @class   DateService
 * @package isDayOff\Services
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
class DateService
{
    public const FORMAT = 'Ymd';

    private Request $request;
    private FiltersCollection $filters;

    /**
     * @param FiltersCollection|null $filters
     * 
     * @return self
     */
    public function setFilters(?FiltersCollection $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function __construct()
    {
        $this->request = new Request();
        $this->filters = new FiltersCollection();
    }

    /**
     * @return FiltersCollection|null
     */
    public function filters(): ?FiltersCollection
    {
        return $this->filters;
    }

    /**
     * @param DateTime $date
     * 
     * @return bool
     * 
     * @throws IsDayOffException
     */
    public function isDayOff(DateTime $date): bool
    {
        try {
            $date     = $date->format(self::FORMAT);
            $response = $this->request->get(
                '/' . $date,
                $this->getQueryParamsFromFilterCollection()
            );

            return (bool)$response->getBody()->getContents();
        } catch (Exception $e) {
            throw new IsDayOffException($e->getMessage());
        } 
    }

    /**
     * @return bool
     * 
     * @throws IsDayOffException
     */
    public function tomorrow(): bool
    {
        try {
            $resposen = $this->request->get('/' . DayModel::TOMORROW_ALIAS);
        } catch (Exception $e) {
            throw new IsDayOffException($e->getMessage());
        }

        return (bool) $resposen->getBody()->getContents();
    }

    /**
     * @return bool
     * 
     * @throws IsDayOffException
     */
    public function today(): bool
    {
        try {
            $resposen = $this->request->get('/' . DayModel::TODAY_ALIAS);
        } catch (Exception $e) {
            throw new IsDayOffException($e->getMessage());
        }

        return (bool) $resposen->getBody()->getContents();
    }

    /**
     * @param DateTime $date
     * 
     * @return bool
     * 
     * @throws IsDayOffException
     */
    public function isLeapYear(DateTime $date): bool
    {
        $date = $date->format('Y');

        try {
            $filter = new YearFilter($date);
            $this->filters()->addOne($filter);

            $response = $this->request->get(
                '/api/isleap',
                $this->getQueryParamsFromFilterCollection()
            );
            $this->filters()->removeModel($filter);

            return (bool) ($response->getBody()->getContents())
                ? true
                : false;
        } catch(Exception $e) {
            throw new IsDayOffException($e->getMessage());
        }
    }

    /**
     * @param DateTime $date
     * 
     * @return DaysCollection
     */
    public function getDataPerMonth(DateTime $date): DaysCollection
    {
        $collection  = new DaysCollection();
        $year        = $date->format('Y');
        $month       = $date->format('m');
        $yearFilter  = new YearFilter($year);
        $monthFilter = new MonthFilter($month);
        $this->filters()->add([$yearFilter, $monthFilter]);

        $response = $this->request->get(
            '/api/getdata',
            $this->getQueryParamsFromFilterCollection()
        );

        $this->filters()->removeModel($yearFilter);
        $this->filters()->removeModel($monthFilter);

        $days = str_split($response->getBody()->getContents());
        for($i = 0; $i < count($days); $i++) {
            $dayNumber = $i + 1;
            $day       = new DayModel();
            $day->setStatus((bool) $days[$i]);
            $day->setDate(new DateTime("$year/$month/$dayNumber"));
            $collection->addOne($day);
        }

        return $collection;
    }

    /**
     * @return array
     */
    protected function getQueryParamsFromFilterCollection()
    {
        $queryParams = [];
        if($this->filters) {
            foreach($this->filters->all() as $filter) {
                $queryParams[$filter->getParamName()] = $filter->getValue();
            }
        }

        return $queryParams;
    }
}