<?php

declare(strict_types=1);

namespace isDayOff\Filters;

/**
 * @class   CountryFilter
 * @package isDayOff\Filters
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
class CountryFilter extends AbstractFilter
{
    public const PARAM_NAME = 'cc[]';
    public const PARAM_VALUE = null;

    /**
     * @param string $value
     */
    public function __construct(string $value = null)
    {
        parent::__construct($value ?? static::PARAM_VALUE);
    }
}