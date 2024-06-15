<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Calificaciones - Asignaturas</h3>
        </div>
        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asignarAsignatura">
                            Agregar Asignatura
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaCaliAsign">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Asignatura</th>
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

    <div class="modal fade" id="asignarAsignatura" tabindex="-1" aria-labelledby="asignarAsignatura" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2">Agregar Asignatura</h3>

                        <form id="FormAsigAsignaturaDoc">
                            <div class="mb-3">
                                <label for="asignatura" class="form-label">Asignatura</label>
                                <select class="form-select" name="Id_asignatura" id="asignatura">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="docente" class="form-label">Docente</label>
                                <select class="form-select" name="Id_docente" id="docente">
                                </select>
                            </div>
                            
                        </form>

                    </div>
                    <button id="GuardarAsigDocAnio" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


</div>





<?php $script = '
 
    <script src="../build/js/tablacalificacionesasignaturas.js"></script>
'; ?>