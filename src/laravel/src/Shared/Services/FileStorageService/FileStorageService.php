<?php

namespace Src\Shared\Services\FileStorageService;

use Illuminate\Http\UploadedFile;

class FileStorageService implements \Src\Shared\Services\FileStorageService\Contracts\FileStorageServiceManagement
{

    public function storeImage(UploadedFile $imageFile, string $directory = 'images'): string
    {
        $fileName = uniqid() . '_' . $imageFile->getClientOriginalName();

        return $imageFile->storeAs($directory, $fileName, 'public');
    }
}
