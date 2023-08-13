<?php

namespace Src\Shared\Events;

class EventDispatcher implements EventDispatch
{
    public function handle(string $event, ?object $param): void
    {
        event(new $event($param));
    }
}
