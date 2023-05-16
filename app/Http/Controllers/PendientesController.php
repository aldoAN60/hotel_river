<?php

namespace App\Http\Controllers;

use App\Models\pendiente;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PendientesController extends Controller
{
    public function guardar_pendiente(Request $request){
        $datos = new pendiente;
        $datos->turno = $request->input('turno');
        $datos->user_id = auth()->user()->id;
        $datos->pendiente = $request->input('pendiente');
        $datos->prioridad = $request->input('prioridad');
        $datos->departamento = $request->input('departamento');
        $datos->save();

        return back();
    }
    public function mostrar_pendientes(){
    $pendientes = pendiente::orderBy('created_at','desc')->paginate(4);

    return view('pendientes', compact('pendientes'));
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
