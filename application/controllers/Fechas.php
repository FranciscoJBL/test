<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fechas extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
        $this->load->library('twig');
    }
	public function index()
	{
		$this->twig->display('Fechas');
	}
	//esta funcion recibe dos array, uno con las fechas y otro con los numeros
	public function form_process(){
		$dates = $this->input->post('dates');
		$numbers = $this->input->post('numbers');
		
		$dates2= $dates;
		array_multisort($dates);
		if($dates != $dates2) return 'Error: Cada fecha debe ser mayor a la anterior';

		$x= 0;
		foreach ($dates as $date){
			$date = strtotime ( '+'.$numbers['number-'.$x]. 'day', strtotime ( $date ) ) ;
			if (date('D', date_timestamp_get($date)) == 'Sat'){
				$date = strtotime ( '+2 day', strtotime ( $date ) ) ;
			}else if (date('D',date_timestamp_get($date)) == 'Sun'){
				$date = strtotime ( '+1 day', strtotime ( $date ) ) ;
			}
			$x++;
		}
		return $dates;
	}
}
