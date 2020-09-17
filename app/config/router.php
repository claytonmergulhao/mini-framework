<?php

    $this->get('/', function(){
        echo 'raiz';
    });

    $this->get('/home/', function(){
        echo 'agora home';
    });

    $this->get('/teste/10', function(){
        echo 'agora página teste';
    });

    //dd('teste');