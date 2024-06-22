<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Calificaciones - Grados</h3>
        </div>



        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asignarTurnoGrado">
                            Asignar Grado a un Turno
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaasingas">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Año Lectivo</th>
                               
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


    <div class="modal fade" id="asignarTurnoGrado" tabindex="-1" aria-labelledby="asignarTurnoGrado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2">Asignar Grado a un Turno</h3>

                        <form id="FormAnioGradoTurno">
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
                                <select class="form-select" name="Id_anio_lectivo" id="AnioLectivo">
                                </select>
                            </div>
                        </form>

                    </div>
                    <button id="GuardarAnioGradoTurno" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2">Editar asignacion del Grado a un Turno</h3>

                        <form id="FormAnioGradoTurnoEdit">
                            <div class="mb-3">
                                <label for="grado" class="form-label">Grado</label>
                                <select class="form-select" name="id_grado" id="Grado2">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="turno" class="form-label">Turno</label>
                                <select class="form-select" name="id_turno" id="Turno2">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="aniolectivo" class="form-label">Año Lectivo</label>
                                <select class="form-select" name="Id_anio_lectivo" id="AnioLectivo2">
                                </select>
                            </div>
                            <input type="number" name="Id" id="Id_asignadasasig" hidden>
                        </form>

                    </div>
                    <button id="GuardarFormAnioGradoTurnoEdit" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


</div>





<?php $script = '
 
    <script src="../build/js/tablacalificaciones.js"></script>
'; ?>