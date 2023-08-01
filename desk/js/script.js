"use strict";

// Tirar espaço do input usuario

$(function () {
  $("#usuario").keypress(function (event) {
    if (event.which == 32) {
      return false;
    }
  });

});

$(function () {
  $("#senha").keypress(function (event) {
    if (event.which == 32) {
      return false
    }
  });
});


// função para a matricula aceitar apenas números
$(function () {
  $("#matricula").keypress(function (event) {
    if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
      alert('apenas números!')
      return false
    }
  });
});

// função do olho no index

var senha = document.getElementById('senha');
var icon = document.getElementById('mostrar');
icon.addEventListener('click', togglePass);

function togglePass() {
  if (senha.type == 'password') {
    senha.type = 'text';
    icon.src = '/desk/img/eye.svg';

  } else {
    senha.type = 'password';
    icon.src = '/desk/img/eye-off.svg';
  }

}
