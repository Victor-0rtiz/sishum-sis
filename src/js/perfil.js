(function () {
    const user = sessionStorage.getItem("data");

    let userDataObject;

    const userObject = JSON.parse(user);
    console.log(userObject);




    $.ajax({
        url: '/api/usuarios/unic', // Especifica la URL de tu controlador
        data: { 'Id': userObject.Id },
        type: "POST",
        dataType: 'json', // El tipo de datos esperado en la respuesta
        success: function (response) {
            // Manejar la respuesta del servidor
            console.log(response, "respuesta");

            userDataObject = response;


            $.each(response, (key, value) => {

                $('#' + key).val(value);

            });


        },
        error: function (xhr, status, error) {
            // Manejar errores de la solicitud AJAX
            console.error(xhr.responseText);
        }
    });


    $(document).ready(() => {

        $('#GuardarDatos').click(async () => {
            let formulario = new FormData($("#FormDatosUsuario")[0]);

            formulario = formDataToObject(formulario);
            formulario.Id_Usuario = userObject.Id;
            formulario.Id = userDataObject.Id;

            const FormularioMod = { ...userDataObject, ...formulario }



            $.ajax({
                url: '/api/perfil/edit', // Especifica la URL de tu controlador
                data: FormularioMod,
                type: "POST",
                dataType: 'json', // El tipo de datos esperado en la respuesta
                success: async function (response) {
                    // Manejar la respuesta del servidor
                    console.log(response, "respuesta de editar");

                    if (response.exito) {
                        $.each(FormularioMod, (key, value) => {

                            $('#' + key).val(value);

                        });

                        await Swal.fire({
                            icon: "success",
                            html: `<span style="font-size: 1.5rem; font-weight: 900;">${response.exito}</span>`,
                            toast: true,
                            position: 'bottom-end',
                            iconColor: 'green',
                            timer: 1500,
                            padding: "2rem",
                            background: '#B8FFB8',
                            showConfirmButton: false,
                        });

                        const newDataSesion = response.Data;
                        
                        const dataSetSS= JSON.stringify({...userObject,...newDataSesion, })
                        
                        sessionStorage.setItem('data', dataSetSS)

                        return;
                    }





                },
                error: function (xhr, status, error) {
                    // Manejar errores de la solicitud AJAX
                    console.error(xhr.responseText);
                }
            });

        })







    });

    function formDataToObject(formData) {
        let obj = {};
        formData.forEach((value, key) => {
            obj[key] = value;
        });
        return obj;
    }



})()