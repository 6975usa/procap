
<?php //monotagem do criterios para acesso


//error_reporting(E_ALL ^E_NOTICE ^E_WARNING ); //Todos menos noticias e warnings

// session_start();                                                                 #
/*
$_SERVER['REMOTE_USER'] = 'dtisisaux3' ; #
$_SESSION['username'] = $_SERVER['REMOTE_USER']  ; #
                                                                                #

require_once("conexao/conncige.php");
if( $dado == "PMC" ){
  $sql = "select a.".$dado."_Ver , a.".$dado."_Editar , a.".$dado."_Autorizar , a.".$dado."_Excluir
        from (militares as mil inner join acesso as a on a.idmilitar = mil.id)
        where mil.nome_log = '{$_SESSION['username']}'";
}else{
  $sql = "select a.".$dado."_Ver , a.".$dado."_Editar , a.".$dado."_Incluir , a.".$dado."_Excluir
          from (militares as mil inner join acesso as a on a.idmilitar = mil.id)
          where mil.nome_log = '{$_SESSION['username']}' or mil.Nome_log = '{$_SERVER['REMOTE_USER']}' ";
}

$res = mysql_query($sql);


 if( mysql_result($res,0,0)  == 0 ) {
        die("
<br><br><br>
<h3 align='center'>
     Militar sem acesso a esta p„gina:
     <font color='Blue' >
     {$_SESSION['username']}
     </font>
</h3>
<p align=left>
    Solicite acesso atrav„s de um Pedido de Suporte  informando:
</p>

    <ul type='disk' compact='false' >
        <LI type=square>Nome completo</LI>
        <li type=square>Posto/Gradua„„o</li>
        <li type=square>Nome de Log</li>
        <li type=square>Trabalho que necessita realizar nesta p„gina</li>
    </ul>



");
    }

$editar = false;
$novo = false;
$excluir = false;

$editar = false;
$novo = false;
$excluir = false;
if( mysql_result($res,0,1) <> 0  ) {
        $editar = true ;
    }
if( mysql_result($res,0,2) <> 0 ) {
    $novo = true ;
}
if( mysql_result($res,0,3) <> 0 ) {
   $excluir = true ;
    }


*/

$editar = true;
$novo = true;
//$excluir = true;

?>
