var result = document.getElementById("result")
function edit(elem) {
  result.value = result.value + elem.value;
  }
function calc() {
  result.value = new Function("return " + result.value)();
  }
function cansell() {
  var cansell = document.getElementById("result")
  result.value = '';}