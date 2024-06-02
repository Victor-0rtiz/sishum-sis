<div class="sidebar" id="side_nav">
        <div class="header-box px-2 pt-3 pb-2 d-flex justify-content-center">
                <img src="/build/img/logoone3.png" class="w-75" alt="">
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa fa-stream"></i></button>
        </div>

        <div class=" d-flex justify-content-center ">
                <img src="/build/img/userwoman.png" class="w-25" alt="">
        </div>
        <div class="d-flex flex-column justify-content-center">

                <p class="text-center fs-3 mb-0">Rol: <?php echo $_SESSION["Rol"]; ?></p>


        </div>
        <hr class="h-color mx-1">
        <ul class="list-unstyled px-2 mt-1 d-flex flex-column">

                <?php if ($_SESSION["Id_Tipo_Usuario"] == 1) { ?>
                        <li class="wapperlist"><a href="/dashboard" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard") ? "activa" : "modifywapper"; ?> "><i class="pe-2 fa fa-home"></i> Inicio</a></li>
                <?php  } ?>
                <li class="wapperlist"><a href="/dashboard/perfil" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/perfil") ? "activa" : "modifywapper"; ?> "> <i class="pe-2 fa-solid fa-user"></i>Perfil</a></li>
                <?php if ($_SESSION["Id_Tipo_Usuario"] == 1) { ?>
                        <li class="wapperlist"><a href="/dashboard/estudiantes" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/estudiantes") ? "activa" : "modifywapper"; ?> "> <i class=" pe-2 fa-solid fa-children"></i>Estudiantes</a></li>
                        <li class="wapperlist"><a href="/dashboard/tutores" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/tutores") ? "activa" : "modifywapper"; ?> "> <i class="pe-2 fa-solid fa-person-half-dress"></i>Tutores</a></li>
                        <li class="wapperlist"><a href="/dashboard/matriculas" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/matriculas") ? "activa" : "modifywapper"; ?>"> <span><i class="pe-2 fa-solid fa-file"></i> Matriculas</span> </a></li>

                <?php  } ?>


                <li class="wapperlist"><a href="/dashboard/calificaciones" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/calificaciones") ? "activa" : "modifywapper"; ?> "><i class="pe-2 fa-regular fa-pen-to-square"></i> Calificaciones</a></li>

                <?php if ($_SESSION["Id_Tipo_Usuario"] == 1) { ?>
                        <li class="wapperlist"><a href="/dashboard/asignaturas" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/asignaturas") ? "activa" : "modifywapper"; ?> "><i class="pe-2 fa-solid fa-layer-group"></i>Asignaturas</a></li>
                        <li class="wapperlist"><a href="/dashboard/estudiantes" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/estudiantes") ? "activa" : "modifywapper"; ?> "> <i class=" pe-2 fa-solid fa-children"></i>Estudiantes</a></li>
                        <li class="wapperlist"><a href="/dashboard/docentes" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/docentes") ? "activa" : "modifywapper"; ?> "><i class="pe-2 fa-solid fa-chalkboard-user"></i> Docentes</a></li>
                        <li class="wapperlist"><a href="/dashboard/usuarios" class="text-decoration-none px-3 py-2 d-block <?php echo pagina_actual("/dashboard/usuarios") ? "activa" : "modifywapper"; ?> "><i class="pe-2 fa-solid fa-users"></i> Usuarios</a></li>
                <?php  } ?>
        </ul>
        <hr class="h-color mx-2">

        <!-- <ul class="list-unstyled px-2">
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-bars"></i>
                                Settings</a></li>
                <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-bell"></i>
                                Notifications</a></li>

        </ul> -->

</div>