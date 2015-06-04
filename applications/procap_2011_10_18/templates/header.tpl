<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="pt-BR"
    lang="pt-BR"
    dir="ltr">

<head>

   <title>Procap - Acompanhamento de Processos</title>
   <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />

   <meta name="description" content="Projeto" />
   <meta name="author" content="Anselmo S Ribeiro" />

   <link rel="stylesheet" href="{s $static_url s}/procap/style.css" type="text/css" media="screen" />
   <!--[if IE 6]><link rel="stylesheet" href="{s $static_url s}/procap/style.ie6.css" type="text/css" media="screen" /><![endif]-->
   <!--[if IE 7]><link rel="stylesheet" href="{s $static_url s}/procap/style.ie7.css" type="text/css" media="screen" /><![endif]-->

   <link href='{s $static_url s}/procap/css/azul.css' rel='stylesheet' type='text/css'>

   <script type="text/javascript" src="{s $static_url s}/procap/jquery.js"></script>
   <script type="text/javascript" src="{s $static_url s}/procap/script.js"></script>
   <script language="javascript" type="text/javascript" src="{s $static_url s}/framework/js/default.js"></script>
   <script language="javascript" type="text/javascript" src="{s $static_url s}/framework/js/jquery.js"></script>
   <script language="javascript" type="text/javascript" src="{s $static_url s}/framework/js/jquery.maskedinput-1.2.2.js"></script>

</head>


   {s foreach from=$messages.success item=message  s}
      <!--<div id="showMessage" class="successMessage">{s $message s}</div>-->
   {s /foreach s}
   {s foreach from=$messages.error item=message  s}
      <!--<div id="showMessage" class="errorMessage">{s $message s}</div>-->
   {s /foreach s}


<body>
<div id="art-page-background-glare">
   <div id="art-page-background-glare-image">
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body"  >
                <div class="art-header">
                    <div class="art-header-center">
                        <div class="art-header-png"></div>
                        <div class="art-header-jpeg"></div>
                    </div>
                    <div class="art-logo">
                     <h1 id="name-text" class="art-logo-name"><a href="{s $site_url s}/procap/default/   ">Procap</a></h1>
                     <h2 id="slogan-text" class="art-logo-text">Acompanhamento de Processos</h2>
                    </div>
                </div>