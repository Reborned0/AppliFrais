
function genCharArray() {
  var a = [],test;
  for(var i=0;i<128;++i){
       a.push(String.fromCharCode(i));
  }
for(var j=0;j<10;j++){
  test = a.indexOf(j.toString());
  a.splice(test,1);
}

  return a;
}
function ChercheAlpha(valueinput){
  var ValeurInput, TableauAlpha, IndexFin, ValeurDebut, ValeurFin;
  ValeurInput = valueinput.value;
  IndexFin = ValeurInput.length -1;
  TableauAlpha = genCharArray();
  alert(TableauAlpha);
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
