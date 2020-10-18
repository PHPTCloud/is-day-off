<?php
/**
 * @class BelorusFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class BelorusFilter extends CountryFilter
{
    /**
     * @var string
     */
    public const PARAM_VALUE = 'by';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue(self::PARAM_VALUE);
    }
}