<?php

namespace Src\Register\Domain\Entities;

class EmailEntity
{
    public function __construct(
        private readonly string $email,
        private readonly int $patientId
    ){}

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getPatientId(): int
    {
        return $this->patientId;
    }
}
