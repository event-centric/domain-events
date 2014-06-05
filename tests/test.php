<?php

require_once __DIR__.'/../vendor/autoload.php';
use EventCentric\DomainEvents\DomainEvent;
use EventCentric\DomainEvents\DomainEventsAreImmutable;
use EventCentric\DomainEvents\Implementations\DomainEventsArray;

final class SomethingHasHappened implements DomainEvent
{
}

$events = new DomainEventsArray([
    new SomethingHasHappened,
    new SomethingHasHappened,
]);

$caught = false;
try { $events[] = new SomethingHasHappened();}
catch(DomainEventsAreImmutable $e) {$caught = true;}
assert($caught);

