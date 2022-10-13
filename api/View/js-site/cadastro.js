function formatar(mascara, documento){
var i = documento.value.length;
var saida = mascara.substring(0,1);
var texto = mascara.substring(i)

if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
}
}
$('.button-forms').click(function(){
$('.modal').toggleClass("show");
$('.show-btn').addClass("disabled");
  });
$('.close-icon').click(function(){
$('.modal').toggleClass("show");
$('.button-forms').removeClass("disabled");
  });
$('.close-btn').click(function(){
$('.modal').toggleClass("show");
$('.button-forms').removeClass("disabled");
  });
