<?php

/**
 * Tratamento de erro para o pacote os
 *
 * @author Anselmo S Ribeiro
 *
 */
class os_classes_Mail  {

   public $header;

   function __construct(){
      $this->header  = 'MIME-Version: 1.0' . "\r\n";
      $this->header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      $this->header .= 'From: Gab Cmt Ex - Telem�tica - Suporte TI ' . "\r\n";
   }



   function enviarMailAberturaOs($to,$os,$pessoaAbriu){
      $msg = "
      <h1>Suporte TI</h1>
      <h3>A OS $os foi aberta por $pessoaAbriu.</h3>";
      mail($to,'Abertura de OS',$msg,$this->header);
   }



   function enviarMailEncaminhamentoOs($encarregadoNovoMail,$encarregadoAntigoMail,$os,$motivo){
      $msg = "
      <h1>Suporte TI</h1>
      <h3>A OS $os foi encaminhada para voc� por $encarregadoAntigoMail, pelo seguinte motivo: <ul><li>$motivo</li></ul></h3>";
      mail($encarregadoNovoMail,'Encaminhamento de OS',$msg,$this->header);
   }




   function enviarMailDistribuicaoOs($to,$os){
      $msg = "
      <h1>Suporte TI</h1>
      <h3>A OS $os foi distribu�da para voc�.</h3>";
      mail($to,'Distribui�ao de OS',$msg,$this->header);
   }




   function enviarMailFechamentoOs($to,$os, array $solucoes){
      $msg = "<h1>Suporte TI</h1>";
      $msg .= "<h4>A OS $os foi fechada com as seguintes solu��es:" ;
      $msg .= "<ul>";
      foreach ($solucoes as $solucao){
         $msg .= '<li>'.$solucao['0'].'</li>';
      }
      $msg .= "</ul></h4>";

      if(!empty($to)){
         if(!mail($to,'Fechamento de OS',$msg,$this->header)){
            throw new Exception('Erro ao enviar Email.');
         }
      }

   }


}

?>