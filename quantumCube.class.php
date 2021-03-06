<?php

# N.B. This library is under development, not for production.

###########################################################################
##                                                                       ##
##  Quantum simulation of symbolic linguistics.           	         ##
##                                                                       ##
##  Copyright 2019 Alexandra van den Heetkamp.                           ##
##                                                                       ##
##  This class is free software: you can redistribute it and/or modify it##
##  under the terms of the GNU General Public License as published       ##
##  by the Free Software Foundation, either version 3 of the             ##
##  License, or any later version.                                       ##
##                                                                       ##
##  This class is distributed in the hope that it will be useful, but    ##
##  WITHOUT ANY WARRANTY; without even the implied warranty of           ##
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        ##
##  GNU General Public License for more details.                         ##
##  <http://www.gnu.org/licenses/>.                                      ##
##                                                                       ##
###########################################################################

class quantumCube {
	
	const MINHASHBYTES = 32; 	 // Min. of bytes for secure hash.
	const MAXHASHBYTES = 64; 	 // Max. of bytes for secure hash, more increases cost. Max. recommended: 256 bytes.
	const MINMERSENNE  = 0xff; 	 // Min. value of the Mersenne twister.
	const MAXMERSENNE  = 0xffffffff; // Max. value of the Mersenne twister.
	
	// matrice containers
	public $matrice_1 = [];
	public $matrice_2 = [];
	public $matrice_3 = [];
	public $matrice_4 = [];

	/* Model containers that seeds a matrice with a literal. */
	
	public $model_1   = [];
	public $model_2   = [];
	public $model_3   = [];
	
	public $model_count = 3;
	
	// variables
	public $input_var   = "";
	public $output_var  = "";
	public $literal_var = "";
	public $literalseed = "";

	/**
	* Models
	* Each model will have it's own matrice 
	* in single digit (literal) placeholders.
	*/	
	
	public $literals = [
	
		[
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1
		],
		
		[
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1
		],
		
		[
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1
		],
		
		[
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1,
		1,1,1,1,1,1,1,1
		]		
	];
	
	public $symbolics = [
		
		[
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0
		],
		
		[
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0
		],
		
		[
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0
		],
		
		[
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0,
		0,0,0,0,0,0,0,0
		]
	];	
	
		
	public $symbolic_test_matrice = [
	'female',
	'creative',
	'destructive',
	'passive',
	'chaos',
	'random',
	'dreams',
	'medium',
	'organic',
	'dark',
	'trust',
	'analogue',
	'polyphonic',
	'blur',
	'blurring',
	'open',
	'mother',
	'motherly',
	'shape',
	'form'
	];
	
	public $literal_test_matrice  = [
	'male',
	'seeding',
	'order',
	'active',
	'selective',
	'selecting',
	'select',
	'clock',
	'time',
	'solution',
	'machine',
	'light',
	'fear',
	'rational',
	'control',
	'serial',
	'clear',
	'closed',
	'father',
	'fatherly',
	'chain',
	'link'
	];
	
	public function __construct($params = array()) 
	{ 
		$this->init($params);
	}
	
	public function __destruct()
	{
		$this->matrice_1 = [];
		$this->matrice_2 = [];
		$this->matrice_3 = [];
		$this->matrice_4 = [];
		 
		$this->model_1   = [];
		$this->model_2 	 = [];
		$this->model_3   = [];
	}
	
	/**
	* Initializes object.
	* @param array $params
	* @throws Exception
	*/
	
	 public function init($params)
	 {
		try {
			isset($params['var'])  ? $this->var  = $params['var'] : false; 
			} catch(Exception $e) {
			$this->message('Problem initializing:'.$e->getMessage());
		}
	 }
	
	/**
	* shows a message to the user.
	* @param string
	* @return string
	*/
	
	public function message($string) 
	{
		return $string;
	}	

	
	/**
	* creates a random seed.
	* @param string
	* @return string
	*/
	
