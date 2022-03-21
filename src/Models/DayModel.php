<?php

declare(strict_types=1);

namespace isDayOff\Models;

use DateTime;

/**
 * @class   DayModel
 * @package isDayOff\Models
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
class DayModel
{
    public const TODAY_ALIAS = 'today';
    public const TOMORROW_ALIAS = 'tomorrow';

    private ?DateTime $date;

    /**
     * is day off status
     * 
     * @var bool
     */
    private $status;

    /**
     * @deprecated
     * @param string $format
     * 
     * @return string|DateTime|null
     */
    public function getDate(?string $format = null)
    {
        $date = $this->date;
        if($format) {
            $date = $date->format($format);
        }

        return $date;
    }

    /**
     * @return DateTime|null
     */
    public function getDateTime(): ?DateTime
    {
        return $this->date;
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
     * 
     * @return this
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}