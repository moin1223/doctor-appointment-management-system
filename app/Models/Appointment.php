<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'patient_name',
        'mobile_number',
        'schedule',
        'status',
        'serial_no',
        'doctor_id',

    ];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
