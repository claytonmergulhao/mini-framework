<?php

    namespace App\Core;

    class RouteCore
    {
        private $uri;
        private $method;

        private $getArr = [];

        public function __construct()
        {
            //echo "aqui é core das rotas";
            $this->initialize();
            require_once('../app/config/router.php');
            $this->execute();
        }

        private function initialize()
        {            
            $this->method = $_SERVER['REQUEST_METHOD'];
            //dd($this->method);

            $uri = $_SERVER['REQUEST_URI'];
            
            $ex = explode('/', $uri);   
            $uri = $this->normalizeUri($ex);

            for ($i = 0; $i < UNSET_URI_COUNT; $i++){
                unset($uri[$i]);
            }            

            $this->uri = implode('/', $this->normalizeUri($uri));

            if(DEBUG_URI)
                dd($uri);
        }

        private function get($router, $callback)
        {            
            $this->getArr[] = [
                'router' => $router,
                'callback' => $callback
            ]; 
            
            //dd($this->gerArr);
        }

        private function execute()
        {            
            
            switch($this->method){
                case 'GET':                                        
                    $this->getExecute();
                break;

                case 'POST':
                    $this->postExecute();
                break;
            }
        }

        private function getExecute()
        {                                 
            foreach ($this->getArr as $get) {               
                $r = substr($get['router'], 1);                                                  

                if(substr($r, -1) == '/'){
                    $r = substr($r, 0, -1);
                    dd($r);
                }

                if($r == $this->uri){
                    /*
                     * verificamos se é uma função se com is_callable 
                     * se for executamos ele com ()
                     */
                    if(is_callable($get['callback'])) {
                        $get['callback']();
                        break; // saiu porque não precisa ficar no laço se já foi encontrado a rota
                    }

                }
            }
        }

        private function postExecute()
        {
            
        }

        private function normalizeUri($uri)
        {
            return array_values(array_filter($uri));
        }

    }