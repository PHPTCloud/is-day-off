<?php

declare(strict_types=1);

namespace isDayOff\Client;

use isDayOff\Collections\FiltersCollection;
use isDayOff\Services\DateService;

/**
 * @class   IsDayOff
 * @package isDayOff\Client
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
class IsDayOff
{
    private DateService $date;

    public function __construct()
    {
        $this->date = new DateService();
    }

    /**
     * @param FiltersCollection $filters
     * 
     * @return DateService
     */
    public function date(?FiltersCollection $filters = null): DateService
    {
        if($filters) {
            $this->date->setFilters($filters);
        }

        return $this->date;
    }
}