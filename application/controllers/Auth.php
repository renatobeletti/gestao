<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Auth extends CI_Controller {

    public function index() {
        // Por enquanto, apenas carrega a view de login
        $this->load->view('auth/login');
    }

    public function login_process() {
        // Futura lógica de validação do MySQL
    }
}