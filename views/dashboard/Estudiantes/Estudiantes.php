<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Estudiantes</h3>
        </div>



        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                            Agregar Estudiante
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaEstudiantes">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Tutor</th>
                              
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


</div>
</div>

<!-- Modal -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title fs-2" id="editarModalLabel">Agregar Estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div>

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

                </form>

 
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
                <button id="GuardarEstudiante"class="btn btn-primary">Guardar</button>





            </div>




        </div>
    </div>
</div>
</div>
</div>


<?php $script = '
 
    <script src="../build/js/tablaestudiantes.js"></script>
'; ?>