<?php
    /**
     * Autoload composer PSR-4
     */
    require_once "../vendor/autoload.php";
    
    require_once "../app/functions/function.php";
    require_once "../app/config/config.php";    

    /*
        use App\Controller\Main;
        $controller = new Main();
        dd($controller->teste());
    */

    use App\Core\RouteCore;
    new RouteCore();

    