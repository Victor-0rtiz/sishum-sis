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
                    <button id="GuardarEstudiante" class="btn btn-primary">Guardar</button>

                </div>




            </div>
        </div>
    </div>


</div>
</div>
<?php $script = '
 
    <script src="../build/js/tablamatricula.js"></script>
'; ?>