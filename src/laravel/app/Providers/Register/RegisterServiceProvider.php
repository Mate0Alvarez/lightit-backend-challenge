<?php

namespace App\Providers\Register;

use App\Models\Email;
use App\Models\Patient;
use Src\Register\Domain\Entities\PatientEntity;
use Src\Register\Domain\Events\NewPatientCreatedEvent;
use Src\Register\Domain\Repositories\DocumentFileRepository;
use Src\Register\Domain\Repositories\EmailRepository;
use Src\Register\Domain\Repositories\PatientRepository;
use Src\Register\Domain\Repositories\PhoneNumberRepository;
use Src\Register\Infrastructure\Repositories\DocumentFileEloquentRepository;
use Src\Register\Infrastructure\Repositories\EmailEloquentRepository;
use Src\Register\Infrastructure\Repositories\PatientEloquentRepository;
use Src\Register\Infrastructure\Repositories\PhoneNumberEloquentRepository;

class RegisterServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(PatientRepository::class, PatientEloquentRepository::class);
        $this->app->bind(EmailRepository::class, EmailEloquentRepository::class);
        $this->app->bind(PhoneNumberRepository::class, PhoneNumberEloquentRepository::class);
        $this->app->bind(DocumentFileRepository::class, DocumentFileEloquentRepository::class);
    }
}
