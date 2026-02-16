<?php
class Auth_model extends CI_Model {

    public function login($email, $senha) {
        $this->db->where('email', $email);
        $this->db->where('status', 1);
        $usuario = $this->db->get('usuarios')->row();

        if ($usuario) {
            // Verifica se a senha bate com o hash (BCRYPT)
            // Se você inseriu a senha como texto puro para testar, use: if($senha == $usuario->senha)
            if (password_verify($senha, $usuario->senha)) {
                return $usuario;
            }
        }
        return FALSE;
    }
}