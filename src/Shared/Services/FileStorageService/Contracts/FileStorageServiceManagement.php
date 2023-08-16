<?php

namespace Src\Shared\Services\FileStorageService\Contracts;

use Illuminate\Http\UploadedFile;

interface FileStorageServiceManagement
{
    public function storeImage(UploadedFile $imageFile, string $directory = 'images'): string;
}
