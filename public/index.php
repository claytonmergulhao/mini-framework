<?php
    /**
     * Autoload composer PSR-4
     */
    require_once "../vendor/autoload.php";
    require_once "../app/functions/function.php";

    use App\Controller\Main;
    use App\Core\RouteCore;

    new RouteCore();

    /*
        $controller = new Main();
        dd($controller->teste());
    */