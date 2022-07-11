<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Cita;

class CitasController extends Controller
{
    public function read($id){
        $cita = Cita::find($id);
        return view('citas.read', compact('cita'));
    }
}
