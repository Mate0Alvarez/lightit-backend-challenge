<?php

namespace Src\Register\Infrastructure\Repositories;

use App\Models\DocumentFile;
use Illuminate\Support\Facades\Log;
use Src\Register\Domain\Entities\DocumentFileEntity;
use Src\Shared\Exceptions\DataBaseException;

class DocumentFileEloquentRepository implements \Src\Register\Domain\Repositories\DocumentFileRepository
{

    /**
     * @throws DataBaseException
     */
    public function createDocumentFile(DocumentFileEntity $documentFileEntity): void
    {
        try {
            DocumentFile::create([
                'path' => $documentFileEntity->getFilePath(),
                'patient_id' => $documentFileEntity->getPatientId()
            ]);
        } catch (\Throwable $throwable) {
            Log::error($throwable);
            throw new DataBaseException();
        }
    }
}
