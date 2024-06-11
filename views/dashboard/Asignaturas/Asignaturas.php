<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Asignaturas</h3>
        </div>


        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">



                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="asignaturas-tab" data-bs-toggle="tab" data-bs-target="#asignaturas" type="button" role="tab" aria-controls="asignaturas" aria-selected="true">Asignaturas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="asignaturas-asignadas-tab" data-bs-toggle="tab" data-bs-target="#asignaturas-asignadas" type="button" role="tab" aria-controls="asignaturas-asignadas" aria-selected="false">Asignaturas Asignadas</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="asignaturas" role="tabpanel" aria-labelledby="asignaturas-tab">
                        <div class="card-body">
                            <div class="card-header row">
                                <h5 class="col">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarAsignaturaModal">
                                        Agregar
                                    </button>
                                </h5>

                            </div>
                            <table class="table table-striped table-hover display" id="tablaAsignaturasList">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="asignaturas-asignadas" role="tabpanel" aria-labelledby="asignaturas-asignadas-tab">
                        <div class="card-body">
                            <div class="card-header row">
                                <h5 class="col">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarAsignaturaGradoModal">
                                        Agregar
                                    </button>
                                </h5>

                            </div>
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

    </div>

    <div class="modal fade" id="agregarAsignaturaModal" tabindex="-1" aria-labelledby="agregarAsignaturaModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="editarModalLabel">Agregar Asignatura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="formAsignatura">
                        <div class="mb-3">
                            <label for="nombresUsser" class="form-label">Nombre de la Asignatura</label>
                            <input type="text" class="form-control" name="Nombre" id="nombresUsser">
                        </div>


                        <button id="GuardarAsignatura" class="btn btn-primary">Guardar</button>
                    </form>




                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="agregarAsignaturaGradoModal" tabindex="-1" aria-labelledby="agregarAsignaturaGradoModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title fs-2" id="editarModalLabel">Agregar Asignatura a un Grado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form id="formAsigAnioLec">
                        <div class="mb-3">
                            <label for="AnioLectivo" class="form-label">Año Lectivo</label>
                            <select class="form-select" name="Id_anio_lectivo" id="AnioLectivo">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Grado" class="form-label">Grado</label>
                            <select class="form-select" name="id_grado" id="Grado">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Turno" class="form-label">Turno</label>
                            <select class="form-select" name="id_turno" id="Turno">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Asignatura" class="form-label">Asignatura</label>
                            <select class="form-select" name="Id_asignatura" id="Asignatura">
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Docente" class="form-label">Docente</label>
                            <select class="form-select" name="Id_docente" id="Docente">
                            </select>
                        </div>


                        <button id="GuardarAsigAnioLec" class="btn btn-primary">Guardar</button>
                    </form>




                </div>

            </div>
        </div>
    </div>
</div>



<?php $script = '
 
    <script src="../build/js/tablaasignaturas.js"></script>
'; ?>