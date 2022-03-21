<?php

declare(strict_types=1);

namespace isDayOff\Filters;

/**
 * @class   AbstractFilter
 * @package isDayOff\Filters
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
abstract class AbstractFilter
{
    public const PARAM_NAME = 'abstract_constant';

    protected ?string $paramName;
    protected ?string $value;

    /**
     * @return string|null
     */
    public function getParamName(): ?string
    {
        return $this->paramName;
    }

    /**
     * @param string $paramName
     * 
     * @return self
     */
    public function setParamName(string $paramName): self
    {
        $this->paramName = $paramName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * 
     * @return self
     */
    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param string $value
     */
    public function __construct(string $value = '')
    {
        $this->paramName = static::PARAM_NAME;
        $this->setValue($value);
    }
}