var element = document.getElementById('imask');
var maskOptions = {
  mask: '+{000}(00)000-00-00'
};
var mask = IMask(element, maskOptions);

var element = document.getElementById('imask-second');
var maskOptions = {
  mask: '+{000}(00)000-00-00'
};
var mask = IMask(element, maskOptions);