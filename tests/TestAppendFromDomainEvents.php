<?php

use EventCentric\DomainEvents\DomainEvent;
use EventCentric\DomainEvents\DomainEvents;

final class TestAppendFromDomainEvents implements DomainEvents
{
    private $dummyEvents = [];
    public function __construct(array $domainEvents)
    {
        foreach ($domainEvents as $domainEvent) {
            if (!$domainEvent instanceof DomainEvent) {
                throw new \InvalidArgumentException("DomainEvent expected");
            }
            $this->dummyEvents[] = $domainEvent;
        }
    }

    public function append(DomainEvents $other)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    final public function count()
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    final public function current()
    {
        return current($this->dummyEvents);
    }

    final public function key()
    {
        return key($this->dummyEvents);
    }

    final public function next()
    {
        next($this->dummyEvents);
    }

    final public function rewind()
    {
        reset($this->dummyEvents);
    }

    final public function valid()
    {
        return null !== key($this->dummyEvents);
    }

    final public function offsetExists($offset)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    final public function offsetGet($offset)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    final public function offsetSet($offset, $value)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    final public function offsetUnset($offset)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }

    public function map(Callable $callback)
    {
        throw new \RuntimeException('Method is not expected to be called.');
    }
}