	public function random_seed(){
		
		$bytes = 0;
		
		if (function_exists('random_bytes')) {
			$len   = mt_rand(self::MINHASHBYTES,self::MAXHASHBYTES);
        		$bytes .= bin2hex(random_bytes($len));
    		}
		if (function_exists('openssl_random_pseudo_bytes')) {
			$len   = mt_rand(self::MINHASHBYTES,self::MAXHASHBYTES);
        		$bytes .= bin2hex(openssl_random_pseudo_bytes($len));
    		}
		
		if(strlen($bytes) < 128) {
			$bytes .= mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE)
				. mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) 
				. mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) 
				. mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE) . mt_rand(self::MINMERSENNE,self::MAXMERSENNE); 
		}	
	
		return $bytes;
	}
	
	public function simple_random_number() {
		return random_int(0,1);
	}
	
	/**
	* creates quantum cube with four faces, each containing a single matrice.
	* @param string
	* @return string
	*/
	
	public function quantum_cube($input_var){
		
		$needle = $this->input_var;
		$init 	= $this->cube_faces();
	}
	
	
	public function cube_faces(){
		
		$matrice_1 = $this->matrice_1;
		$matrice_2 = $this->matrice_2;
		$matrice_3 = $this->matrice_3;
		$matrice_4 = $this->matrice_4;
	}
	
	/**
	* creates a cuboid model with 3 models that will seed literals into two faces of each matrice.
	* @param string
	* @return string
	*/	
	
	public function  cuboid_model($literal_needle){	
	
		$matrice_1 = $this->matrice_1;
		$matrice_2 = $this->matrice_2;
		$matrice_3 = $this->matrice_3;
		$matrice_4 = $this->matrice_4;
		 
		// These 3 models also combine to create an octagon.
		$model_1 = $this->model_1;
		$model_2 = $this->model_2;
		$model_3 = $this->model_3;
		
		$rounds	 = $this->model_count;

		for($i = 0; $i <= $rounds; $i++) {
	
			foreach($model_points as $point) {	
			
				$cuboid_model[0] = [
					1 => array_search($matrice_1[$point],$this->literal_needle),
					2 => array_search($matrice_2[$point],$this->literal_needle),
					3 => array_search($matrice_3[$point],$this->literal_needle),
					4 => array_search($matrice_4[$point],$this->literal_needle)
				];
				
				/* TODO: Search process will be placed here. 
				*  after search, we should seed the models 
				*  with literals and shift symbolics through the two 
				*  empty faces of the cube.
				*/
				
				// M1
				$cuboid_model = [
					1 => $matrice_1[$this->literals[0]], // face 1
					2 => $matrice_1[$this->literals[1]], // face 2
					3 => $matrice_1[$this->literals[2]], // face 3
					4 => $matrice_1[$this->literals[3]], // face 4
					// Fill the other two faces with all the symbolics.
					5 => $matrice_1[$this->symbolics], // face 5
					6 => $matrice_1[$this->symbolics] // face 6
				];
				
				// M2
				$cuboid_model .= [
					1 => $matrice_2[$this->literals[0]],
					2 => $matrice_2[$this->literals[1]], 
					3 => $matrice_2[$this->literals[2]], 
					4 => $matrice_2[$this->literals[3]], 
					5 => $matrice_2[$this->symbolics], 
					6 => $matrice_2[$this->symbolics] 
				];
				
				// M3
				$cuboid_model .= [
					1 => $matrice_3[$this->literals[0]], 
					2 => $matrice_3[$this->literals[1]], 
					3 => $matrice_3[$this->literals[2]], 
					4 => $matrice_3[$this->literals[3]], 
					5 => $matrice_3[$this->symbolics], 
					6 => $matrice_3[$this->symbolics]
				];
				
				// M4
				$cuboid_model .= [
					1 => $matrice_4[$this->literals[0]], 
					2 => $matrice_4[$this->literals[1]], 
					3 => $matrice_4[$this->literals[2]], 
					4 => $matrice_4[$this->literals[3]], 
					5 => $matrice_4[$this->symbolics], 
					6 => $matrice_4[$this->symbolics]
				];				
			}
		}
	}
	
}

?>
