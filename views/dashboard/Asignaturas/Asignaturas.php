<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Asignaturas</h3>
        </div>


        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal-dialog-scrollable" data-bs-target="#staticBackdrop">
                            Agregar
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaAsignaturas">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Turno</th>
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

<?php $script = '
 
    <script src="../build/js/tablaasignaturas.js"></script>
'; ?>