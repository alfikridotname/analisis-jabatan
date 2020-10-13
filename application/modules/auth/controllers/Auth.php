<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends AL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'auth/AuthModel' => 'AuthModel'
        ]);
    }

    public function index()
    {
        if (!isLogin()) :
            $data['title']  = 'Login';
            $data['page']   = 'auth/index';
            $data['css']    = $this->load->view('auth/css', $data, true);
            $data['js']     = $this->load->view('auth/js', $data, true);

            $this->template->load('template', $data['page'], $data);
        else :
            redirect('dashboard');
        endif;
    }

    public function login()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        endif;

        if ($this->form_validation->run($this) == FALSE) :
            foreach ($_POST as $key => $value) {
                $this->results['validation'][$key] = form_error($key);
            }
            $this->results['status']    = false;
            $this->results['message']   = 'Login gagal !';
        else :
            $login = $this->AuthModel->getLogin();
            if ($login) :
                $this->results['status']    = true;
                $this->results['message']   = 'Login Sukses !';
            else :
                $this->results['status'] = false;
            endif;
        endif;

        echo json_encode($this->results);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
