<?php
defined('BASEPATH') OR exit('No direct script name allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model');
        $this->load->library('session');
    }

    public function gerar_senha($senha) {
        // Substitua '123456' pela senha que você quer usar
        echo password_hash($senha, PASSWORD_BCRYPT);
    }

    public function index() {
        $this->load->view('auth/login');
    }

    public function login_process() {
        $email = $this->input->post('email');
        $senha = $this->input->post('password');

        $user = $this->auth_model->login($email, $senha);

        if ($user) {
            // Criar a sessão
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('nome', $user->nome);

            echo "<h1>Sucesso! Bem-vindo, " . $user->nome . "</h1>";
            // No futuro: redirect('dashboard');
        } else {
            echo "<h1>Erro: Usuário ou senha inválidos!</h1>";
            // No futuro: redirect('auth?erro=1');
        }
    }
}