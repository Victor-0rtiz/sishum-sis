<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Matriculas</h3>
        </div>



        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMatriculaModal">
                            Agregar
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaMatriculas">
                        <thead>
                            <tr>
                                <th scope="col">Año Lectivo</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Tutor</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="agregarMatriculaModal" tabindex="-1" aria-labelledby="agregarMatriculaModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="editarModalLabel">Agregar Matricula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2"> Estudiante</h3>

                    </div>

                    <div>
                        <label for="estudianteExistente1">Estudiante Existente</label>
                        <input type="radio" name="EstudianteExistente" id="estudianteExistente1" value="1">
                        <label for="estudianteExistente2">Nuevo Estudiante</label>
                        <input type="radio" name="EstudianteExistente" id="estudianteExistente2" value="2">
                    </div>

                    <div id="Estudiantechange">

                    </div>



                    <div>
                        <h3 class="fs-2"> Tutor</h3>

                    </div>

                    <div>
                        <label for="tutorExistente1">Tutor Existente</label>
                        <input type="radio" name="tutorExistente" id="tutorExistente1" value="1">
                        <label for="tutorExistente1">Nuevo Tutor</label>
                        <input type="radio" name="tutorExistente" id="tutorExistente2" value="2">
                    </div>

                    <div id="tutorchange">

                    </div>


                    <div>
                        <h3 class="fs-2"> Datos de Académicos</h3>

                        <form id="FormDatosAcademicos">
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type='number' class='form-control' name='Edad' id='edad'>
                            </div>
                            <div class="mb-3">
                                <label for="grado" class="form-label">Grado</label>
                                <select class="form-select" name="id_grado" id="Grado">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" name="id_turno" id="Turno">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="aniolectivo" class="form-label">Año Lectivo</label>
                                <select class="form-select" name="id_anio_lectivo" id="AnioLectivo">
                                </select>
                            </div>
                        </form>

                    </div>
                    <button id="GuardarMatricula" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>



    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="editarModalLabel">Editar Matricula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2"> Estudiante</h3>

                    </div>

                    <form id="formEstudianteEdit">

                        <div class="mb-3">
                            <label for="nombresUsser" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="Nombres" id="nombresEstudiante">
                        </div>
                        <div class="mb-3">
                            <label for="apellidosUsser" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="Apellidos" id="apellidosEstudiante">
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control checkTelefono" name="TelefonoEstudiante" id="TelefonoEstudiante">
                        </div>
                        <div class="mb-3">
                            <label for="Direccion" class="form-label">Dirección</label>
                            <textarea name="Direccion" id="DireccionEstudiante" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="sexo" class="form-label">Sexo</label>
                            <select class="form-select" name="Id_sexo" id="sexoEstudiante">
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="Cod_estudiante" class="form-label">Código de Estudiante</label>
                            <input name="Cod_estudiante" id="Cod_estudianteEdit" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="Departamento" class="form-label">Departamento</label>
                            <select class="form-select" name="IdDepartamento" id="DepartamentoEstudiante">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Municipio" class="form-label">Municipio</label>
                            <select class="form-select" name="IdMunicipio" id="MunicipioEstudiante">
                            </select>
                        </div>

                        <div>
                            <input type="number" hidden class="form-control" name="Id_datos_personales" id="editId_datos_personales_estudiante">
                            <input type="number" hidden class="form-control" name="Id_estudiante" id="editId_estudiante">
                            
                        </div>

                    </form>

                    <div>
                        <h3 class="fs-2"> Tutor</h3>

                    </div>

                    <form id='formTutorEdit'>
                        <div class='mb-3'>
                            <label for='nombresUsser' class='form-label'>Nombres</label>
                            <input type='text' class='form-control' name='Nombres' id='nombresTutor'>
                        </div>
                        <div class='mb-3'>
                            <label for='apellidosUsser' class='form-label'>Apellidos</label>
                            <input type='text' class='form-control' name='Apellidos' id='apellidosTutor'>
                        </div>
                        <div class='mb-3'>
                            <label for='Telefono' class='form-label'>Telefono</label>
                            <input type='number' class='form-control checkTelefono' name='TelefonoTutor' id='TelefonoTutor'>
                        </div>
                        <div class='mb-3'>
                            <label for='Cedula' class='form-label'>Cédula</label>
                            <input type='text' class='form-control checkCedula' name='CedulaTutor' id='CedulaTutor'>
                        </div>
                        <div class='mb-3'>
                            <label for='Ocupacion' class='form-label'>Ocupación</label>
                            <input type='text' class='form-control' name='Ocupacion' id='OcupacionEdit'>
                        </div>
                        <div class='mb-3'>
                            <label for='Direccion' class='form-label'>Dirección</label>
                            <textarea name='Direccion' id='DireccionTutorEdit' class='form-control'></textarea>
                        </div>

                        <div class='mb-3'>
                            <label for='sexoTutor' class='form-label'>Sexo</label>
                            <select class='form-select' name='Id_sexo' id='sexoTutor'>
                            </select>
                        </div>

                        <div>
                            <input type="number" hidden class="form-control" name="Id_datos_personales" id="editId_datos_personales_tutor">
                            <input type="number" hidden class="form-control" name="Id_tutor" id="editId_tutor">
                        </div>
                    </form>




                    <div>
                        <h3 class="fs-2"> Datos de Académicos</h3>

                        <form id="FormDatosAcademicosEdit">
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad</label>
                                <input type='number' class='form-control' name='Edad' id='EdadEdit'>
                            </div>
                            <div class="mb-3">
                                <label for="grado" class="form-label">Grado</label>
                                <select class="form-select" name="id_grado" id="GradoEdit">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" name="id_turno" id="TurnoEdit">
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="aniolectivo" class="form-label">Año Lectivo</label>
                                <select class="form-select" name="id_anio_lectivo" id="AnioLectivoEdit">
                                </select>
                            </div>

                            <input type="number" hidden class="form-control" name="Id" id="editId_matricula">
                        </form>

                    </div>
                    <button id="GuardarMatriculaEditada" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


</div>
</div>
<?php $script = '
 
    <script src="../build/js/tablamatricula.js"></script>
'; ?>