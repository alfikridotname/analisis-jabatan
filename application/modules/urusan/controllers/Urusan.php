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

    public function save()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        endif;

        if ($this->form_validation->run($this) == FALSE) :
            foreach ($_POST as $key => $value) {
                $this->results['validation'][$key] = form_error($key);
            }
            $this->results['status']    = false;
            $this->results['message']   = 'Simpan gagal !';
        else :
            $save = $this->UrusanModel->save();
            if ($save) :
                $this->results['status']    = true;
                $this->results['message']   = 'Simpan Sukses !';
            else :
                $this->results['status'] = false;
            endif;
        endif;

        echo json_encode($this->results);
    }
}
