<?php

namespace Src\Register\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Src\Register\Application\DTO\CreatePatientDTO;
use Src\Register\Application\UseCases\CreatePatientUseCase;
use Src\Register\Domain\Exceptions\InvalidEmailException;
use Src\Register\Domain\Repositories\DocumentFileRepository;
use Src\Register\Domain\Repositories\EmailRepository;
use Src\Register\Domain\Repositories\PatientRepository;
use Src\Register\Domain\Repositories\PhoneNumberRepository;
use Src\Register\Infrastructure\Requests\CreatePatientRequest;
use Src\Shared\Enums\HttpResponseCodesEnum;
use Src\Shared\Events\EventDispatch;
use Src\Shared\Services\FileStorageService\Contracts\FileStorageServiceManagement;

class CreatePatientController extends Controller
{
    public function __construct(
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
    public function __invoke(CreatePatientRequest $request): \Illuminate\Http\JsonResponse
    {
        $dto = new CreatePatientDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('phone_number'),
            $request->file('document_file')
        );

        $createPatientUseCase = new CreatePatientUseCase(
            $dto,
            $this->patientRepository,
            $this->emailRepository,
            $this->phoneNumberRepository,
            $this->documentRepository,
            $this->storageService,
            $this->dispatch
        );

        $patient = $createPatientUseCase();

        return response()->json([
            'patient_id' => $patient->getId()
        ],HttpResponseCodesEnum::HTTP_CREATED);
    }
}
