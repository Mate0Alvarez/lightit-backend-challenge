<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function email(): HasOne
    {
        return $this->hasOne(Email::class, 'patient_id');
    }

    public function documentFile(): HasOne
    {
        return $this->hasOne(DocumentFile::class, 'patient_id');
    }

    public function phoneNumber(): HasOne
    {
        return $this->hasOne(PhoneNumber::class, 'patient_id');
    }
}
