<?php
/**
 * @class IsDayOff
 * @package isDayOff\Client
 */

namespace isDayOff\Client;

use isDayOff\Collections\FiltersCollection;
use isDayOff\Services\DateService;

class IsDayOff
{
    /**
     * @var DateService
     */
    private $date;

    /**
     * DateService contructor
     */
    public function __construct()
    {
        $this->date = new DateService();
    }

    /**
     * @param FiltersCollection $filters
     * @return DateService
     */
    public function date(?FiltersCollection $filters = null): DateService
    {
        if($filters)
        {
            $this->date->setFilters($filters);
        }

        return $this->date;
    }
}