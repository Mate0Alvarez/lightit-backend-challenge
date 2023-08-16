<?php

namespace Src\Register\Domain\Repositories;

use Src\Register\Domain\Entities\PatientEntity;

interface PatientRepository
{
    public function createPatient(PatientEntity $patient): PatientEntity;
}
