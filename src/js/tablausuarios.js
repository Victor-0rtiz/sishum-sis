(function () {
    $.ajax({
        url: "/api/usuarios/all",
        dataType: 'json',
        success: function (result) {
            console.log(result);
            const table = $('#tablaUsuarios').DataTable({
                data: result,
                columns: [
                    { data: 'Id' },
                    { data: 'usser' },
                    { data: 'Nombre' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal">Editar</button> <button type="button" class="btn btn-danger">Borrar</button>';
                        }
                    }
                ],
                language: {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": activar para ordenar la columna de manera descendente"
                    }
                }
            });

            $('#tablaUsuarios tbody').on('click', '.btn-editar', function () {
                const data = table.row($(this).parents('tr')).data();
                $('#editarId').val(data.Id);
                $('#editarUsser').val(data.usser);
                $('#editarIdTipoUsuario').val(data.Id_Tipo_Usuario);
                
            });
        },
        error: function (xhr, status, error) {
            // Handle errors
        }
    });


    $.ajax({
        url: "/api/usuarios/tipouser",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del tipo");
            $('#editarIdTipoUsuario').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (tipoUsuario) {
                $('#editarIdTipoUsuario').append('<option value="' + tipoUsuario.Id + '">' + tipoUsuario.Nombre + '</option>');
            });
            $('#agregarIdTipoUsuario').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (tipoUsuario) {
                $('#agregarIdTipoUsuario').append('<option value="' + tipoUsuario.Id + '">' + tipoUsuario.Nombre + '</option>');
            });

        },
        error: function (params) {

        }
    });


   // Escuchar el evento de envío del formulario
$('#formEditarUsuario').on('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtener los datos del formulario
    const formData = $(this).serialize();

    console.log(formData); 

    // Enviar la solicitud AJAX
    $.ajax({
        url: '/api/usuarios/add', // Especifica la URL de tu controlador
        type: 'POST', // O el método HTTP que estés utilizando
        data: formData, // Los datos del formulario serializados
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            // Por ejemplo, cerrar el modal
            $('#addModal').modal('hide');
            // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
});

$('#formAddUsuario').on('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtener los datos del formulario
    const formData = $(this).serialize();

    console.log(formData);

    // Enviar la solicitud AJAX
    $.ajax({
        url: '/api/usuarios/add', // Especifica la URL de tu controlador
        type: 'POST', // O el método HTTP que estés utilizando
        data: formData, // Los datos del formulario serializados
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);

            if (response.error) {
                 Swal.fire({
                    icon: "error",
                    html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.error}</span>`,
                    toast: true,
                    position: 'bottom-end',
                    iconColor: 'red',
                    timer: 1500,
                    padding: "2rem",
                    background: 'rgb(231, 184, 184)',
                    showConfirmButton: false,
                  });
            }
            // Por ejemplo, cerrar el modal
            $('#addModal').modal('hide');
            // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
});


})();
