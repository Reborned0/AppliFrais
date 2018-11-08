<<<<<<< HEAD
function PasAlpha()
{
=======
function maNumérique(ValueInput)
{
  var Inputvalue = ValueInput.value.length;
  var TabAlpha = genCharArray('a','z','A','Z');
  if (TabAlpha.includes(ValueInput[Inputvalue-1])) {
    
  }
>>>>>>> a8acc64ccd3bd1fca5de7b3730d1b869fde38b55
}

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

function test(param)
{
  alert("Changement");
  var x = 0;
  x = param;
  alert(x);

}

function total(param)
{
<<<<<<< HEAD


=======
  //  alert("chiffre");
>>>>>>> a8acc64ccd3bd1fca5de7b3730d1b869fde38b55
}
