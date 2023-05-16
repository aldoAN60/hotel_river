// $(document).ready(function() {
//     // Escucha el evento click en el botón de eliminar pendiente
//     $('#btn-eliminar').on('click', function(e) {
//         e.preventDefault(); // previene la recarga de la página
//         var form = $(this).parents('form'); // obtiene el formulario padre del botón
//         var id = form.data('id'); // obtiene el ID del pendiente a eliminar
//         var url = form.attr('action'); // obtiene la URL de eliminación del pendiente
//         // Pide confirmación antes de eliminar el pendiente
//         if (confirm('¿Estás seguro que quieres eliminar este pendiente?')) {
//             $.ajax({
//                 type: "POST",
//                 url: url,
//                 data: {
//                     _method: 'DELETE', // método de eliminación
//                     _token: '{{ csrf_token() }}', // token CSRF
//                     id: id // ID del pendiente a eliminar
//                 },
//                 success: function(data) {
//                     console.log(data); // imprime la respuesta en la consola
//                     // Si la eliminación es exitosa, recarga la página
//                     window.location.reload();
//                 },
//                 error: function(data) {
//                     console.log('Error:', data);
//                 }
//             });
//         }
//     });
// });
