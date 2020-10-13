<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AL extends MX_Controller
{
    public $results;
    public function __construct()
    {
        parent::__construct();
        // if (!$this->session->userdata('app_login') && $this->router->fetch_class() != 'auth') :
        //     redirect('auth');
        // endif;

        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->form_validation->config($this->router->fetch_class() . '/' . $this->router->fetch_method()));
        $this->form_validation->set_error_delimiters('<div class="invalid-feedback">', '</div>');

        $this->results = [
            'status'        => false,
            'message'       => '',
        ];
    }

    function getSerialNumberDrive($drive)
    {
        if (preg_match(
            '#Volume Serial Number is (.*)\n#i',
            shell_exec('dir ' . $drive . ':'),
            $m
        )) {
            $volname = ' (' . $m[1] . ')';
        } else {
            $volname = '';
        }

        return str_replace("(", "", str_replace(")", "", $volname));
    }
}
