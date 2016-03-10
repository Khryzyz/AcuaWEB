<?php

class TestBl{
	

	public function TestBl(){}

	public function getDatosGrid(){
		$prueba = \DB::select('CALL getDatosPrueba');
		return $prueba;
	}
}

?>