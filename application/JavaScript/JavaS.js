
function genCharArray(charA,charZ,chara,charz) {
  var a = [], i = charA.charCodeAt(0), j = charZ.charCodeAt(0), k = chara.charCodeAt(0), l = charz.charCodeAt(0);
  for (; i <= j; ++i) {
    a.push(String.fromCharCode(i));
  }
  for(;k <= l; k++){
    a.push(String.fromCharCode(k));
  }
  return a;
}
function ChercheAlpha(valueinput){
  var ValeurInput, TableauAlpha, IndexFin;
  ValeurInput = valueinput.value;
  IndexFin = ValeurInput.length -1;
  TableauAlpha = genCharArray('a','z','A','Z');
  if(TableauAlpha.includes(ValeurInput[IndexFin]))
  {
    valueinput.value = ValeurInput.substring(0,IndexFin);
  }
}

function calculForfait(valueinput2) {
var total = 0;
var chosen = 0;

//Si qqchse de non vide est saisi on ajoute le prix
//Condition a modifier si le format du code doit etre vérifié...
if (document.getElementById('chosen').value==true) {
chosen = 199;
}else{}
total = total + choix + chosen;

document.getElementById('Total').display = 1;
}
