<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];

    public function paciente(){
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}