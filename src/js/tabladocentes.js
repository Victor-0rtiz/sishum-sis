(function () {


    $.ajax({
        url: '/api/docentes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaDocentes').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Nombres' },
                    { data: 'Apellidos' },
                    { data: 'Cod_docente' },
                    { data: 'usser' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                           <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}">Borrar</button>
                                       `;
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
            // Por ejemplo, cerrar el modal
            // $('#addModal').modal('hide');
            // // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });




    $.ajax({
        url: "/api/usuarios/tipouser",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del tipo");

            $('#agregarIdTipoUsuario').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (tipoUsuario) {
                $('#agregarIdTipoUsuario').append('<option value="' + tipoUsuario.Id + '">' + tipoUsuario.Nombre + '</option>');
            });

        },
        error: function (params) {

        }
    });

    $.ajax({
        url: "/api/sexo/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del sexo");
            $('#sexo').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (sexo) {
                $('#sexo').append('<option value="' + sexo.Id + '">' + sexo.Nombre + '</option>');
            });




        },
        error: function (params) {

        }
    });


    $('#tablaDocentes').on('click', '.btn-borrar', function () {
        const id = $(this).data('id');
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);

        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/docentes/del', // URL de tu controlador que genera el PDF
            type: 'POST',
            data: { "Id": id }, // Enviar los datos como JSON
            dataType: "json",
            success: async function (response) {
                console.log(response);
                const respuesta = response;

                if (respuesta.exito) {
                    await actualizarLista();

                    await Swal.fire({
                        icon: "success",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">Eliminado Correctamente</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'green',
                        timer: 1500,
                        padding: "2rem",
                        background: '#B8FFB8',
                        showConfirmButton: false,
                    });

                    return;

                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });



    $("#formDocente").on('submit', function (event) {
        event.preventDefault();

        const formDatosP = new FormData($("#formAddDatosPersonales")[0]);
        const formDatosDoc = new FormData($("#formDocente")[0]);


        function formDataToObject(formData) {
            let obj = {};
            formData.forEach((value, key) => {
                obj[key] = value;
            });
            return obj;
        }

        const form1 = formDataToObject(formDatosDoc);
        const form2 = formDataToObject(formDatosP);


        // Combinar los objetos de datos en un solo objeto
        const dataForms = {
            docente: form1,
            datos_personales: form2,

        };

        const regexTelefonos = /^\d{8,11}$/;
      
        const inputTelefonos = $('input[name="Telefono"]');
   
        let datavalid = true;
        inputTelefonos.each(async function () {
            if (!regexTelefonos.test($(this).val())) {
                datavalid = false;
                await Swal.fire({
                    icon: "error",
                    html: `<span style="font-size: 1.5rem; font-weight: 800;">El celular debe tener de 8 a 12 dígitos</span>`,
                    toast: true,
                    position: 'bottom-end',
                    iconColor: 'red',
                    timer: 1500,
                    padding: "2rem",
                    background: 'rgb(255, 184, 184)',
                    showConfirmButton: false,
                });
                $(this).css('border', '1px solid red');
                return false; // Detiene la iteración de .each
            } else {
                $(this).css('border', ''); // Restablece el estilo del borde
            }
        });

       
        if (!datavalid) {
            return;
        }


        // console.log(dataForms);


        // Enviar la solicitud AJAX
        $.ajax({
            url: '/api/docentes/add', // Especifica la URL de tu controlador
            type: 'POST', // O el método HTTP que estés utilizando
            data: dataForms, // Los datos del formulario serializados
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: async function (response) {
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

                if (response.act) {
                    await actualizarLista();
                    $('#agregarModal').modal('hide');
                    Swal.fire({
                        icon: "success",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.resp}</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'green',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(168,255,162)',
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


    })


    async function actualizarLista(){
        console.log("actualizando...");

        $.ajax({
            url: '/api/docentes/all', // Especifica la URL de tu controlador
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success:  function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaDocentes').DataTable();
                table.clear();
                
                // Agregar los nuevos datos
                table.rows.add(response);
                
                // Dibujar la tabla con los nuevos datos
                table.draw();
            },
            error: function (xhr, status, error) {
                // Manejar errores de la solicitud AJAX
                console.error(xhr.responseText);
            }
        });
    }


})()