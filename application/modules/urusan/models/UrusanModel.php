<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UrusanModel extends CI_Model
{
    private $tableUrusan = 'master_urusan';

    public function getUrusan()
    {
        return $this->db->get($this->tableUrusan);
    }

    public function save()
    {
        $data = [
            'urusan'        => $this->input->post('urusan'),
            'sub_urusan'    => $this->input->post('sub_urusan'),
        ];

        $this->db->insert($this->tableUrusan, $data);
        return $this->db->affected_rows();
    }
}
