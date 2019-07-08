<?php
declare(strict_types = 1);


class CeilCollection implements IteratorAggregate, Countable
{
    /**
     * @var Ceil[]
     */
    private $items = [];

    /**
     * CeilCollection constructor.
     * @param Ceil[]
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @param int $position
     * @return Ceil
     * @throws RuntimeException
     */
    public function getCeil(int $position): Ceil
    {
        foreach ($this as $item) {
            if ($item->getPosition() === $position) {
                return $item;
            }
        }
        throw new RuntimeException("invalid ceil position {$position}");
    }

    /**
     * @param int $numberValue
     * @return Ceil
     * @throws InvalidArgumentException
     */
    public function getCeilByNumberValue(int $numberValue): Ceil
    {
        foreach ($this as $item) {
            $number = $item->getNumber();
            if ($number !== null && $number->getValue() === $numberValue) {
                return $item;
            }
        }
        throw new InvalidArgumentException("invalid numberValue {$numberValue}");
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return Ceil[]|Traversable
     */
    public function getIterator(): Traversable
    {
        yield from $this->items;
    }
}