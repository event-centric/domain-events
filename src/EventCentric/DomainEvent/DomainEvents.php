<?php

namespace EventCentric\DomainEvent;

use ArrayObject;

final class DomainEvents extends ArrayObject
{
    public function __construct(array $domainEvents)
    {
        foreach($domainEvents as $domainEvent) {
            if(!$domainEvent instanceof DomainEvent) {
                throw new \InvalidArgumentException("DomainEvent expected");
            }
            $this[] = $domainEvent;
        }
    }
}