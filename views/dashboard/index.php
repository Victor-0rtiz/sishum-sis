<div class="p-5">


    <main class="content px-3 py-2 d-flex flex-column gap-5">


        <div class="d-flex justify-content-evenly">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h3 class="card-title text-center">Estudiantes</h3>
                    <div class="d-flex justify-content-center gap-5 fs-1">
                        <h2 class="fs-1">50</h2>
                        <i class="fa-solid fa-children"></i>
                    </div>

                </div>
            </div>

            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h3 class="card-title text-center">Docentes</h3>
                    <div class="d-flex  justify-content-center gap-5 fs-1">
                        <h2 class="fs-1">50</h2>
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>

                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">

            <div class="grafica w-75  ">
                <canvas id="multiAxisBarChart"></canvas>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Table Element -->
            <div class="card border-0 p-5 ">
                <div class="mb-3 text-center">
                    <h3>Ultimas matriculas</h3>
                </div>
                <div class="card-header row">
                    <h5 class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal-dialog-scrollable" data-bs-target="#staticBackdrop">
                            Agregar
                        </button>
                    </h5>
                    <h6 class="col">
                        <div class="input-group input-group-sm">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Estudiante</th>
                                <th scope="col">Tutor</th>
                                <th scope="col">Grado</th>

                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Kevin Andrés</td>
                                <td>García Moncada</td>
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
                                <td>Jacob</td>
                                <td>Thornton</td>
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
                                <td>Larry the Bird</td>
                                <td>Larry the Bird</td>
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
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </main>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php $script = '
    <script src="build/js/graficas.js"></script>
'; ?>