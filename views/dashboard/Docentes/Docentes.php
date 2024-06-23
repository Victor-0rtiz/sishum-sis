<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Docentes</h3>
        </div>


        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">
                            Agregar
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display " id="tablaDocentes">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Codigo Docente</th>
                                <th scope="col">Usuario</th>

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

<!-- Modal -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Agregar Docente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>

                    <h3 class="fs-2">Información y Datos Personales del Docente</h3>


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

                <form id="formDocente">
                    <div class="mb-3">
                        <label for="agregarCodDocente" class="form-label">Código Docente</label>
                        <input type="text" class="form-control" name="Cod_docente" id="agregarCodDocente">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </form>
              


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Docente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>

                    <h3 class="fs-2">Información y Datos Personales del Docente</h3>


                </div>


                <form id="formAddDatosPersonalesEdit">
                    <div class="mb-3">
                        <label for="nombresUsser" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="Nombres" id="nombresUsserEdit">
                    </div>
                    <div class="mb-3">
                        <label for="apellidosUsser" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="Apellidos" id="apellidosUsserEdit">
                    </div>
                    <div class="mb-3">
                        <label for="Telefono" class="form-label">Telefono</label>
                        <input type="number" class="form-control checkTelefono" name="Telefono" id="TelefonoEdit">
                    </div>
                    <div class="mb-3">
                        <label for="Direccion" class="form-label">Dirección</label>
                        <textarea name="Direccion" id="DireccionEdit" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="sexo" class="form-label">Sexo</label>
                        <select class="form-select" name="Id_sexo" id="sexoEdit">
                        </select>
                    </div>

                    <input type="number"  name="Id" id="Id_dpEdit" hidden>




                </form>

                <form id="formDocenteEdit">
                    <div class="mb-3">
                        <label for="agregarCodDocente" class="form-label">Código Docente</label>
                        <input type="text" class="form-control" name="Cod_docente" id="CodDocenteEdit">
                    </div>

                    <input type="number"  name="Id" id="Id_DocEdit" hidden>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                </form>
              


            </div>
        </div>
    </div>
</div>

<?php $script = '
 
    <script src="../build/js/tabladocentes.js"></script>
'; ?>