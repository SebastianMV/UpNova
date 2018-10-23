<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model("modelo");
        $this->load->library('form_validation');
    }

    private function dv($T) {
        $M = 0;
        $S = 1;
        for (; $T; $T = floor($T / 10))
            $S = ($S + $T % 10 * (9 - $M++ % 6)) % 11;
        return $S ? $S - 1 : 'k';
    }

    private function validarForm() {
        $config = [
                ['field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required|min_length[3]|max_length[30]'
            ],
                ['field' => 'rut',
                'label' => 'RUT',
                'rules' => 'callback_verifica_rut|required|min_length[9]|max_length[10]'
            ],
                ['field' => 'nacimiento',
                'label' => 'Fecha de Nacimiento',
                'rules' => 'callback_verifica_fecha|required'
            ],
                ['field' => 'calculo',
                'label' => 'Cálculo',
                'rules' => 'required'
            ],
        ];
        return $config;
    }

    private function valida_fecha($fecha) {
        list($Y, $m, $d) = explode("-", $fecha);
        return ( date("md") < $m . $d ? date("Y") - $Y - 1 : date("Y") - $Y );
    }

    private function valida_rut($rutCompleto) {
        if (!preg_match("/^[0-9]+-[0-9kK]{1}/", $rutCompleto))
            return FALSE;

        $rut = explode('-', $rutCompleto);
        return strtolower($rut[1]) == $this->dv($rut[0]);
    }

    function verifica_rut($rut) {
        $valido = $this->valida_rut($rut);

        if (!$valido) {
            $this->form_validation->set_message('verifica_rut', 'El {field} no es válido');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function verifica_fecha($nacimiento) {

        if ($nacimiento != null || $nacimiento != '') {
            $anios = $this->valida_fecha($nacimiento);

            if ($anios === -1) {
                $this->form_validation->set_message('verifica_fecha', '{field} superior a Hoy');
                return FALSE;
            } else if ($anios < 3) {
                $this->form_validation->set_message('verifica_fecha', '{field} es menor a 3 años');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            $this->form_validation->set_message('verifica_fecha', '{field} es requerida');
            return FALSE;
        }
    }

    function verifica_dia($nacimiento) {

        if ($nacimiento != null || $nacimiento != '') {
            $fechats = strtotime($nacimiento); //a timestamp 
            //el parametro w en la funcion date indica que queremos el dia de la semana 
            switch (date('w', $fechats)) {
                case 0: return "Domingo";
                    break;
                case 1: return "Lunes";
                    break;
                case 2: return "Martes";
                    break;
                case 3: return "Miercoles";
                    break;
                case 4: return "Jueves";
                    break;
                case 5: return "Viernes";
                    break;
                case 6: return "Sabado";
                    break;
            }
        }
    }

    function index() {

        $this->load->view('Plantilla/head');
        $this->load->view('Plantilla/body');
        $this->load->view('Plantilla/footer');
    }

    function validar() {

        $config = $this->validarForm();
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Plantilla/head');
            $this->load->view('Plantilla/body');
            $this->load->view('Plantilla/footer');
        } else {
            $nacimiento = $this->input->post('nacimiento');

            $calculo['valor'] = $this->input->post('calculo');
            $calculo['nombre'] = $this->input->post('nombre');

            if ($this->input->post('calculo') === '1'):
                $calculo['anios'] = $this->valida_fecha($nacimiento);
            else:
                $calculo['dia'] = $this->verifica_dia($nacimiento);
            endif;

            $this->load->view('Plantilla/head');
            $this->load->view('formValido', $calculo);
            $this->load->view('Plantilla/footer');
        }
    }

}
