<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends AL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'auth/DashboardModel' => 'DashboardModel'
        ]);
    }

    public function index()
    {
        $data['title']  = 'Dashboard';
        $data['page']   = 'dashboard/index';
        $data['css']    = $this->load->view('dashboard/css', $data, true);
        $data['js']     = $this->load->view('dashboard/js', $data, true);

        $this->template->load('backend', $data['page'], $data);
    }
}
