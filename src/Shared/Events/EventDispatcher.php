<?php

namespace Src\Shared\Events;

use Illuminate\Support\Facades\Log;

class EventDispatcher implements EventDispatch
{
    public function handle(string $event, ?object $param): void
    {
        try {
            event(new $event($param));
        } catch (\Throwable $throwable) {
            Log::error($throwable);
        }
    }
}
