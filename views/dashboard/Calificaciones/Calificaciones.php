<div class="container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column w-100">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Calificaciones</h3>
        </div>



        <!-- Table Element -->
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
                    <table class="table table-striped table-hover display" id="tablaCalificaciones">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Nota</th>
                                <th scope="col">Docente</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>John Doe</td>
                                <td>Matemáticas</td>
                                <td>90</td>
                                <td>Profesor A</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jane Smith</td>
                                <td>Ciencias</td>
                                <td>85</td>
                                <td>Profesor B</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Michael Johnson</td>
                                <td>Lenguaje</td>
                                <td>95</td>
                                <td>Profesor C</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Emily Williams</td>
                                <td>Historia</td>
                                <td>88</td>
                                <td>Profesor D</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>David Brown</td>
                                <td>Geografía</td>
                                <td>92</td>
                                <td>Profesor E</td>
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Borrar
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>

<?php $script = '
 
    <script src="../build/js/tablacalificaciones.js"></script>
'; ?>