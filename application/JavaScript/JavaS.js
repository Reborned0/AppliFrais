
function genCharArray() {
  var a = [], num;
  for(var i=0;i<10000;++i){
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
function CalculFraisParFrais(valeurDuInput,leTableauDesFrais){
   var InputClass,ValeurUnFrais,IndexFrais,ValeurdunInput,Resultat,StringIndex;
   InputClass = valeurDuInput.id;
   ValeurdunInput = valeurDuInput.value;

  for(var Cléprim in leTableauDesFrais){
    var valueTab = leTableauDesFrais[Cléprim];
    if(Cléprim == InputClass){
      Resultat = valueTab * ValeurdunInput;
      if(Resultat== null){
        Resultat =0;
      }
      document.getElementById('Resul'+Cléprim).value = Resultat;
      console.log(Resultat);

    }
  }
}
//faire un tableau associatif de frais forfaits le recup en js puis le comparer
//ex :tab[0] =ETP -> 110 puis le multiplier
