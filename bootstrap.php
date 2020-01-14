<?php

// Verifica se as dependências do framworks foram baixadas via composer
if(!file_exists('./vendor/autoload.php')){
	exit('Favor execute composer install para baixar as dependências');
}

require_once('./vendor/autoload.php');

if(php_sapi_name() !== 'cli'){
    
    // Armazena barra de separação de diretório conforme sistema operacional
    if(!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR);
    }

    // Nome do diretório do projeto 'onframework'
    if(!defined('PATH')){
        define('PATH', dirname(__FILE__));
    }

    // Nome do diretório do projeto onde se encontra este sistema
    if(!defined('PATH_PROJECT')){
        define('PATH_PROJECT', dirname(dirname(__FILE__)));
    }

    // Armazena a url base do servidor, exemplo: http://localhost ou http://localhost:81
    if(!defined('URL_PATH')){
        define('URL_PATH', (((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS']!=='off') || $_SERVER['SERVER_PORT']==443) ? 'https://':'http://' ).$_SERVER['HTTP_HOST']);
    }

    // Armazena a url base do camiho onde o sistema está, exemplo: / ou /diretorio/matriz/
    if(!defined('URL_BASE')){
        define('URL_BASE', str_replace('index.php', null, $_SERVER['SCRIPT_NAME']));
    }

    // Armazena a url corrente, exemplo http://diretorio/onframework/clients/gerar-relatorio
    if(!defined('URL_CURRENT')){
        define('URL_CURRENT', URL_PATH . $_SERVER['REQUEST_URI']);
    }
}