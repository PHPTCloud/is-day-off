<?php
/**
 * @class PreHolidayFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class PreHolidayFilter extends AbstractFilter
{
    /**
     * @var string
     */
    public const PARAM_NAME = 'pre';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '0')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue($value);
    }
}