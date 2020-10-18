<?php
/**
 * @class RussianFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class RussianFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'ru';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}