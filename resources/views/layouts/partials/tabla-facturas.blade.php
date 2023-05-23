{{-- <table class="table table-sm">
    <thead>
      <tr>
        <th scope="col">habitacion</th>
        <th scope="col">huesped</th>
        <th scope="col">numero de noches</th>
        <th scope="col">tipo de reservacion</th>
        <th scope="col">tarifa</th>
        <th scope="col">tarifa sin impuestos</th>
        <th scope="col">metodo de pago</th>
        <th scope="col">ultimos 4 digitos</th>
        <th scope="col">telefono</th>
        <th scope="col">RFC</th>
        <th scope="col">razon social</th>
        <th scope="col">estatus</th>
        <th scope="col">usuario que capturo</th>
        <th scope="col">usuario que timbra</th>
        <th scope="col">folio</th>
        <th scope="col">correo</th>
        <th scope="col">fecha de creacion</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($facturas as $factura)
        <tr>
            <th scope="row">{{$factura->habitacion}}</th>
            <td>{{$factura->huesped}}</td>
            <td>{{$factura->numero_noches}}</td>
            <td>{{$factura->nombre}}</td>
            <td>{{$factura->tarifa}}</td>
            <td>{{$factura->tarifa_sin_imp}}</td>
            <td>{{$factura->metodo}}</td>
            <td>{{$factura->ult_4_digitos}}</td>
            <td>{{$factura->telefono}}</td>
            <td>{{$factura->RFC}}</td>
            <td>{{$factura->razon_social}}</td>
            <td>{{$factura->status}}</td>
            <td>{{$factura->usuario_captura}}</td>
            <td>{{$factura->usuario_timbra}}</td>
            <td>{{$factura->folio}}</td>
            <td>{{$factura->correo}}</td>
            <td>{{$factura->fecha_creacion}}</td>


          </tr>    
        @endforeach
        
      </tbody>
  </table> --}}
  <table class="table table-striped">
    <thead>
        <tr>
            <th>Habitación</th>
            <th>Huésped</th>
            <th>Noches</th>
            <th>Tipo de reservación</th>
            <th>Tarifa</th>
            <th>Tarifa sin impuestos</th>
            <th>Método de pago</th>
            <th>Últimos 4 dígitos</th>
            <th>Teléfono</th>
            <th>RFC</th>
            <th>Razón social</th>
            <th>Estatus</th>
            <th>Usuario que capturó</th>
            <th>Usuario que timbró</th>
            <th>Folio</th>
            <th>Correo</th>
            <th>Fecha de creación</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($facturas as $factura)
        <tr>
            <td scope="row">{{$factura->habitacion}}</td>
            <td>{{$factura->huesped}}</td>
            <td>{{$factura->numero_noches}}</td>
            <td>{{$factura->nombre}}</td>
            <td>{{$factura->tarifa}}</td>
            <td>{{$factura->tarifa_sin_imp}}</td>
            <td>{{$factura->metodo}}</td>
            <td>{{$factura->ult_4_digitos}}</td>
            <td>{{$factura->telefono}}</td>
            <td>{{$factura->RFC}}</td>
            <td>{{$factura->razon_social}}</td>
            <td>{{$factura->status}}</td>
            <td>{{$factura->usuario_captura}}</td>
            <td>{{$factura->usuario_timbra}}</td>
            <td>{{$factura->folio_factura}}</td>
            <td>{{$factura->correo}}</td>
            <td>{{$factura->fecha_creacion}}</td>
        </tr>    
        @endforeach
    </tbody>
</table>
