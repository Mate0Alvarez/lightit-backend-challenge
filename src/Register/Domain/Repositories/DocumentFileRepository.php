<?php

namespace Src\Register\Domain\Repositories;

use Src\Register\Domain\Entities\DocumentFileEntity;

interface DocumentFileRepository
{
    public function createDocumentFile(DocumentFileEntity $documentFileEntity): void;
}
