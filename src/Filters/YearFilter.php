<?php
/**
 * @class YearFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

class YearFilter extends AbstractFilter
{
    /**
     * @var string
     */
    public const PARAM_NAME = 'year';
    
    /**
     * CountryFilter constructor
     */
    public function __construct($value = '')
    {
        $this->paramName = self::PARAM_NAME;
        $this->setValue($value);
    }
}