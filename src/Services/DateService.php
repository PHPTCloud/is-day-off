<?php
/**
 * @class DateService
 * @package isDayOff\Services
 */

namespace isDayOff\Services;

use DateTime;
use Exception;
use isDayOff\Client\Request;
use isDayOff\Collections\DaysCollection;
use isDayOff\Collections\FiltersCollection;
use isDayOff\Filters\LeapYearFilter;
use isDayOff\Filters\MonthFilter;
use isDayOff\Filters\YearFilter;
use isDayOff\Models\DayModel;

class DateService
{
    /**
     * @var string
     */
    public const FORMAT = 'Ymd';

    /**
     * @var Request
     */
    private $request;

    /**
     * @var FiltersCollection
     */
    private $filters;

    /**
     * @param FiltersCollection $filters
     * @return this
     */
    public function setFilters(?FiltersCollection $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    /**
     * DateService constructor
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->filters = new FiltersCollection();
    }

    /**
     * @return FiltersCollection
     */
    public function filters(): ?FiltersCollection
    {
        return $this->filters;
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function isDayOff(DateTime $date): bool
    {
        $date = $date->format(self::FORMAT);
        try
        {
            $response = $this->request->get(
                '/' . $date,
                $this->getQueryParamsFromFilterCollection()
            );
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }

        return (bool) $response->getBody()->getContents();
    }

    /**
     * @param DateTime $date
     * @return bool
     */
    public function isLeapYear(DateTime $date): bool
    {
        $date = $date->format('Y');

        try
        {
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
        }
        catch(Exception $e)
        {
            print_r($e->getMessage());
        }
    }

    /**
     * @param DateTime $date
     * @return DaysCollection
     */
    public function getDataPerMonth(DateTime $date): DaysCollection
    {
        $collection = new DaysCollection();
        $year = $date->format('Y');
        $month = $date->format('m');

        $yearFilter = new YearFilter($year);
        $monthFilter = new MonthFilter($month);
        $this->filters()->add([$yearFilter, $monthFilter]);

        $response = $this->request->get(
            '/api/getdata',
            $this->getQueryParamsFromFilterCollection()
        );

        $this->filters()->removeModel($yearFilter);
        $this->filters()->removeModel($monthFilter);

        $days = str_split($response->getBody()->getContents());
        for($i = 0; $i < count($days); $i++)
        {
            $dayNumber = $i + 1;
            $day = new DayModel();
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

        if($this->filters)
        {
            foreach($this->filters->all() as $filter)
            {
                $queryParams[$filter->getParamName()] = $filter->getValue();
            }
        }

        return $queryParams;
    }
}