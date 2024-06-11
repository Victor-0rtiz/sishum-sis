(function () {

    let EstudianteOption;
    let tutorOption;

    $(document).ready(() => {

        $('input[name="EstudianteExistente"]').change(function () {
            const selectedValue = $(this).val();
            // Realizar acciones basadas en el valor seleccionado
            $('#Estudiantechange').empty();
            if (selectedValue === '2') {
                EstudianteOption = 2;
                console.log('Tutor existente seleccionado');
                $('#Estudiantechange').append(`  <div>
                        <h3 class="fs-2">Información y Datos Personales del Estudiante</h3>
                    </div>



                    <form id="formAddDatosPersonales">
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
                    $('#sexoTutor').append('<option value="' + sexo.Id + '">' + sexo.Nombre + '</option>');
                });


            } else if (selectedValue === '1') {

                EstudianteOption = 1;
                console.log('Nuevo tutor seleccionado');
                $('#Estudiantechange').append(`<form id='formTutorExistente'>

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



})()