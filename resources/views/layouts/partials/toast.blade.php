<div id="toast1" class="toast position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
  <div class="toast-header">
    <strong class="me-auto">Hotel River</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    @if (session('estado'))
            <p>{{session('estado')}}</p>
        @endif
  </div>
</div>
