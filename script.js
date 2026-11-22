// Primero agarramos los elementos con los que vamos a trabajar.
const cuerpo = document.querySelector("body");
const botonModo = document.querySelector("#btn-tema");

// Y nos acordamos de en qué modo estamos con una variable.
// Empieza en false porque la tienda arranca de noche.
let esDeDia = false;

function alternarModo() {
  // toggle = si la clase está, la saca; si no está, la pone.
  cuerpo.classList.toggle("claro");

  // El signo ! da vuelta el valor: true pasa a false y al revés.
  esDeDia = !esDeDia;

  // Y cambiamos el texto del botón para que diga qué sigue.
  if (esDeDia) {
    botonModo.textContent = "🌙 Modo noche";
  } else {
    botonModo.textContent = "☀️ Modo día";
  }
}

// "Cuando le hagan clic a este botón, corre esa función."
botonModo.addEventListener("click", alternarModo);


// ------------------------------------------------------------
// MISIÓN 2: menú hamburguesa en celular
// El botón ☰ solo se ve dentro de la media query de la clase 5.
// El JavaScript no sabe nada de tamaños de pantalla: él solo
// pone y saca la clase .abierto. Quién la muestra es el CSS.
// Ojo con el target: la clase va sobre la LISTA (nav ul), no
// sobre el nav — adentro del nav está el botón que abre.
// ------------------------------------------------------------

const botonMenu = document.querySelector("#btn-menu");
const menu = document.querySelector("nav ul");

function alternarMenu() {
  menu.classList.toggle("abierto");
}

botonMenu.addEventListener("click", alternarMenu);
