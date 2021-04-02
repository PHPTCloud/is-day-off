<?php
/**
 * @class UnitedStatesFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class UnitedStatesFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'us';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}