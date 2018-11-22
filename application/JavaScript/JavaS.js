function genCharArray() {
  var a = [], num;
  for(var i=0;i<1000;++i){
       a.push(String.fromCharCode(i));
  }
for(var j=0;j<=9;j++){
  num = a.indexOf(j.toString());
  a.splice(num,1);
}
  return a;
}
function ChercheAlpha(valueinput){
  var ValeurInput, TableauAlpha, IndexFin, ValeurDebut, ValeurFin;
  ValeurInput = valueinput.value;
  IndexFin = ValeurInput.length -1;
  TableauAlpha = genCharArray();
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

  document.getElementsByClassName('1').value = "10";
  document.getElementById('TotalFrais').value = "total1";
}
