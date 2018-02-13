<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fechas extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('twig');
        $this->load->helper('form');
    }
	public function index()
	{
		$this->twig->display('Fechas');
	}

	public function form_process(){
		header('application/x-www-form-urlencoded');
		$dates = $this->input->post('dates');
		$numbers = $this->input->post('numbers');
		$dates2= $dates;
		if(!is_array($dates)){
			die (json_encode('Error: Datos incorrectos'));
		}else{
		array_multisort($dates);
		}
		if($dates != $dates2) die (json_encode('Error: Cada fecha debe ser mayor a la anterior'));

		$x= 0;
		foreach ($dates as $date){
			$date = strtotime ( '+'.$numbers[$x].' day', strtotime ( $date ) );
			if (date('D', $date) == 'Sat'){
				$date = strtotime ( '+2 day', $date) ;
			}else if (date('D',$date) == 'Sun'){
				$date = strtotime ( '+1 day', $date) ;
			}
			$dates2[$x] = date('m/d/Y', $date);
			$x++;
		}
		die (json_encode($dates2));
	}
}
