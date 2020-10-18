<?php
/**
 * @class AbstractCollection
 * @package isDayOff\Collections
 */

namespace isDayOff\Collections;

abstract class AbstractCollection
{
    /**
     * @var array
     */
    protected $items;

    /**
     * @param array $items
     * @return this
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
     * @param array
     * @return this
     */
    public function add(array $models): self
    {
        $this->items = array_merge($this->items, $models);
        return $this;
    }

    /**
     * @param mixed
     * @return this
     */
    public function addOne($model): self
    {
        array_push($this->items, $model);
        return $this;
    }

    /**
     * @param integer
     * @return this
     */
    public function remove($index): self
    {
        if (isset($this->items[$index])) {
            unset($this->items[$index]);
        }

        return $this;
    }

    /**
     * @param mixed
     * @return this
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