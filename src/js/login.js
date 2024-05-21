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
    formularioLogin.addEventListener("submit", async(e)=>{
      e.preventDefault();
    })
    
    try {
      const fomrlogin = new FormData(formularioLogin);
      const resultado = await fetch("http://localhost:6060/login", { method: "POST", body: fomrlogin });
      const respuesta = await resultado.json();     
      console.log(respuesta);
      if (respuesta.respuesta == true) {
        window.location.href = "http://localhost:6060/dashboard";
      }
    } catch (error) {
        console.log(error);
    }
  }
})();
