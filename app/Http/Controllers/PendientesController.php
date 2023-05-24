<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use App\Models\pendiente;
use App\Models\User;
use App\Models\vista_pendientes;
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
        return $this->mostrar_pendientes();
    }
    public function mostrar_pendientes(){

    $confirmacion_pendientes = pendiente::all();
    $pendientes = DB::table('vista_pendientes')->orderByDesc('fecha_de_creacion')->paginate(4);
    $departamentos = departamento::all();
    $usuarios = User::all();
    return view('pendientes', compact('pendientes','departamentos', 'confirmacion_pendientes','usuarios'));
    }

    public function actualizar_pendiente($id){
        $pendiente = pendiente::find($id);
        $pendiente->status = "RESUELTO";
        $pendiente->save();
        return back()->with('actualizado','Pendiente actualizado');
        // return response()->json(['success' => true]);
    }
    public function eliminar_pendiente(pendiente $pendiente){
        $pendiente->delete();
        return redirect()->back();
    }

    public function busqueda_pendiente(Request $request){
        
        $query = vista_pendientes::query();

        if ($request->has('turno') && $request->turno !== 'Turno') {
            $query->where('turno', $request->turno);
        }
    
        if ($request->has('usuario') && $request->usuario !== 'usuario') {
            $query->where('usuario', $request->usuario);
        }
    
        if ($request->has('prioridad') && $request->prioridad !== 'prioridad') {
            $query->where('prioridad', $request->prioridad);
        }
    
        if ($request->has('departamento_encargado') && $request->departamento_encargado !== 'Elige un departamento') {
            $query->where('departamento_encargado', $request->departamento_encargado);
        }
    
        if ($request->has('estatus') && $request->estatus !== 'Estatus') {
            $query->where('estatus', $request->estatus);
        }
        
        $pendientes = $query->orderByDesc('fecha_de_creacion')->paginate(4);        
        
        //   dump($pendientes);
        
        $departamentos = departamento::all();
        $usuarios = User::all();
        
        return view('pendientes',compact('pendientes','departamentos','usuarios'));
    }
}
