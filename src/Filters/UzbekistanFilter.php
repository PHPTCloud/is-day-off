<?php
/**
 * @class UzbekistanFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class UzbekistanFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'uz';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}