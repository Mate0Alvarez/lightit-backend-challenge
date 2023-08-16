<?php

namespace Src\Register\Domain\Entities;

class DocumentFileEntity
{
    public function __construct(
        private readonly string $filePath,
        private readonly int $patientId
    )
    {}

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * @return int
     */
    public function getPatientId(): int
    {
        return $this->patientId;
    }
}
