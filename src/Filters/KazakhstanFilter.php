<?php
/**
 * @class KazakhstanFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class KazakhstanFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'kz';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}