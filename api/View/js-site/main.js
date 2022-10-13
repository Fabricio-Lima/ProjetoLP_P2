  $(".colour-value span").click(function(){
  $(".colour-value span").removeClass("active");
  $(this).addClass("active");
  $("body").css("background", $(this).attr("data-color"));
  $(".wrapper .price").css("color", $(this).attr("data-color"));
  $(".size-value span.color").css("color", $(this).attr("data-color"));
  $(".size-value span.active").css("background", $(this).attr("data-color"));
  $(".image img").attr("src", $(this).attr("data-img"));
  $(".btns button").css({
    "background": $(this).attr("data-color"),
    "border-color": $(this).attr("data-color")
  });
});
