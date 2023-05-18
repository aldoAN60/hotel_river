<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use App\Models\pendiente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PendientesController extends Controller
{
    public function guardar_pendiente(Request $request){
        $datos = new pendiente;
        $datos->turno = $request->input('turno');
        $datos->user_id = auth()->user()->id;
        
        $datos->prioridad = $request->input('prioridad');
        $datos->departamento_id = $request->input('departamento');
        $datos->pendiente = $request->input('pendiente');
        $datos->save();

        return back();
    }
    public function mostrar_pendientes(){

    $confirmacion_pendientes = pendiente::all();
    $pendientes = DB::table('vista_pendientes')->orderByDesc('fecha_de_creacion')->paginate(4);
    $departamentos = departamento::all();
    return view('pendientes', compact('pendientes','departamentos', 'confirmacion_pendientes'));
    }

    public function actualizar_pendiente($id){
        $pendiente = pendiente::find($id);
        $pendiente->status = "RESULETO";
        $pendiente->save();
        return back()->with('actualizado','Pendiente actualizado');
        // return response()->json(['success' => true]);
    }
    public function eliminar_pendiente(pendiente $pendiente){
        $pendiente->delete();
        return redirect()->back();
    }

    public function busqueda_pendiente(Request $request){
        $busqueda = $request->input('id_buscar');
        $pendientes = (new pendiente())->buscar_pendiente($busqueda);
        
        // dd($pendientes);
        return view('pendientes',compact('pendientes','busqueda'));

    }
}
