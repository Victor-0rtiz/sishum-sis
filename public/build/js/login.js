!function(){async function o(o){console.log("error: ",o),await Swal.fire({icon:"error",html:`<span style="font-size: 1.5rem; font-weight: 900;">${o}</span>`,toast:!0,position:"bottom-end",iconColor:"red",timer:1500,padding:"2rem",background:"rgb(231, 184, 184)",showConfirmButton:!1})}document.querySelector("#bt-login").addEventListener("click",(t=>{t.preventDefault(),async function(){const t=document.querySelector("#formlogin");t.addEventListener("submit",(async o=>{o.preventDefault()}));try{const n=new FormData(t),e=await fetch("http://localhost:6060/login",{method:"POST",body:n}),r=await e.json();if(1==r.resp){const o=JSON.stringify(r.data);sessionStorage.setItem("data",o),window.location.href="/dashboard"}else r.error&&await async function(t){for(const n of t)await o(n)}(r.error)}catch(o){console.log(o)}}()}))}();//# sourceMappingURL=login.js.map
