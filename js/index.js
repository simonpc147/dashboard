const targets = document.querySelectorAll("[data-target]");
const content = document.querySelectorAll("[data-content]");

targets.forEach((target) => {
  target.addEventListener("click", () => {
    content.forEach((c) => {
      c.classList.remove("active");
    });
    const t = document.querySelector(target.dataset.target);
    t.classList.add("active");

    const a = document.querySelector(target.dataset.target);
    a.classList.add("active");
  });
});


function activar(){document.getElementById("open").classList.add("active");}
function activarChats(){document.getElementById("chats-content").classList.add("active");}
function removerChats(){document.getElementById("chats-content").classList.remove("active");}
function activarEspera(){document.getElementById("espera-content").classList.add("active");}
function removerEspera(){document.getElementById("espera-content").classList.remove("active");}
function remover(){document.getElementById("open").classList.remove("active");}
function activar2(){document.getElementById("resolved").classList.add("active");}
function remover2(){document.getElementById("resolved").classList.remove("active");}

let abierto = document.getElementById("abierto").onclick = function(){

    if (activar() == true){
        activar();
    } else {
        remover2();
    }
}

let abierto2 = document.getElementById("resuelto").onclick = function(){
    if( activar2() == true) {
        activar2();
    } else {
        remover();
    }
}

document.getElementById("chats").onclick = function(){

    if (activarChats() == true){
        activarChats();
    } else {
        removerEspera();
    }
}

document.getElementById("espera").onclick = function(){
    if( activarEspera() == true) {
        activarEspera();
    } else {
        removerChats();
    }
}

let button = document.getElementById("dark-two")
// .classList.replace("bi-brightness-low","bi-brightness-low-fill");

let titles = document.querySelectorAll("#barra-titulo, #sidenavAccordion, #whatsapp-One, #conexiones-One, #contactos-One, #respuesta-One, #documentos-One, #equipo-One, #chatbots-One, #campaña-One, #informes-One, #configuracion-One, #wps, #notificacion, #mensaje, #icon, #cuenta2");
let secciones = document.querySelectorAll(".text-h5, .container-seccion, .container-one, .title-active, .two, .subtitle, .buscador2, .jss103, .jss104, .container-two, .title-seccion, .MuiTableCell-head, .multitablet, .container-prymary, .parrafo, .buscador3")

button.addEventListener('click', () => {

   if(button.classList.contains("bi-brightness-low-fill") == true) {
    document.getElementById("dark-two").classList.replace("bi-brightness-low-fill", "bi-brightness-low");
    } else {
    document.getElementById("dark-two").classList.replace("bi-brightness-low","bi-brightness-low-fill");
    }

    for (i = 0; i<titles.length; i++ ){
        titles[i].classList.toggle("active");
    }
})

button.addEventListener('click', () => {
    for (i = 0; i<secciones.length; i++ ){
        secciones[i].classList.toggle("activee");
    }
})
   

// let sombra = getElementsByClassName(".sombra")
// let titulo = getElementsByClassName("nav-link");
    // let titulo = document.getElementById("conexiones-One");

    // titulo.addEventListener('click', () => {
    //     document.getElementById("conexiones-One").classList.toggle("sombra");
    // })