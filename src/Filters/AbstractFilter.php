<?php
/**
 * @class CountryFilter
 * @package isDayOff\Filters
 */

namespace isDayOff\Filters;

abstract class AbstractFilter
{
    /**
     * @var string
     */
    protected $paramName;

    /**
     * @var string
     */
    protected $value;

    /**
     * @return string
     */
    public function getParamName(): ?string
    {
        return $this->paramName;
    }

    /**
     * @param string $paramName
     * @return this
     */
    public function setParamName(string $paramName): self
    {
        $this->paramName = $paramName;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return this
     */
    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }
}