<?php

namespace Src\Register\Application\UseCases;

use Src\Register\Application\DTO\CreatePatientDTO;
use Src\Register\Domain\Entities\DocumentFileEntity;
use Src\Register\Domain\Entities\EmailEntity;
use Src\Register\Domain\Entities\PatientEntity;
use Src\Register\Domain\Entities\PhoneNumberEntity;
use Src\Register\Domain\Events\NewPatientCreatedEvent;
use Src\Register\Domain\Exceptions\InvalidEmailException;
use Src\Register\Domain\Repositories\DocumentFileRepository;
use Src\Register\Domain\Repositories\EmailRepository;
use Src\Register\Domain\Repositories\PatientRepository;
use Src\Register\Domain\Repositories\PhoneNumberRepository;
use Src\Shared\Events\EventDispatch;
use Src\Shared\Services\FileStorageService\Contracts\FileStorageServiceManagement;

class CreatePatientUseCase
{
    public function __construct(
        private readonly CreatePatientDTO             $dto,
        private readonly PatientRepository            $patientRepository,
        private readonly EmailRepository              $emailRepository,
        private readonly PhoneNumberRepository        $phoneNumberRepository,
        private readonly DocumentFileRepository       $documentRepository,
        private readonly FileStorageServiceManagement $storageService,
        private readonly EventDispatch                $dispatch,
    )
    {}

    /**
     * @throws InvalidEmailException
     */
    public function __invoke(): PatientEntity
    {
        $this->validateEmail();

        $patient = $this->patientRepository->createPatient(
                        new PatientEntity(
                            $this->dto->getName()
                        )
                    );

        $this->emailRepository->createEmail(
            new EmailEntity(
                $this->dto->getEmail(),
                $patient->getId()
            )
        );
        $patient->setEmail($this->dto->getEmail());

        $this->phoneNumberRepository->createPhoneNumber(
            new PhoneNumberEntity(
                $this->dto->getPhoneNumber(),
                $patient->getId()
            )
        );
        $patient->setPhoneNumber($this->dto->getPhoneNumber());

        $imagePath = $this->storageService->storeImage($this->dto->getDocumentImage());

        $this->documentRepository->createDocumentFile(
            new DocumentFileEntity(
                $imagePath,
                $patient->getId()
            )
        );

        $this->dispatch->handle(NewPatientCreatedEvent::class, $patient);

        return $patient;
    }

    /**
     * @throws InvalidEmailException
     */
    private function validateEmail(): void
    {
        if ($this->emailRepository->exist($this->dto->getEmail()))
        {
            throw new InvalidEmailException();
        }
    }
}
