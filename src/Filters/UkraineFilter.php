<?php
/**
 * @class UkraineFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class UkraineFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'ua';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}