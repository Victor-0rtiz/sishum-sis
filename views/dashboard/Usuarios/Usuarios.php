<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Usuarios</h3>
        </div>



        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Agregar
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaUsuarios">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Usser</th>
                                <th scope="col">Tipo de Usuario</th>
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
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarUsuario">
                    <input type="number"id="editarId" name="Id" hidden>
                    <div class="mb-3">
                        <label for="editarUsser" class="form-label">Usuario</label>
                        <input type="text" name="usser" class="form-control" id="editarUsser">
                    </div>
                    <div class="mb-3">
                        <label for="editarIdTipoUsuario" class="form-label">Tipo de Usuario select</label>
                        <select class="form-select" name="Id_Tipo_Usuario" id="editarIdTipoUsuario">
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal de agregar -->

<div class="modal fade" id="addModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarModalLabel">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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



<?php $script = '
 
    <script src="../build/js/tablausuarios.js"></script>
'; ?>