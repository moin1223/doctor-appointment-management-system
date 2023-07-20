<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Appointment;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'specialist',
        'mobile_number',
        'keyword',
        'schedule_1',
        'schedule_2',
        'serial_limit',
        'serial',  
    ];
    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }
}
