<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    private $tableUsers = 'master_users';

    public function getLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where($this->tableUsers, [
            'username' => $username
        ]);
        $userData = $user->row_array();
        if ($user->num_rows()) :
            if ($userData['is_active'] == 1) :
                if (password_verify($password, $userData['password'])) :
                    $data = [
                        'id_user'       => $userData['id_user'],
                        'full_name'     => $userData['full_name'],
                        'app_login'     => true
                    ];
                    $this->session->set_userdata($data);
                    return true;
                else :
                    return false;
                endif;
            else :
                return false;
            endif;
        else :
            return false;
        endif;
    }
}
