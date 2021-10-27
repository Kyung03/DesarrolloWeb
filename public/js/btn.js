
let seleccionar = document.querySelector('select');
let collection = seleccionar.selectedOptions;
seleccionar.addEventListener('change', seleccion_ciudad);

function seleccion_ciudad() {
  let eleccion = seleccionar.value;
  if (eleccion === '0') {
    botonOFF();
  } else  {
    botonON();
  } 
}

function botonON() {
  document.getElementById("button").disabled = false;
}
function botonOFF() {
  document.getElementById("button").disabled = true;
}