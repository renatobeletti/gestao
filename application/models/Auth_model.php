<?php
class Auth_model extends CI_Model {

    public function login($email, $senha) {
    $this->db->where('email', $email);
    $usuario = $this->db->get('usuarios')->row();

    if ($usuario) {
        // TESTE TEMPORÁRIO: Comparação direta (Texto Puro)
        if ($senha == $usuario->senha) {
            return $usuario;
        }
    }
    return FALSE;
}
}