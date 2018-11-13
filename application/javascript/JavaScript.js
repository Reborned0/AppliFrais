function antialpha()
{
  alert('test');
}

function test(param)
{
  alert(param);
  return unTest;
}

function calculForfait() {
var total = 0;
for (var i = 1; i < 2; i++) {
var choix = 0;
choix = parseInt(document.getElementByValue('forfait' + i).value);
var chosen = 0;

//Si qqchse de non vide est saisi on ajoute le prix
//Condition a modifier si le format du code doit etre vérifié...
if (document.getElementById('chosen' + i).value.replace(/^\s+/, '') != '') {
chosen = 199;
}
total = total + choix + chosen;
}

document.getElementById('total').value = total;
}
