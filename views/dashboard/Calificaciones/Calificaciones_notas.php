<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Calificaciones - Notas</h3>
        </div>
        <!-- Table Element -->
        <div class="container-fluid w-100">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">

                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#asignarNotasMat">
                            Agregar Nota
                        </button>
                    </h5>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaCaliAsign">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Nota</th>
                               
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

    <div class="modal fade" id="asignarNotasMat" tabindex="-1" aria-labelledby="asignarNotasMat" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <h3 class="fs-2">Agregar Nota</h3>

                        <form id="FormDataNotas">
                            <div class="mb-3">
                                <label for="estudiante" class="form-label">Estudiante</label>
                                <select class="form-select" name="id_matricula" id="estudiante">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="Nota" class="form-label">Nota</label>
                                <input type="number" class="form-control" name="Nota" id="Nota">
                            </div>
                            
                        </form>

                    </div>
                    <button id="GuardarNota" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


</div>





<?php $script = '
 
    <script src="../build/js/tablacalificacionesnotas.js"></script>
'; ?>