(function () {

    const params = new URLSearchParams(window.location.search);

    // Obtiene el valor del parámetro 'grado'
   
    const dga = params.get('dga');
  
    // Imprime el valor en la consola
    console.log( "dga", dga);

    $.ajax({
        url: '/api/calificaciones/notas/all', // Especifica la URL de tu controlador,
        type: 'POST',
        data:{ "dga": dga},
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaCaliAsign').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Nombres' },
                    { data: 'Nota' },
                    { data: 'Nota_2' },
                    { data: 'Nota_3' },
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

            $('#tablaCaliAsign tbody').on('click', '.btn-editar', function () {
                const dataNotas = table.row($(this).parents('tr')).data();
                console.log(dataNotas);
            
                // Llenar los campos del formulario FormDataNotas
                $('#IdEdit').val(dataNotas.Id);
                $('#estudianteEdit').val(dataNotas.id_matricula);
                $('#NotaEdit').val(dataNotas.Nota);
                $('#Nota_2Edit').val(dataNotas.Nota_2);
                $('#Nota_3Edit').val(dataNotas.Nota_3);
            });


        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });


    $('#tablaCaliAsign').on('click', '.btn-borrar', function () {
        const id = $(this).data('id');
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);

        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/calificaciones/notas/del', // URL de tu controlador que genera el PDF
            type: 'POST',
            data: { "Id": id }, // Enviar los datos como JSON
            dataType: "json",
            success: async function (response) {
                console.log(response);
                const respuesta = response;

                if (respuesta.exito) {
                    await cargarLista();

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

 
    $.ajax({
        url: '/api/matricula-grado/all', // Especifica la URL de tu controlador
        type: 'POST',
        data:{ "dga": dga},
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "de la respuesta de ma gra");

            response.forEach(function (estudiante) {
                $('#estudiante').append('<option value="' + estudiante.Id + '">' + estudiante.Nombres + ' ' + estudiante.Apellidos + '</option>');
                $('#estudianteEdit').append('<option value="' + estudiante.Id + '">' + estudiante.Nombres + ' ' + estudiante.Apellidos + '</option>');
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



    $(document).ready(()=>{

        $('#GuardarNota').click(async()=>{

            let formDataNota = new FormData($("#FormDataNotas")[0]);

            formDataNota = formDataToObject(formDataNota);

            formDataNota.id_detalle_grado_asignatura = dga;


            const regexNumeros =  /^(?:0|[1-9][0-9]?|100)$/;
           
            const inputTelefonos = $('input[name="Telefono"]');
            
            let datavalid = true;
            inputTelefonos.each(async function () {
                if (!regexNumeros.test($(this).val())) {
                    datavalid = false;
                    await Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 800;">Las notas solo pueden ir de 0 a 100</span>`,
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


            $.ajax({
                url: '/api/calificaciones/notas/add', // Especifica la URL de tu controlador
                type: 'POST',
                data:formDataNota,
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, "de la respuesta agregar");
                    // return;

                    if (response.exito) {
                        await cargarLista()
                        $('#asignarNotasMat').modal('hide');
                        await Swal.fire({
                            icon: "success",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.exito}</span>`,
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

                    if (response.error) {
                        await Swal.fire({
                            icon: "error",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.error}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'red',
                            timer: 1500,
                            padding: "2rem",
                            background: '#FFB8B8',
                            showConfirmButton: false,
                        });
                        return;

                    }
                    if (response.alert) {
                        await Swal.fire({
                            icon: "warning",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.alert}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'yellow',
                            timer: 1500,
                            padding: "2rem",
                            background: '#F6FBC2',
                            showConfirmButton: false,
                        });
                        return;

                    }
        
               
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });
        });


        $("#GuardarNotaEdit").click(async () => {

            let formDataNotaEdit = new FormData($("#FormDataNotasEdit")[0]);

            formDataNotaEdit = formDataToObject(formDataNotaEdit);

            formDataNotaEdit.id_detalle_grado_asignatura = dga;


            const regexNumeros =  /^(?:0|[1-9][0-9]?|100)$/;
           
            const inputTelefonos = $('input[class="Nota"]');
            
            let datavalid = true;
            inputTelefonos.each(async function () {
                if (!regexNumeros.test($(this).val())) {
                    datavalid = false;
                    await Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 800;">Las notas solo pueden ir de 0 a 100</span>`,
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

            $.ajax({
                url: '/api/calificaciones/notas/edit', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: formDataNotaEdit, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar');


                    if (response.exito) {
                        $("#FormDataNotasEdit")[0].reset();
                        await cargarLista();
                        $('#editarModal').modal('hide');
                        await Swal.fire({
                            icon: "success",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.exito}</span>`,
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

                    if (response.error) {
                        await Swal.fire({
                            icon: "error",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.error}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'red',
                            timer: 1500,
                            padding: "2rem",
                            background: '#FFB8B8',
                            showConfirmButton: false,
                        });
                        return;

                    }
                    if (response.alert) {
                        await Swal.fire({
                            icon: "warning",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.alert}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'yellow',
                            timer: 1500,
                            padding: "2rem",
                            background: '#F6FBC2',
                            showConfirmButton: false,
                        });
                        return;

                    }


                    // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });
        })


    });


    function formDataToObject(formData) {
        let obj = {};
        formData.forEach((value, key) => {
            obj[key] = value;
        });
        return obj;
    }


    async function cargarLista(){
        $.ajax({
            url: '/api/calificaciones/notas/all', // Especifica la URL de tu controlador,
            type: 'POST',
            data:{ "dga": dga},
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaCaliAsign').DataTable();
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