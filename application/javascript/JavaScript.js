function maNumérique(ValueInput)
{
  var Inputvalue = ValueInput.value;
  var TabAlpha = genCharArray('a','z','A','Z');
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
  alert(param);
  parseInt(param) += param;
  alert(parseInt(param));
}

function total(param)
{


}
