<?php

namespace Src\Register\Application\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Src\Register\Domain\Emails\WelcomeEmail;
use Src\Register\Domain\Events\NewPatientCreatedEvent;
use Src\Shared\Services\MailService\Contracts\MailServiceManagement;
use Src\Shared\Services\MailService\Entities\MailServiceEntity;

class NotifyPatientCreated implements ShouldQueue
{
    public function __construct(
        private readonly MailServiceManagement $mailService,
    )
    {}

    public function handle(NewPatientCreatedEvent $event): void
    {
        $patient = $event->getPatient();

        $this->mailService->send(
            new MailServiceEntity(
                $patient->getEmail(),
                new WelcomeEmail($patient)
            )
        );

        // @TODO send sms
    }
}
