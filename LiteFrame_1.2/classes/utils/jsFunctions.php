<?php

final class classes_utils_jsFunctions {


   static function jsReloadOpenerAndClose( $target = null ){

      if( !is_null($target) ){
         $str =  '
            <script type="text/javascript" language="javascript" >
               window.opener.location.href="'.$target.'"
               window.close();
            </script>
            ';
      }
      else{
         $str = '
                  <script type="text/javascript" language="javascript" >
                  window.opener.location.reload(true);
                  window.close();
                  </script>
                  ';
      }
      echo $str;

      die;

   }


   static function redirect( $target ){

         $str =  '
            <script type="text/javascript" language="javascript" >
               window.location.href="'.$target.'"
            </script>
            ';
      echo $str;

      die;

   }


   static function alert( $msg ){

         $str =  "
            <script type='text/javascript' language='javascript' >
               window.alert('".$msg."')
            </script>
            ";
      return   $str;

   }


   static function jsExec( $cmd ){

      $str =  "
            <script type='text/javascript' language='javascript' >
               $cmd;
            </script>
            ";
      die($str);

   }


   static function carregaFormViaPostParaUrl( $target , array $values ){
      //function carregaFormViaPostParaPopup(valor,target,larg,alt){

      $str = "
      <html><body></body></html>
      <script type='text/javascript' language='javascript' >
         formulario = document.createElement('form');
         formulario.id = 'sendform';
         formulario.target = '_self' ;
         formulario.action = '$target';
         formulario.method = 'POST'; ";

      foreach ($values as $nome=>$valor){
         $str .= "
         var newField1 = document.createElement('input');
         newField1.setAttribute('name', '$nome');
         newField1.setAttribute('id', '$nome');
         newField1.setAttribute('type', 'hidden');
         newField1.setAttribute('value', '$valor');
         formulario.appendChild(newField1);";
      }

      $str .= "

         document.body.appendChild(formulario);

         //   formulario.target = 'nome_da_janela';
         //var winl = (screen.width - larg) / 3, wint = (screen.height - alt) / 3;
         //var winprops = 'height='+alt+',width='+larg+',top='+wint+',left='+winl+',resizable=no,status=no';

         //var myWin = window.open('about:blank', formulario.target, winprops);

         formulario.submit();
         </script>

      ";

      die($str);

   }



   function carregaFormViaPost($values,$action){
      $str =  "
         <html>
            <head>
               <script language='JavaScript'>
                  function carregaFormViaPost(values,action){
                     formulario = document.createElement('form');
                     formulario.id = 'sendform';
                     formulario.target = '_self' ;
                     formulario.action = action;
                     formulario.method = 'POST';
                     for (var cont=0; cont < values.length; cont+=2) {
                        var newField1 = document.createElement('input');
                        newField1.setAttribute('name', values[cont] );
                        newField1.setAttribute('id', values[cont] );
                        newField1.setAttribute('type', 'hidden');
                        newField1.setAttribute('value', values[cont+1] );
                        formulario.appendChild(newField1);
                     }
                     document.body.appendChild(formulario);
                     formulario.submit();
                  }
               </script>
            </head>
            <body onLoad='javascript:carregaFormViaPost(Array(";

      foreach ($values as $codigo=>$valor){
         $str .= "\"$codigo\",\"$valor\"";
      }
            //'codigo','valor'


            $str .=
            "),\"$action\")'>
            </body>
         </html>
         ";

      die($str);
   }

}

?>