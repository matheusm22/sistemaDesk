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
$(function() {
  $("#matricula").keypress(function(event) {
      if (event.which != 8 && event.which != 0 && (event.which < 48 || event.which > 57)) {
          alert('apenas números!') 
          return false
      }
  });
});
