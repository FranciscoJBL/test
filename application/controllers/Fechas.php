<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fechas extends CI_Controller {

	public function index()
	{
		echo 'hola';
	}

	public function validate_form(){
		$dates = $this->input->post('dates');
		$numbers = $this->input->post('numbers');
		
		$dates2= $dates;
		array_multisort($dates);
		if($dates != $dates2) return 'Error: Cada fecha debe ser distinta a la anterior';

		$x= 0;
		foreach ($dates as $date){
			$date = strtotime ( '+'.$numbers['number-'.$x]. 'day', strtotime ( $date ) ) ;
			$x++;
		}
	}
}
