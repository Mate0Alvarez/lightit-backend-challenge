<?php

namespace Src\Register\Application\DTO;

use Illuminate\Http\UploadedFile;

class CreatePatientDTO
{
    public function __construct(
        private readonly string       $name,
        private readonly string       $email,
        private readonly string       $phoneNumber,
        private readonly UploadedFile $documentImage
    )
    {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return UploadedFile
     */
    public function getDocumentImage(): UploadedFile
    {
        return $this->documentImage;
    }
}
