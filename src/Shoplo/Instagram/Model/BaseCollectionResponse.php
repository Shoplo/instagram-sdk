<?php

declare(strict_types=1);

namespace Shoplo\Instagram\Model;

class BaseCollectionResponse implements \IteratorAggregate
{
    /**
     * @var string[]
     */
    public $paging;

    /**
     * @var BaseModelResponse[]
     */
    public $items;

    public function addItem($obj, $key = null): void
    {
        if ($key === null) {
            $this->items[] = $obj;
        } else {
            if (isset($this->items[$key])) {
                throw new \Exception("Key $key already in use.");
            }
            $this->items[$key] = $obj;
        }
    }

    public function deleteItem($key): void
    {
        if (isset($this->items[$key])) {
            unset($this->items[$key]);
        }
        throw new \Exception("Invalid key $key.");
    }

    public function getItem($key)
    {
        if (isset($this->items[$key])) {
            return $this->items[$key];
        }
        throw new \Exception("Invalid key $key.");
    }

    public function keys(): array
    {
        return \array_keys($this->items);
    }

    public function length(): int
    {
        return \count($this->items);
    }

    public function keyExists($key): bool
    {
        return isset($this->items[$key]);
    }

    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->items);
    }
}
