"use strict";

// Tirar espaço do input usuario

$(function () {
    $("#usuario").keypress(function (event) {
      if (event.which == 32) {
        return false;
      
    });
  
  });

  $(function () {
    $("#senha").keypress(function (event) {
      if (event.which == 32) {
         return false
      }
    });
  });

  
  $(function () {
    $("#matricula").keypress(function (event) {
      if (event.which == 32) {
         return false
      }
    });
  });
