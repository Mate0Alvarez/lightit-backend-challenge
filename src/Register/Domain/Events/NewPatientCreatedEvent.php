<?php

namespace Src\Register\Domain\Events;

use Src\Register\Domain\Entities\PatientEntity;

final class NewPatientCreatedEvent
{
    public function __construct(
        private PatientEntity $patient
    )
    {}

    /**
     * @return PatientEntity
     */
    public function getPatient(): PatientEntity
    {
        return $this->patient;
    }
}
