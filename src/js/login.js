

(function () {

  const btnlogin = document.querySelector("#bt-login");
  //     const formlogin = document.querySelector("#formlogin").addEventListener("submit",(e) => {
  //       e.preventDefault()
  //       alert("inciiando");
  //   });

  btnlogin.addEventListener("click", (e) => {
    e.preventDefault();
    login();
  });

  async function login() {
    const formularioLogin = document.querySelector("#formlogin");
    formularioLogin.addEventListener("submit", async (e) => {
      e.preventDefault();
    });
  
    try {
      const formLogin = new FormData(formularioLogin);
      const resultado = await fetch("http://localhost:6060/login", { method: "POST", body: formLogin });
     
      const respuesta = await resultado.json();

      // console.log(respuesta.data);

   
      if (respuesta.resp == true) { 
        const dataLogin = JSON.stringify(respuesta.data);
        sessionStorage.setItem("data", dataLogin)
        window.location.href = "/dashboard";
      } else if (respuesta.error) {
        await mostrarAlertasErrorSecuenciales(respuesta.error);
      } 
    } catch (error) {
      console.log(error);
    }
  }
  
  async function mostrarAlertasErrorSecuenciales(errores) {
    for (const error of errores) {
      await llamarAlertasError(error);
    }
  }
  
  async function llamarAlertasError(mensaje) {
    console.log("error: ", mensaje);
    await Swal.fire({
      icon: "error",
      html: `<span style="font-size: 1.5rem; font-weight: 900;">${mensaje}</span>`,
      toast: true,
      position: 'bottom-end',
      iconColor: 'red',
      timer: 1500,
      padding: "2rem",
      background: 'rgb(231, 184, 184)',
      showConfirmButton: false,
    });
  }
})();
