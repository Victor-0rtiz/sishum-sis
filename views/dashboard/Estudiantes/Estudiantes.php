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


</div>
</div>

<!-- Modal -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-dp-form-tab" data-bs-toggle="tab" data-bs-target="#nav-dp-form" type="button" role="tab" aria-controls="nav-dp-form" aria-selected="true">Datos Personales</button>
                    <button class="nav-link" id="nav-usser-tab" data-bs-toggle="tab" data-bs-target="#nav-usser" type="button" role="tab" aria-controls="nav-usser" aria-selected="false">Usuario</button>
                </div>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-dp-form" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="number" class="form-control" name="direccion" id="direccion">
                            </div>

                            <div class="mb-3">
                                <label for="sexo" class="form-label">Sexo</label>
                                <select class="form-select" name="sexo" id="sexo">
                                </select>
                            </div>



                        </form>

                    </div>
                    <div class="tab-pane fade" id="nav-usser" role="tabpanel" aria-labelledby="nav-usser-tab">
                        <form id="formAddUsuario">
                            <div class="mb-3">
                                <label for="agregarUsser" class="form-label">Usuario</label>
                                <input type="text" class="form-control" name="usser" id="agregarUsser">
                            </div>
                            <div class="mb-3">
                                <label for="agregarIdTipoUsuario" class="form-label">Tipo de Usuario select</label>
                                <select class="form-select" name="Id_Tipo_Usuario" id="agregarIdTipoUsuario">
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php $script = '
 
    <script src="../build/js/tablaestudiantes.js"></script>
'; ?>