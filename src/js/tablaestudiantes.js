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
                        <input type='number' class='form-control' name='Telefono' id='Telefono'>
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