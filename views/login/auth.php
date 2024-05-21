<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden vh-100 d-flex flex-column justify-content-center align-items-center">


  <div class="container px-5 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5  bg-modificado  rounded-3  shadow-lg p-3 mb-5 ">
      <div class="col-lg-6 mb-5 mb-lg-0 " style="z-index: 10">
        <h1 class="my-5 display-5 fs-1 fw-bold ls-tight text-center" style="color: hsl(218, 81%, 95%)">
          Colegio Humberto Pavón Fonseca<br />
          <span style="color: hsl(218, 81%, 75%)">Catarina</span>
        </h1>
        <div class="d-flex flex-column justify-content-center align-items-center mb-5">
          <img src="/build/img/LOGO 1.png" class="w-25" alt="">
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <h3 class="my-5 fw-bold fs-1 ls-tight text-center" style="color: hsl(218, 81%, 95%)">
          Iniciar Sesión
        </h3>
        <div class="">
          <div class="">
            <form id="formlogin">
              <div class="mb-3 row d-flex justify-content-start ">
                <label for="usser" class="col-3 col-form-label text-white text-start d-flex  gap-3">Usuario </label>
                <div class="col-9">
                  <input type="text" class="form-control" name="usser" id="usser" placeholder="usuario">
                </div>
              </div>
              <div class="mb-3 row justify-content-end">
                <label for="password" class="col-3 text-white text-start  ">Contraseña </label>
                <div class="col-9">
                  <input type="password" class="form-control" name="password" id="password" placeholder="contraseña">
                </div>
              </div>

              <div class=" d-flex justify-content-center mt-5">
                <button type="submit" class="btn btn-primary  btn-lg" id="bt-login">
                  Iniciar Sesión
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$script = '
    <script src="build/js/login.js"></script>
';

?>