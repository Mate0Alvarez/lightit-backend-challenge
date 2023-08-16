<?php

namespace Src\Register\Infrastructure\Repositories;

use App\Models\PhoneNumber;
use Illuminate\Support\Facades\Log;
use Src\Register\Domain\Entities\PhoneNumberEntity;
use Src\Shared\Exceptions\DataBaseException;

class PhoneNumberEloquentRepository implements \Src\Register\Domain\Repositories\PhoneNumberRepository
{

    /**
     * @throws DataBaseException
     */
    public function createPhoneNumber(PhoneNumberEntity $phoneNumberEntity): void
    {
        try {
            PhoneNumber::create([
                'phone_number' => $phoneNumberEntity->getPhoneNumber(),
                'patient_id'   => $phoneNumberEntity->getPatientId()
            ]);
        } catch (\Throwable $throwable) {
            Log::error($throwable);
            throw new DataBaseException();
        }
    }
}
