<?php

namespace App\Models;

use App\Enums\TrainingType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'organization',
        'training_type',
        'preferred_date',
        'additional_details',
        'status',
    ];

    protected $casts = [
        'training_type' => TrainingType::class,
        'status' => BookingStatus::class,
        'preferred_date' => 'date',
    ];
}
