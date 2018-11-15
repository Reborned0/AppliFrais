
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


function calculForfait() {
  var ValeurInputs,Input1;
  var total=0;
  ValeurInputs = document.getElementsByClassName('SearchAlpha');
  for(var i=0; i< ValeurInputs.length;i++){
    Input1 = parseInt(ValeurInputs[i].value);
    total+= Input1;
  }
  document.getElementById('Total').value = total;
}

function calculTotalFrais(value1){
  var valeurFrais, valeurQuant;
  var total1 = 0, totalFr = 0;
  valeurFrais = document.getElementsByClassName('SearchAlpha');
  for(var i=0; i< valeurFrais.length;i++){
    valeurQuant = parseInt(valeurFrais[i].value);
    totalFr = valeurQuant * value1;
    total1+= totalFr;
    document.getElementsByClassName('1').value = "10";
  }

  document.getElementById('TotalFrais').value = total1;
}
