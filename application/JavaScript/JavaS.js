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
  var total=0.00;
  ValeurInputs = document.getElementsByClassName('SearchAlpha');
  for(var i=0; i< ValeurInputs.length;i++){
    if (ValeurInputs[i].value =="" | ValeurInputs[i].value == null) {
      Input1=0.00;
    } else {
      Input1 = parseFloat(ValeurInputs[i].value);
    }

    total+= Input1;
  }
  document.getElementById('Total').value = total.toFixed(2);
}

function CalculFraisParFrais(valeurDuInput,leTableauDesFrais){
  var InputClass,ValeurUnFrais,IndexFrais,ValeurdunInput,Resultat=0.00,StringIndex;
  InputClass = valeurDuInput.id;
  ValeurdunInput=valeurDuInput.value;

  for(var Cléprim in leTableauDesFrais){
    var valueTab = leTableauDesFrais[Cléprim];
    if(Cléprim == InputClass){
      Resultat = parseFloat(valueTab * ValeurdunInput);
      if(Resultat== null){
        Resultat =0.00;
      }
      document.getElementById('Resul'+Cléprim).value = Resultat.toFixed(2);
    }
  }
}

function CalculOnLoad(TableaudesMontants){
  var ValeurInputs,ClassInput,ValUnInput,Resultat;
  ValeurInputs = document.getElementsByClassName('SearchAlpha');
  for(var i=0;i< ValeurInputs.length;i++)
  {
    ValUnInput =ValeurInputs[i].value;
    ClassInput = ValeurInputs[i].id;

    for(var Cléprim in TableaudesMontants){
      var valueTab = TableaudesMontants[Cléprim];
      if(Cléprim == ClassInput){
        Resultat = valueTab * ValUnInput;
        if(Resultat == null){
          Resultat =0;
        }
        document.getElementById('Resul'+Cléprim).value = Resultat.toFixed(2);
      }
    }
    TotalFraisParFrais();
  }
}

function TotalFraisParFrais(){
  var Total=0.00,NumberUnInput=0.00,ToutlesInputs;
  ToutlesInputs = document.getElementsByClassName('ApplicationCalcul');
  for (var i = 0; i < ToutlesInputs.length; i++) {
    if (ToutlesInputs[i].value == "") {
      NumberUnInput = 0;
    } else {
      NumberUnInput = parseFloat(ToutlesInputs[i].value);
    }
    Total += NumberUnInput;

  }
  document.getElementById('TotalFrais').value = Total.toFixed(2);
}

function doPrint(){
  bdhtml = window.document.body.innerHTML;
  sprnstr = "<!--startprint-->";
  eprnstr = "<!--endprint-->";

  prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
  prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
  window.document.body.innerHTML=prnhtml;
  window.print();
  window.document.body.innerHTML = bdhtml;
}


function afficher(){
	document.getElementById('bt1').style.display = 'none';
	document.getElementById('bt2').style.display = 'inline';
}

function cache(){
	document.getElementById('bt1').style.display = 'inline';
	document.getElementById('bt2').style.display = 'none';

function Expiration(DateFiche){
  DateDu

}
