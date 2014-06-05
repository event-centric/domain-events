<?php

namespace EventCentric\DomainEvents\Implementations;

use EventCentric\DomainEvents\DomainEvent;
use EventCentric\DomainEvents\DomainEvents;
use EventCentric\DomainEvents\DomainEventsAreImmutable;

final class DomainEventsArray implements DomainEvents
{
    private $events = [];
    public function __construct(array $domainEvents)
    {
        foreach ($domainEvents as $domainEvent) {
            if (!$domainEvent instanceof DomainEvent) {
                throw new \InvalidArgumentException("DomainEvent expected");
            }
            $this->events[] = $domainEvent;
        }
    }

    /**
     * @return int
     */
    final public function count()
    {
        return count($this->events);
    }

    /**
     * @return DomainEvent
     */
    final public function current()
    {
        return current($this->events);
    }

    /**
     * @return int
     */
    final public function key()
    {
        return key($this->events);
    }

    /**
     * @return void
     */
    final public function next()
    {
        next($this->events);
    }

    /**
     * @return void
     */
    final public function rewind()
    {
        reset($this->events);
    }

    /**
     * @return bool
     */
    final public function valid()
    {
        return null !== key($this->events);
    }

    /**
     * @param int $offset
     * @return bool
     */
    final public function offsetExists($offset)
    {
        return null !==$this->events[$offset];
    }

    /**
     * @param int $offset
     * @return DomainEvent
     */
    final public function offsetGet($offset)
    {
        return $this->events[$offset];
    }

    /**
     * @throws DomainEventsAreImmutable
     */
    final public function offsetSet($offset, $value)
    {
        throw new DomainEventsAreImmutable();
    }

    /**
     * @throws DomainEventsAreImmutable
     */
    final public function offsetUnset($offset)
    {
        throw new DomainEventsAreImmutable();
    }

    public function map(Callable $callback)
    {
        array_map($callback, $this->events);
    }
}