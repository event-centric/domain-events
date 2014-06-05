<?php

namespace EventCentric\DomainEvent;

use ArrayAccess;
use Countable;
use Iterator;

interface DomainEvents extends Countable, Iterator, ArrayAccess
{

}
