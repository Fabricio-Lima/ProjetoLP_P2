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

    $(function() {
      $('#cardnumber').payment('formatCardNumber');
      $('#cardexpiration').payment('formatCardExpiry');
      $('#cardcvc').payment('formatCardCVC');

      $('#cardnumber').keyup(function(event) {
        $('#label-cardnumber').empty().append($(this).val());
      });

      $('#cardexpiration').keyup(function(event) {
        var data = $(this).val() + '<span>' + $('#cardcvc').val() + '</span>';
        $('#label-cardexpiration').empty().append(data);
      });

      $('#cardcvc').keyup(function(event) {
        var data = $('#cardexpiration').val() + '<span>' + $(this).val() + '</span>';
        $('#label-cardexpiration').empty().append(data);
      });

      $('.button-cta').on('click', function () {
        var proceed = true;
        $(".field input").each(function(){
          $(this).parent().find('path').each(function(){
            $(this).attr('fill', '#dddfe6');
          });

          if(!$.trim($(this).val())){
            $(this).parent().find('path').each(function(){
              $(this).attr('fill', '#f1404b');
              proceed = false;
            });

            if(!proceed){
              $(this).parent().find('svg').animate({opacity: '0.1'}, "slow");
              $(this).parent().find('svg').animate({opacity: '1'}, "slow");
              $(this).parent().find('svg').animate({opacity: '0.1'}, "slow");
              $(this).parent().find('svg').animate({opacity: '1'}, "slow");
            }
          }
        });

        if(proceed)
        {
          $('.field').find('path').each(function(){
            $(this).attr('fill', '#3ac569');
          });
          $('.payment').fadeToggle('slow', function() {
            $('.paid').fadeToggle('slow', 'linear');
          });
        }
      });
    });
