
$(function(){

   $('#cod_estado').change(function(){
      if( $(this).val() ) {
         $('#cod_cidade').hide();
         $('#carregando_cidade').show();
         $.getJSON('saad.inf.br/desenvolvimento/voaviola/cidade.ajax.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value=""></option>';
            for (var i = 0; i < j.length; i++) {
               options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
            }
            $('#cod_cidade').html(options).show();
            $('#carregando_cidade').hide();
         });
      } else {
         $('#cod_cidade').html('<option value="">– Escolha um estado –</option>');
      }
   });

   $('#cod_pais').change(function(){
      if( $(this).val() ) {
         $('#cod_estado').hide();
         $('#cod_cidade').hide();
         $('#carregando_estado').show();
         $.getJSON('saad.inf.br/desenvolvimento/voaviola/estados.ajax.php?search=',{cod_pais: $(this).val(), ajax: 'true'}, function(j){
            var options = '<option value=""></option>';
            for (var i = 0; i < j.length; i++) {
               options += '<option value="' + j[i].cod_estados + '">' + j[i].nome + '</option>';
            }
            $('#cod_estado').html(options).show();
            $('#carregando_estado').hide();
         });
      } else {
         $('#cod_estado').html('<option value="">– Escolha um país –</option>');
      }
      $('#cod_cidade').html('<option value="">– Escolha um estado –</option>');
   });

});
