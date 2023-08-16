<?php

namespace Src\Register\Infrastructure\Repositories;

use App\Models\Email;
use Illuminate\Support\Facades\Log;
use Src\Register\Domain\Entities\EmailEntity;
use Src\Shared\Exceptions\DataBaseException;

class EmailEloquentRepository implements \Src\Register\Domain\Repositories\EmailRepository
{
    /**
     * @throws DataBaseException
     */
    public function createEmail(EmailEntity $emailEntity): void
    {
        try {
            Email::create([
                'email' => $emailEntity->getEmail(),
                'patient_id' => $emailEntity->getPatientId()
            ]);
        } catch (\Throwable $throwable) {
            Log::error($throwable);
            throw new DataBaseException();
        }
    }

    public function exist(string $email): bool
    {
        try {
            Email::where('email', $email)->firstOrFail();
            return true;
        } catch (\Throwable $throwable) {
            return false;
        }
    }
}
