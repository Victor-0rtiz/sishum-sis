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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal-dialog-scrollable" data-bs-target="#staticBackdrop">
                            Agregar
                        </button>
                    </h5>
                   
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover display" id="tablaMatriculas">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Tutor</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Estudiante A</td>
                                <td>Tutor A</td>
                                <td>10°</td>
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
                                <td>Estudiante B</td>
                                <td>Tutor B</td>
                                <td>11°</td>
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
                                <td>Estudiante C</td>
                                <td>Tutor C</td>
                                <td>9°</td>
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
                                <td>Estudiante D</td>
                                <td>Tutor D</td>
                                <td>8°</td>
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
                                <td>Estudiante E</td>
                                <td>Tutor E</td>
                                <td>7°</td>
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
</div>
<?php $script = '
 
    <script src="../build/js/tablamatricula.js"></script>
'; ?>