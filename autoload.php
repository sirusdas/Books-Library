<?php
require_once 'PHPUnit/Autoload.php';
require 'vendor/autoload.php';


//require_once 'Books/Book.php';
 //require_once 'LibraryFacade.php';
function autoload($className)
{   
	//echo $className;
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    // var_dump($className);
  //  echo $fileName;
    require $fileName;
}
//autoload("BookLibraryEditor/LibraryFacade");
spl_autoload_register('autoload');

