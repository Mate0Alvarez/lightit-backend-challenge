<?php

namespace Src\Shared\Events;

interface EventDispatch
{
    public function handle(string $event, object $param): void;
}
