<?php
/**
 * @class MonthFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class MonthFilter extends AbstractFilter
{
    /**
     * @var string
     */
    public const PARAM_NAME = 'month';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue($value);
    }
}