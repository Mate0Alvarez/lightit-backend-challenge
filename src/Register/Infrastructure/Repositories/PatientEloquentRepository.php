<?php

namespace Src\Register\Infrastructure\Repositories;

use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Src\Register\Domain\Entities\PatientEntity;
use Src\Shared\Exceptions\DataBaseException;

class PatientEloquentRepository implements \Src\Register\Domain\Repositories\PatientRepository
{

    /**
     * @throws DataBaseException
     */
    public function createPatient(PatientEntity $patient): PatientEntity
    {
        try {
            $newPatient = Patient::create([
                'name' => $patient->getName()
            ]);

            $patient->setId($newPatient->id);

            return $patient;
        } catch (\Throwable $throwable) {
            Log::error($throwable);
            throw new DataBaseException();
        }
    }
}
