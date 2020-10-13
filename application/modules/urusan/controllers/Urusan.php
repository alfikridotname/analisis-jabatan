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

    public function dtUrusan()
    {
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

    public function edit()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        endif;

        $urusan = $this->UrusanModel->getUrusanDetail();
        if ($urusan) :
            foreach ($urusan->result() as $key => $value) :
                $this->results['data'][$key]['urusan']      = $value->urusan;
                $this->results['data'][$key]['sub_urusan']  = $value->sub_urusan;
            endforeach;

            $this->results['status']    = true;
            $this->results['message']   = 'Data ditemukan !';
        else :
            $this->results['status']    = false;
            $this->results['message']   = 'Data tidak ditemukan !';
        endif;

        echo json_encode($this->results);
    }

    public function update()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        endif;

        if ($this->form_validation->run($this) == FALSE) :
            foreach ($_POST as $key => $value) {
                $this->results['validation'][$key] = form_error($key);
            }
            $this->results['status']    = false;
            $this->results['message']   = 'Update gagal !';
        else :
            $update = $this->UrusanModel->update();
            if ($update) :
                $this->results['status']    = true;
                $this->results['message']   = 'Update Sukses !';
            else :
                $this->results['status'] = false;
            endif;
        endif;

        echo json_encode($this->results);
    }

    public function delete()
    {
        if (!$this->input->is_ajax_request()) :
            show_404();
        endif;

        $delete = $this->UrusanModel->delete();

        if ($delete) :
            $this->results['status']    = true;
            $this->results['message']   = 'Delete Sukses !';
        else :
            $this->results['status'] = false;
        endif;

        echo json_encode($this->results);
    }
}
