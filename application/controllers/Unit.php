<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . 'controllers/Fechas.php';

class unit extends Fechas {
    public function __construct() { 
        parent::__construct();
        $this->load->library('unit_test');
    }

    public function test()
    {
        $test_name = 'Prueba cálculo';
        $dates = ["2018-02-01","2018-02-02","2018-02-03","2018-02-04"];
        $numbers = ['1','2','3','4'];
        $dates2= array('02/02/2018','02/05/2018','02/06/2018','02/08/2018');
        $esperado = array('dates' => $dates2);
        $result = $this->calculate($dates,$numbers);
        echo 'variables:';
        echo json_encode($dates);
        echo json_encode($numbers);
        echo $this->unit->run($result, $esperado, $test_name);

        $test_name = 'Prueba Validación';
        $dates = ["2018-02-01","2018-02-02","2018-02-03","2018-02-04"];
        $esperado = true;
        $result = $this->validate($dates);
        echo 'variables:';
        echo json_encode($dates);
        echo $this->unit->run($result, $esperado, $test_name);

        $test_name = 'Prueba Validación';
        $dates = ["2018-02-05","2018-02-02","2018-02-03","2018-02-04"];
        $esperado = false;
        $result = $this->validate($dates);
        echo 'variables:';
        echo json_encode($dates);
        echo $this->unit->run($result, $esperado, $test_name);
    }
}