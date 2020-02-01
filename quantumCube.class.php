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
	
	
	// matrice containers
	public $matrice_1 = [];
	public $matrice_2 = [];
	public $matrice_3 = [];
	public $matrice_4 = [];

	// model containers that seeds a matrice with a literal.
	public $model_1   = [];
	public $model_2   = [];
	public $model_3   = [];
	
	// variables
	public $input_var 	= "";
	public $output_var 	= "";
	public $literal_var = "";
	public $literalseed = "";
	
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
	* creates quantum cube with four faces, each containing a single matrice.
	* @param string
	* @return string
	*/
	
	public function quantum_cube($input_var){
		
		$needle = $this->$input_var;
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
		 
		$model_1 = $this->model_1;
		$model_2 = $this->model_2;
		$model_3 = $this->model_3;

	
		foreach($model_points as $point) {	
			$cuboid_model = [
				1 => array_search($matrice_1[$point],$this->$literal_needle),
				2 => array_search($matrice_2[$point],$this->$literal_needle),
				3 => array_search($matrice_3[$point],$this->$literal_needle),
				4 => array_search($matrice_4[$point],$this->$literal_needle)
			];
		}
	}
	
}

?>
