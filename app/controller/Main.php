<?php

namespace App\Controller;

class Main {

	
	public function __construct()
	{
		//echo 'estamos aqui';
	}


	public function teste()
	{
		return [
			'nome' => 'Clayton Mergulhão',
			'site' => 'www.claytonmergulhao.com.br'
		];
	}

}