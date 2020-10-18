<?php
/**
 * @class CountryFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class CountryFilter extends AbstractFilter
{
    /**
     * @var string
     */
    public const PARAM_NAME = 'cc';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue($value);
    }
}