<?php

/**
CONTANTS DEFINITION
*/

/** GENERAL */
define('GLOBAL_TITLE','Pesquisa'); //Extensao padrao para paginas de edicao.

define('SITE_ROOT'            ,'');
define('STATIC_URL'           ,SITE_ROOT.'/system/public/static');


//define('BASE_ROOT'            ,$_SERVER['DOCUMENT_ROOT']);
define('BASE_ROOT'            ,'/home/lojadami/www/desenv' );
define('SYSTEM_DIRECTORY'     ,'/system');
define('SYSTEM_ROOT'          ,BASE_ROOT.SITE_ROOT.SYSTEM_DIRECTORY);
define('APPLICATIONS_ROOT'    ,SYSTEM_ROOT.'/applications');
define('APP_ROOT'             ,SYSTEM_ROOT.'/applications');
define('SHARE_ROOT'           ,SYSTEM_ROOT.'/share');
define('CLASSES_ROOT'         ,SHARE_ROOT.'/classes');
define('PUBLIC_ROOT'          ,SYSTEM_ROOT.'/public');
define('PEAR_ROOT'            ,CLASSES_ROOT.'/pear');
define('SYSTEM_TEMPLATES_DIR' ,SHARE_ROOT.'/classes/view/templates'); // system templates directory / do not change that, unless you are absolutly sure about what you are doing
define('REGISTRY_FILE'        , SYSTEM_ROOT.'/log');
define('DS'                   , DIRECTORY_SEPARATOR );

define('URL_VALIDATION_METHOD' ,'url_target'); // redirect or url_target


/** DEBUG */
define('DEBUG_SQL',false);
define('DEBUG_REQUEST',false);
define('DEBUG_AUTO_LOAD',false);


/** PAGING */
define('REGISTRIES_PER_PAGE',10); //NUMERO DE REGISTROS QUE SERAO EXIBIDOS POR PAGINA
define('NAVS',0); //NUMERO DE NAVEGADORES DE PAGINA QUE SERAO EXIBIDOS NA PAGINACAO
define('NAV_METHOD','Sliding'); // 'Sliding' OR Jumping - forma de mostrar os navegadores
define('PREV_IMG','[<]');# prevImg (string): sth (it can be text such as " PREV" or an <img/> as well...) to display instead of "".
define('NEXT_IMG','[>]');# nextImg (string): same as prevImg, used for NEXT link, instead of the default value, which is ">>".
define('FIRST_PAGE_TEXT','<<');
define('LAST_PAGE_TEXT','>>');
define('SPACES_AFTER_SEPARATOR',1);
define('SPACES_BEFORE_SEPARATOR',1);


/** EDITING */
define('DEFAULT_EDIT_TITLE','Editar '); //Extensao padrao para paginas de edicao.
define('DEFAULT_EXTORNAR_TITLE',"<img src='/public/static/framework/images/delete.gif' border=o>");
define('INSERT_BUTTON_LABEL','Inserir');
define('UPDATE_BUTTON_LABEL','Alterar');
define('DELETE_BUTTON_LABEL','Deletar');
define('LIST_BUTTON_LABEL','Exibir Lista');
define('NEW_BUTTON_LABEL','Novo');
define('DELETE_MESSAGE','Confirma DELETAR Registro?');


/** MESSAGES */
define('RESGISTRY_INSERTED_SUCCESSFULLY','Registro INSERIDO com sucesso');
define('RESGISTRY_UPDATED_SUCCESSFULLY','Registro ATUALIZADO com sucesso');
define('RESGISTRY_DELETED_SUCCESSFULLY','Registro DELETADO com sucesso');
define('NEW_RESGISTRY_MSG','Novo Registro');
define('LS_UPDATE_MSG','Novo Registro');

define('DEFAULT_ERROR_MESSAGE','<h1>Ocorreu um erro!!!</h1>');
define('JS_PRE_WARNING', 'Os Campos abaixo não foram preenchidos corretamente:');
define('JS_POST_WARNING','Por favor, corrija os erros.');


/** do not change the below setings ********************/
define('INSERT_BUTTON_NAME','MM_insert');
define('UPDATE_BUTTON_NAME','MM_update');
define('DELETE_BUTTON_NAME','MM_delete');
define('NEW_BUTTON_NAME','MM_new');
define('LIST_BUTTON_NAME','MM_list');
/** do not change the above setings *******************/


?>
