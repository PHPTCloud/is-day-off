<?php

declare(strict_types=1);

namespace isDayOff\Collections;

/**
 * @class   AbstractCollection
 * @package isDayOff\Collections
 * @author  Aleksey Yudov <tcloud.ax@gmail.com>
 * @since   v1.0.1
 */
abstract class AbstractCollection
{
    protected array $items;

    /**
     * @param array $items
     */
    public function __construct(?array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * @return mixed|array
     */
    public function first()
    {
        return (isset($this->items[0]))
            ? $this->items[0]
            : $this->items;
    }

    /**
     * @return mixed|array
     */
    public function last()
    {
        return (isset($this->items[count($this->items) - 1]))
            ? $this->items[count($this->items) - 1]
            : $this->items;
    }

    /**
     * @param array $models
     * 
     * @return self
     */
    public function add(array $models): self
    {
        $this->items = array_merge($this->items, $models);
        return $this;
    }

    /**
     * @param mixed
     * 
     * @return self
     */
    public function addOne($model): self
    {
        array_push($this->items, $model);
        return $this;
    }

    /**
     * @param int $index
     * 
     * @return self
     */
    public function remove($index): self
    {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
        }

        return $this;
    }

    /**
     * @param mixed $model
     * 
     * @return self
     */
    public function removeModel($model): self
    {
        foreach ($this->items as $index => $item) {
            if ($item === $model) {
                unset($this->items[$index]);
            }
        }

        return $this;
    }
}