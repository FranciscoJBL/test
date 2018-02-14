<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fechas extends CI_Controller {
	public $error;
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
		if(!$this->validate($dates)){
			die (json_encode($this->error));
		}

		$result = $this->calculate($dates, $numbers);
		die (json_encode($result));
	}

	public function calculate($dates, $numbers){
		$x=0;
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
		return array('dates' => $dates2);
	}

	public function validate($dates){
		$dates2= $dates;
		if(!is_array($dates)){
			$this->set_error ('Error: Datos incorrectos');
			return false;
		}else{
		array_multisort($dates);
		}
		if($dates != $dates2) {
			$this->set_error ('Error: Cada fecha debe ser mayor a la anterior');
			return false;
		}
		return true;
	}

	private function set_error($e){
		$this->error = $e;
		return;
	}
}
