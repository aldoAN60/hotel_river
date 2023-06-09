<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modal-act-fac-{{$factura->id}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
      </svg>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="modal-act-fac-{{$factura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar datos fiscales y folio de facturacion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <div class="conteiner">
                <form action="{{route('facturas.update', $factura->id)}}" method="post">
                    @csrf
                    @method('PATCH')


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="habitacion">RFC:</label>
                            <input type="text" class="form-control" name="RFC_act" id="RFC_act" placeholder="RFC">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="habitacion">Razon social:</label>
                            <input type="text" class="form-control" name="razon_social_act" id="razon_social_act" placeholder="Razón Social">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="habitacion">folio:</label>
                            <input type="number" class="form-control" name="folio_act" id="folio_act" placeholder="folio">
                            <input type="hidden" name="id_usuario_timbra" value="{{ auth()->user()->id }}">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center mt-2">
                        <button class="btn btn-primary">Guardar cambios</button>
                    </div>
                    
                </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>