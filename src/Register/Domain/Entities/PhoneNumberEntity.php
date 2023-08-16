<?php

namespace Src\Register\Domain\Entities;

class PhoneNumberEntity
{
    public function __construct(
        private readonly string $phoneNumber,
        private readonly int $patientId
    )
    {}

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return int
     */
    public function getPatientId(): int
    {
        return $this->patientId;
    }
}
