<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Urusan extends AL
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'auth/UrusanModel' => 'UrusanModel'
        ]);
    }

    public function index()
    {
        $data['title']  = 'Urusan Pemerintahan';
        $data['page']   = 'urusan/index';
        $data['urusan'] = $this->UrusanModel->getUrusan();
        $data['css']    = $this->load->view('urusan/css', $data, true);
        $data['js']     = $this->load->view('urusan/js', $data, true);

        $this->template->load('backend', $data['page'], $data);
    }
}
