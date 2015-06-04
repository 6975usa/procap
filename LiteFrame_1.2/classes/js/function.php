<?php
/**
 * Este arquivo é  parte do programa LiteFrame - lightWeight FrameWork
 *
 * Copyright (C) 2010 Anselmo S Ribeiro
 *
 */

/**
 *
 * @package	LiteFrame - lightWeight FrameWork
 * @version	1.0
 * @since	1.0
 * @author	Anselmo S Ribeiro <anselmo.sr@gmail.com>
 * @copyright	2010 Anselmo S Ribeiro
 * @licence	LGPL
 */
class classes_js_function {

   function __construct(){

   }



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
      return  $str;
   }


   static  function jsExec( $cmd ){

      $str =  "
            <script type='text/javascript' language='javascript' >
               $cmd;
            </script>
            ";
      return $str;

   }




   static function carregaFormViaPostParaUrl( $target , array $values ){
      //function carregaFormViaPostParaPopup(valor,target,larg,alt){

      $str = "
      <html><body></body></html>
      <script type='text/javascript' language='javascript' >
         formulario = document.createElement('form');
         formulario.id = 'sendform';
         //formulario.target = '$target' ;
         formulario.action = '$target';
         formulario.method = 'POST'; ";

      foreach ($values as $nome=>$valor){
         $str .= "
         var newField1 = document.createElement('input');
         newField1.setAttribute('name', '$nome');
         newField1.setAttribute('id', '$nome');
         newField1.setAttribute('type', 'hidden');
         newField1.setAttribute('value', $valor);
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

      return $str;

   }



   static  function carregaFormViaPost($values,$action){
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

      return $str;
   }


   static  function alert($msg){
      $str="<script language='JavaScript'>
               var b = document.getElementsByTagName('body');
               alert(b.length);
               b[b.length-1].onLoad = 'showMessage()';
               //alert(b[b.length-1].id);
               //document.write(document.readyState)
               function showMessage(){
                  alert('$msg');
               }
            </script>";
      return $str;
   }



}



?>