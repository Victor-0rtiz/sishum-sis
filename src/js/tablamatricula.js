(function () {

    let EstudianteOption;
    let tutorOption;
    let sexo;

    let departamentos;
    let municipios;


    let tutorList = [];
    let estudianteList = [];

    $(document).ready(() => {

        $('input[name="EstudianteExistente"]').change(function () {
            const selectedValue = $(this).val();
            // Realizar acciones basadas en el valor seleccionado
            $('#Estudiantechange').empty();
            if (selectedValue === '2') {
                EstudianteOption = 2;

                $('#Estudiantechange').append(`  <div>
                        <h3 class="fs-2">Información y Datos Personales del Estudiante</h3>
                    </div>



                    <form id="formAddDatosPersonalesEstudiante">
                        <div class="mb-3">
                            <label for="nombresUsser" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="Nombres" id="nombresUsser">
                        </div>
                        <div class="mb-3">
                            <label for="apellidosUsser" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="Apellidos" id="apellidosUsser">
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="Telefono" id="Telefono">
                        </div> 
                        <div class="mb-3">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <textarea name="Direccion" id="Direccion" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" name="Id_sexo" id="sexo">
                            </select>
                        </div>


                    </form>

                    <div class="mt-5">
                        <h3 class="fs-2">Código del Estudiante y Ubicación </h3>
                    </div>

                    <form id="formEstudiante">
                        <div class="mb-3">
                            <label for="Cod_estudiante" class="form-label">Código de Estudiante</label>
                            <input name="Cod_estudiante" id="Cod_estudiante" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Departamento" class="form-label">Departamento</label>
                            <select class="form-select" name="IdDepartamento" id="Departamento">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Municipio" class="form-label">Municipio</label>
                            <select class="form-select" name="IdMunicipio" id="Municipio">
                            </select>
                        </div>
                    </form>`);

                sexo.forEach(function (sexo) {
                    $('#sexo').append('<option value="' + sexo.Id + '">' + sexo.Nombre + '</option>');
                });

                departamentos.forEach(function (departament) {
                    $('#Departamento').append('<option value="' + departament.IdDepartamento + '">' + departament.Nombre + '</option>');
                });

                municipios.forEach(function (Municipio) {
                    $('#Municipio').append('<option value="' + Municipio.IdMunicipio + '">' + Municipio.Nombre + '</option>');
                });


            } else if (selectedValue === '1') {

                EstudianteOption = 1;

                $('#Estudiantechange').append(`<form id='formEstudianteExistente'>

                <div class='mb-3'>
                        <label for='estudianteSelect' class='form-label'>Estudiante</label>
                        <select class='form-select' name='Id_estudiante' id='estudianteSelect'>
                        </select>
                    </div>


                </form>`);

            

                estudianteList.forEach(function (tutordata) {
                    $('#estudianteSelect').append('<option value="' + tutordata.Id + '">' + tutordata.Nombres + " " + tutordata.Apellidos + '</option>');
                });
            }
        });



        $('input[name="tutorExistente"]').change(function () {
            const selectedValue = $(this).val();
            // Realizar acciones basadas en el valor seleccionado
            $('#tutorchange').empty();
            if (selectedValue === '2') {

                tutorOption = 2;

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

                $('#tutorchange').append(`<form id='formTutorExistente'>

                <div class='mb-3'>
                        <label for='Tutor' class='form-label'>Tutor</label>
                        <select class='form-select' name='Id_Tutor' id='Tutor'>
                        </select>
                    </div>


                </form>`);

                tutorList.forEach(function (tutordata) {
                    $('#Tutor').append('<option value="' + tutordata.Id + '">' + tutordata.Nombres + " " + tutordata.Apellidos + '</option>');
                });
            }
        });


        $("#GuardarMatricula").click(async () => {

            let formDataMatricula = new FormData($("#FormDatosAcademicos")[0]);

            formDataMatricula = formDataToObject(formDataMatricula)
            

            console.log(formDataMatricula, " de prueba")


            const DatosMatricula = {
                data_matricula: formDataMatricula

            };

            // Verificar si se seleccionó un radio button
            const tutorOptionCheckbox = $("input[name='tutorExistente']:checked").val();
            const estudianteOptionChechboxk = $("input[name='EstudianteExistente']:checked").val();

            if (!tutorOptionCheckbox) {
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
            if (!estudianteOptionChechboxk) {
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


            if (EstudianteOption == 1) {
                let formEstudiante = new FormData($("#formEstudianteExistente")[0]);

                formEstudiante = formDataToObject(formEstudiante);


                DatosMatricula.EstudianteExistente = formEstudiante;
                delete DatosMatricula.EstudianteNuevo;
                delete DatosMatricula.EstudianteInfo;

            } else {
                let formNuevoEstudiante = new FormData($("#formAddDatosPersonalesEstudiante")[0]);
                let formEstudianteInfo = new FormData($("#formEstudiante")[0]);

                formNuevoEstudiante = formDataToObject(formNuevoEstudiante);
                formEstudianteInfo = formDataToObject(formEstudianteInfo);

                DatosMatricula.EstudianteNuevo = formNuevoEstudiante;
                DatosMatricula.EstudianteInfo = formEstudianteInfo;
                delete DatosMatricula.EstudianteExistente;
            }
            if (tutorOption == 1) {
                let formTutor = new FormData($("#formTutorExistente")[0]);

                formTutor = formDataToObject(formTutor);

                DatosMatricula.TutorExistente = formTutor;
                delete DatosMatricula.TutorNuevo;
            } else {
                let formNuevoTutor = new FormData($("#formTutorNuevo")[0]);

                formNuevoTutor = formDataToObject( formNuevoTutor);
                DatosMatricula.TutorNuevo = formNuevoTutor;
                delete DatosMatricula.TutorExistente;
            }


            console.log(DatosMatricula);



            $.ajax({
                url: '/api/matricula/add', // Especifica la URL de tu controlador
                type: 'POST', // O el método HTTP que estés utilizando
                data: DatosMatricula, // Los datos del formulario serializados
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, 'de agregar');

                    return;
                    if (response.exito) {
                        await cargarLista()
                        $('#agregarAsignaturaModal').modal('hide');
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


                    // Actualizar la tabla de usuarios u otra interfaz según sea necesario
                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });


        });










    })


    $.ajax({
        url: '/api/matricula/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response);
            const table = $('#tablaMatriculas').DataTable({
                data: response,
                columns: [
                    { data: 'Id_anio_lectivo_anio' },
                    { data: 'Nombres_estudiante' },
                    { data: 'Nombres_tutor' },
                    { data: 'Id_turno_nombre' },
                    { data: 'Id_grado_nombre' },
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

        },
        error: function (params) {

        }
    });

    $.ajax({
        url: "/api/departamentos/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del departamento");
            departamentos = result;
            // Agrega una opción por cada dato del tipo de usuario

        },
        error: function (params) {

        }
    });
    $.ajax({
        url: "/api/municipios/all",
        dataType: 'json',
        success: function (result) {
            console.log(result, "del municipios");

            municipios = result;


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

            tutorList = response;

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
        url: '/api/estudiantes/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del estudiante");

            estudianteList = response;
           
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });

    $.ajax({
        url: '/api/grados/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del grado");
            response.forEach(function (grado) {
                $('#Grado').append('<option value="' + grado.Id + '">' + grado.Nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
    $.ajax({
        url: '/api/turnos/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del turno");
            response.forEach(function (Turnos) {
                $('#Turno').append('<option value="' + Turnos.Id + '">' + Turnos.Nombre + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });
    $.ajax({
        url: '/api/anioslectivos/all', // Especifica la URL de tu controlador
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "del listado del anio lectivo");
            response.forEach(function (anioLec) {
                $('#AnioLectivo').append('<option value="' + anioLec.Id + '">' + anioLec.anio + '</option>');
            });
        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });


    
    function formDataToObject(formData) {
        let obj = {};
        formData.forEach((value, key) => {
            obj[key] = value;
        });
        return obj;
    }



})()