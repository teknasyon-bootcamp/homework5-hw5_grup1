<?php 

    spl_autoload_register(function ($class) {


        $classess       = __DIR__ . "/class/";
        $classPath      = $classess . $class . ".class.php";
        $databasePath   = $classess . "database/" . $class . ".class.php";
        $loggerPath     = $classess . "logger/" . $class . ".class.php";
        $interfacePath  = $classess . "database/engine/" . $class . ".interface.php";


        if(file_exists($classPath)){
            include $classPath;
        }
        elseif(file_exists($databasePath)){
            include $databasePath;
        }
        elseif(file_exists($loggerPath)){
            include $loggerPath;
        }
        elseif(file_exists($interfacePath)){
            include $interfacePath;
        }
        
    });

