<div class="p-5 container d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center flex-column">
        <div>

            <h3 class="border  border-end-0 border-top-0 border-start-0 border-warning border-5 p-0">Perfil</h3>
        </div>
        <!-- <?php var_dump($_SESSION) ?> -->
        <div class="d-flex justify-content-center align-items-center flex-column w-75 ">
            <div class=" d-flex justify-content-center align-items-center flex-column w-25">
                <img src="/build/img/userwoman.png" class="w-75" alt="">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <hr class="h-color mx-2">
                <p class="text-center fw-bolder text-dark"> <?php echo ($_SESSION["Rol"]) ?></p>
                <form id="FormDatosUsuario" class="row d-flex flex-column justify-content-center  ">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" name="Nombres" id="Nombres">
                        </div>
                        <div class="col-md-6">
                            <label for="Apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" name="Apellidos" id="Apellidos">
                        </div>
                        <!-- <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputEmail">
                    </div> -->
                        <div class="col-md-6">
                            <label for="Telefono" class="form-label">Telefono</label>
                            <input type="number" class="form-control" name="Telefono" id="Telefono">
                        </div>
                    </div>
                    <div class="col">
                        <label for="Direccion" class="form-label">Dirección</label>
                        <textarea class="form-control" aria-label="With textarea" name="Direccion" id="Direccion"></textarea>
                    </div>
                    <div class=" d-flex flex-column justify-content-center align-items-center mt-4 ">

                        <button type="button" id="GuardarDatos" class="btn btn-primary w-25">Editar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php $script = '
 
    <script src="../build/js/perfil.js"></script>
'; ?>