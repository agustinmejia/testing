<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// Models
use App\Models\Cita;
use App\Models\Paciente;

class CitasController extends Controller
{

    public function store(Request $request){
        DB::beginTransaction();
        try {
            $paciente = Paciente::where('ci', $request->ci)->first();
            if(!$paciente){
                $paciente = Paciente::create([
                    'nombre_completo' => $request->nombre_completo,
                    'ci' => $request->ci,
                    'genero' => $request->nombre_completo,
                    'celular' => $request->celular,
                ]);
            }
            Cita::create([
                'doctor_id' => $request->doctor_id,
                'paciente_id' => $paciente->id,
                'turno_id' => $request->turno_id,
                'fecha' => $request->fecha,
                'descripcion' => $request->descripcion
            ]);

            DB::commit();

            return response()->json(['success' => 1]);
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
            return response()->json(['error' => 1]);
        }
    }

    public function read($id){
        $cita = Cita::find($id);
        return view('citas.read', compact('cita'));
    }
}
