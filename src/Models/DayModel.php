<?php
/**
 * @class DayModel
 * @package isDayOff\Models
 */

namespace isDayOff\Models;

use DateTime;

class DayModel
{
    /**
     * @var DateTime
     */
    private $date;

    /**
     * is day off status
     * 
     * @var bool
     */
    private $status;

    /**
     * @param string $format
     * @return string|DateTime|null
     */
    public function getDate(?string $format = null)
    {
        $date = $this->date;

        if($format)
        {
            $date = $date->format($format);
        }

        return $date;
    }

    /**
     * @param DateTime $date
     * @return this
     */
    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     * @return this
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }
}