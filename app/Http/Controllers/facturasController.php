<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use App\Models\metodo_pago;
use App\Models\seguimiento_factura;
use App\Models\tipo_reservacion;
use App\Models\User;
use App\Models\vista_factura;
use Illuminate\Http\Request;

class facturasController extends Controller
{   

    protected $metodo_pago;
    protected $tipo_reservacion;
    protected $usuario_id;
    protected $usuario_nombre;
    protected $usuarios;
    protected $vista_facturas;
    public function __construct(){

        $this->metodo_pago = metodo_pago::all();
        $this->tipo_reservacion = tipo_reservacion::all();
        $this->vista_facturas = vista_factura::orderBy('fecha_creacion','desc')->paginate(4);
        $this->usuarios = User::all();
        // $this->usuario_id = auth()->user()->id;
        // $this->usuario_nombre = auth()->user()->name;
    }
    public function index(){
        $usuario_id = auth()->user()->id;
        $usuario_nombre = auth()->user()->name;
        return view('facturas', [
            'metodos_pago' => $this->metodo_pago,
        'tipo_reservaciones' => $this->tipo_reservacion,
        'usuario_id' => $usuario_id,
        'usuario_nombre' => $usuario_nombre,
        'facturas' => $this->vista_facturas,
        'usuarios' => $this->usuarios,
        ]);
    }
    public function create(Request $request){
        $datos = new seguimiento_factura;
        $datos->habitacion = $request->input('habitacion');
        $datos->nombre = $request->input('nombre');
        $datos->telefono = $request->input('telefono');
        $datos->RFC = $request->input('RFC') ?? 'XAXX010101123';
        $datos->razon_social = $request->input('razon_social') ?? 'PUBLICO EN GENERAL';
        $datos->numero_noches = $request->input('numero_noches') ?? 1;
        $datos->id_tipo_reservacion = $request->input('tipo_reservacion');        
        $datos->id_metodo_pago = $request->input('metodo_pago');
        $datos->ult_4_digitos = $request->input('ult_4_digitos') ?? 'NA';
        $datos->tarifa = $request->input('tarifa');
        $datos->tarifa_sin_imp = $request->input('tarifa_sin_imp');
        $datos->status = $request->input('status') ?? 'NO FACTURA';
        $datos->id_usuario_captura = $request->input('id_usuario_captura');
        $datos->id_usuario_timbra = $request->input('id_usuario_timbra');
        $datos->correo = $request->input('correo') ?? 'SIN CORREO';
        $datos->save();
        return redirect()->route('facturas.index');
    }

    public function update($id, Request $request){
        $factura = seguimiento_factura::find($id);
        $factura->RFC = $request->input('RFC_act');
        $factura->razon_social = $request->input('razon_social_act');
        $factura->folio_factura = $request->input('folio_act');
        $factura->id_usuario_timbra = $request->input('id_usuario_timbra');
        $factura->status = 'FACTURADO';
        $factura->save();
        return back();

    }
    public function destroy(seguimiento_factura $factura){
        $factura->delete();
        return redirect()->back();
    }
    public function busqueda_factura(Request $request){
        $query = vista_factura::query();
        if ($request->filled('habitacion')) {
            $query->where('habitacion', $request->habitacion);
        }
    
        if ($request->filled('huesped')) {
            $query->where('huesped', $request->huesped);
        }
    
        if ($request->filled('tipo_reservacion') && $request->tipo_reservacion !== 'Tipo') {
            $query->where('nombre', $request->tipo_reservacion);
        }
    
        if ($request->filled('RFC')) {
            $query->where('RFC', $request->RFC);
        }
    
        if ($request->filled('razon_social')) {
            $query->where('razon_social', $request->razon_social);
        }
    
        if ($request->filled('metodo_pago') && $request->metodo_pago !== 'Metodo de pago') {
            $query->where('metodo', $request->metodo_pago);
        }
    
        if ($request->filled('usuario_captura') && $request->usuario_captura !== 'usuario') {
            $query->where('usuario_captura', $request->usuario_captura);
        }
    
        if ($request->filled('usuario_timbra') && $request->usuario_timbra !== 'usuario') {
            $query->where('usuario_timbra', $request->usuario_timbra);
        }
    
        if ($request->filled('status') && $request->status !== 'Estatus') {
            $query->where('status', $request->status);
        }
    
        if ($request->filled('folio')) {
            $query->where('folio_factura', $request->folio);
        }
        
        
        $facturas = $query->orderByDesc('fecha_creacion')->paginate(4);      

        $usuario_id = auth()->user()->id;
        $usuario_nombre = auth()->user()->name;
        
        return view('facturas', [
            'metodos_pago' => $this->metodo_pago,
        'tipo_reservaciones' => $this->tipo_reservacion,
        'usuario_id' => $usuario_id,
        'usuario_nombre' => $usuario_nombre,
        'facturas' => $facturas,
        'usuarios' => $this->usuarios,
        ]); 
    }
    
}
