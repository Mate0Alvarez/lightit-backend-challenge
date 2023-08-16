<?php

namespace App\Providers\Shared;

use Src\Shared\Events\EventDispatch;
use Src\Shared\Events\EventDispatcher;
use Src\Shared\Services\FileStorageService\Contracts\FileStorageServiceManagement;
use Src\Shared\Services\FileStorageService\FileStorageService;
use Src\Shared\Services\MailService\Contracts\MailServiceManagement;
use Src\Shared\Services\MailService\MailService;

class SharedServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MailServiceManagement::class, MailService::class);
        $this->app->bind(FileStorageServiceManagement::class, FileStorageService::class);
        $this->app->bind(EventDispatch::class, EventDispatcher::class);
    }
}
