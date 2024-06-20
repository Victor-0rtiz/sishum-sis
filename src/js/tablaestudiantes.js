(function () {
    let sexo;

    let tutorOption;

    let tutorInfo;

    $.ajax({
        url: '/api/estudiantes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaEstudiantes').DataTable({
                data: response,
                columns: [
                    { data: 'Id' },
                    { data: 'Nombres' },
                    { data: 'Cod_estudiante' },
                    { data: 'usser' },
                    { data: 'Tutor_Nombres' },

                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                            <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                            <button type="button" class="btn btn-secondary btn-matriculas" data-bs-toggle="modal" data-bs-target="#modalMatriculasEstudiante" data-id="${row.Id}" >Matriculas</button>
                            <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}" data-tut="${row.Id_tutor}">Borrar</button>
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
        url: "/api/sexo/all",
        dataType: 'json',
        success: function (result) {
            sexo = result;
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
    $.ajax({
        url: "/api/departamentos/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del departamento");
            $('#Departamento').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (departament) {
                $('#Departamento').append('<option value="' + departament.IdDepartamento + '">' + departament.Nombre + '</option>');
            });
        },
        error: function (params) {

        }
    });
    $.ajax({
        url: "/api/municipios/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del municipios");
            $('#Municipio').empty();
            // Agrega una opción por cada dato del tipo de usuario
            result.forEach(function (Municipio) {
                $('#Municipio').append('<option value="' + Municipio.IdMunicipio + '">' + Municipio.Nombre + '</option>');
            });
        },
        error: function (params) {

        }
    });

    $.ajax({
        url: '/api/tutores/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "de los tutores");

            tutorInfo = response;

            // Por ejemplo, cerrar el modal
            // $('#addModal').modal('hide');
            // // Actualizar la tabla de usuarios u otra interfaz según sea necesario
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });



    $('#tablaEstudiantes').on('click', '.btn-matriculas', function () {
        const id = $(this).data('id');
       
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);



        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/matricula-estudiante/all', // Especifica la URL de tu controlador
            type: 'POST',
            data: { "Id_Estudiante": id }, // Enviar los datos como JSON
            dataType: "json",
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
    
                $('#gridmatriculas').empty();
                // Agrega una opción por cada dato del tipo de usuario
                response.forEach(function (Matricula) {
                    $('#gridmatriculas').append(`
                         <div class="col-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">${Matricula.Id_anio_lectivo_anio}</h5>
                                    <p class="card-text">${Matricula.Id_grado_nombre} </p>
                                    <p class="card-text">${Matricula.Id_turno_nombre} </p>
                                    <button type="button" data-matid="${Matricula.Id}" class="btn btn-primary">Ver Boletin </button>
                                </div>
                            </div>
                        </div>
                        `);
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
    });
   

    $('#tablaEstudiantes').on('click', '.btn-borrar', function () {
        const id = $(this).data('id');
        const idTutor = $(this).data('tut');
        // Aquí puedes generar el reporte
        console.log('eliminar el registro ID:', id);
        console.log('eliminar el registro IDTutor:', idTutor);


        // Aquí puedes realizar la acción de borrado
        $.ajax({
            url: '/api/estudiantes/dell', // URL de tu controlador que genera el PDF
            type: 'POST',
            data: { "Id": id, "Id_Tutor": idTutor }, // Enviar los datos como JSON
            dataType: "json",
            success: async function (response) {
                console.log(response);
                const respuesta = response;

                if (respuesta.exito) {
                    await atualizarLista();

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




    $(document).ready(() => {





        $('input[name="tutorExistente"]').change(function () {
            const selectedValue = $(this).val();
            // Realizar acciones basadas en el valor seleccionado
            $('#tutorchange').empty();
            if (selectedValue === '2') {

                tutorOption = 2;
                console.log('Tutor existente seleccionado');
                $('#tutorchange').append(` <form id='formTutorNuevo'>
                <div class='mb-3'>
                        <label for='nombresUsser' class='form-label'>Nombres</label>
                        <input type='text' class='form-control' name='Nombres' id='nombresUsser'>
                    </div>
                    <div class='mb-3'>
                        <label for='apellidosUsser' class='form-label'>Apellidos</label>
                        <input type='text' class='form-control' name='Apellidos' id='apellidosUsser'>
                    </div>
                    <div class='mb-3'>
                        <label for='Telefono' class='form-label'>Telefono</label>
                        <input type='number' min="8" max="9" class='form-control' name='Telefono' id='Telefono'>
                    </div>
                    <div class='mb-3'>
                        <label for='Cedula' class='form-label'>Cédula</label>
                        <input type='text' class='form-control' name='Cedula' id='Cedula'>
                    </div>
                    <div class='mb-3'>
                        <label for='Ocupacion' class='form-label'>Ocupación</label>
                        <input type='text' class='form-control' name='Ocupacion' id='Ocupacion'>
                    </div>
                    <div class='mb-3'>
                        <label for='Direccion' class='form-label'>Dirección</label>
                        <textarea name='Direccion' id='Direccion' class='form-control'></textarea>
                    </div>

                    <div class='mb-3'>
                        <label for='sexoTutor' class='form-label'>Sexo</label>
                        <select class='form-select' name='Id_sexo' id='sexoTutor'>
                        </select>
                    </div>
                </form>`);

                sexo.forEach(function (sexo) {
                    $('#sexoTutor').append('<option value="' + sexo.Id + '">' + sexo.Nombre + '</option>');
                });


            } else if (selectedValue === '1') {

                tutorOption = 1;
                console.log('Nuevo tutor seleccionado');
                $('#tutorchange').append(`<form id='formTutorExistente'>

                <div class='mb-3'>
                        <label for='Tutor' class='form-label'>Tutor</label>
                        <select class='form-select' name='Id_Tutor' id='Tutor'>
                        </select>
                    </div>


                </form>`);

                tutorInfo.forEach(function (tutordata) {
                    $('#Tutor').append('<option value="' + tutordata.Id + '">' + tutordata.Nombres + " " + tutordata.Apellidos + '</option>');
                });
            }
        });

        $(document).ready(() => {
            $("#GuardarEstudiante").click(async () => {


                const formDpE = new FormData($("#formAddDatosPersonales")[0]);
                const formEstudiante = new FormData($("#formEstudiante")[0]);

                function formDataToObject(formData) {
                    let obj = {};
                    formData.forEach((value, key) => {
                        obj[key] = value;
                    });
                    return obj;
                }

                const form1 = formDataToObject(formDpE);
                const form2 = formDataToObject(formEstudiante);


                const dataForms = {
                    datos_personales: form1,
                    estudiante: form2,
                };

                const regexTelefonos = /^\d{8,11}$/;
                const regexCedula = /^\d{13}[A-Za-z]$/;
                const inputTelefonos = $('input[name="Telefono"]');
                const inputCedulas = $('input[name="Cedula"]');
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

                inputCedulas.each(async function () {
                    if (!regexCedula.test($(this).val())) {
                        datavalid = false;
                        await Swal.fire({
                            icon: "error",
                            html: `<span style="font-size: 1.5rem; font-weight: 800;">La cédula está mal formateada</span>`,
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



                // Verificar si se seleccionó un radio button
                const tutorOption = $("input[name='tutorExistente']:checked").val();

                if (!tutorOption) {
                    await Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 800;">Debe seleccionar una opción para el tutor</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'red',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(255, 184, 184)',
                        showConfirmButton: false,
                    });
                    return;
                }

                if (!tutorOption) {
                    await Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 800;">Debe seleccionar una opción para el tutor</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'red',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(255, 184, 184)',
                        showConfirmButton: false,
                    });
                    return;
                }

                if (tutorOption == 1) {
                    const formTutorExistente = new FormData($("#formTutorExistente")[0]);
                    const form3 = formDataToObject(formTutorExistente);
                    dataForms.TutorExistente = form3;
                    delete dataForms.TutorNuevo;
                } else {
                    const formNuevoTutor = new FormData($("#formTutorNuevo")[0]);
                    const form4 = formDataToObject(formNuevoTutor);
                    dataForms.TutorNuevo = form4;
                    delete dataForms.TutorExistente;
                }

                function isFormComplete(formObj) {
                    for (let key in formObj) {
                        if (formObj[key].trim() === "") {
                            return false;
                        }
                    }
                    return true;
                }

                if (!isFormComplete(form1) || !isFormComplete(form2) ||
                    (tutorOption == 1 && !isFormComplete(dataForms.TutorExistente)) ||
                    (tutorOption != 1 && !isFormComplete(dataForms.TutorNuevo))) {
                    await Swal.fire({
                        icon: "error",
                        html: `<span style="font-size: 1.5rem; font-weight: 900;">Todos los campos son obligatorios</span>`,
                        toast: true,
                        position: 'bottom-end',
                        iconColor: 'red',
                        timer: 1500,
                        padding: "2rem",
                        background: 'rgb(255, 199, 199)',
                        showConfirmButton: false,
                    });
                    return;
                }

                $.ajax({
                    url: "/api/estudiantes/add",
                    dataType: 'json',
                    type: 'POST',
                    data: dataForms,
                    success: async function (result) {
                        console.log(result, "del back");
                        if (result.alert) {
                            await Swal.fire({
                                icon: "warning",
                                html: `<span style="font-size: 1.5rem; font-weight: 900;">${result.alert}</span>`,
                                toast: true,
                                position: 'bottom-end',
                                iconColor: 'red',
                                timer: 1500,
                                padding: "2rem",
                                background: '#FFFFB8',
                                showConfirmButton: false,
                            });
                            return;
                        }

                        if (result.exito) {
                            await atualizarLista();
                            $('#formAddDatosPersonales')[0].reset();
                            $('#formEstudiante')[0].reset();
                            if (tutorOption != 1) {
                                $('#formTutorNuevo')[0].reset();
                            }
                            $('#tutorchange').empty();

                            // Limpiar radios seleccionados
                            $('input[name="tutorExistente"]').prop('checked', false);

                            $('#agregarModal').modal('hide');
                            await Swal.fire({
                                icon: "success",
                                html: `<span style="font-size: 1.5rem; font-weight: 900;">${result.exito}</span>`,
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

                        if (result.error) {
                            await Swal.fire({
                                icon: "error",
                                html: `<span style="font-size: 1.5rem; font-weight: 900;">${result.error}</span>`,
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

                    },
                    error: function (params) {

                    }
                });




                // Aquí puedes enviar dataForms al servidor
                console.log(dataForms);
            });
        });





    })



    async function atualizarLista() {
        $.ajax({
            url: '/api/estudiantes/all', // Especifica la URL de tu controlador
            dataType: 'json', // El tipo de datos esperado en la respuesta
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);
                const table = $('#tablaEstudiantes').DataTable({
                    destroy: true,
                    data: response,
                    columns: [
                        { data: 'Id' },
                        { data: 'Nombres' },
                        { data: 'Cod_estudiante' },
                        { data: 'usser' },
                        { data: 'Tutor_Nombres' },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `
                                <button type="button" class="btn btn-primary btn-editar" data-bs-toggle="modal" data-bs-target="#editarModal" data-id="${row.id}">Editar</button>
                                <button type="button" class="btn btn-secondary btn-matriculas" data-bs-toggle="modal" data-bs-target="#modalMatriculasEstudiante" data-id="${row.Id}" >Matriculas</button>
                                <button type="button" class="btn btn-danger btn-borrar" data-id="${row.Id}" data-tut="${row.Id_tutor}">Borrar</button>
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
    }



})()