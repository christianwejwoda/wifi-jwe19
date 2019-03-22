$(document).ready(function(){
      $("a.zutat-neu").click(function() {
        var neueZutat = $(".zutatenliste .zutat-leer").clone();
        neueZutat.removeClass("zutat-leer");
        neueZutat.find("select, input").val('');
        neueZutat.appendTo(".zutatenliste");
      });
});
