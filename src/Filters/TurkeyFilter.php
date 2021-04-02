<?php
/**
 * @class TurkeyFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class TurkeyFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'tr';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}