
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
  var ValeurInputs,Input1;
  var total=0;
  ValeurInputs = document.getElementsByClassName('SearchAlpha');
  for(var i=0; i< ValeurInputs.length;i++){
    Input1 = parseInt(ValeurInputs[i].value);
    total+= Input1;
  }
  document.getElementById('Total').value = total;
}
