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

    public function getUrusanDetail()
    {
        $urusanId   = $this->input->get('urusan_id');
        return $this->db->get_where($this->tableUrusan, [
            'urusan_id' => $urusanId
        ]);
    }

    public function update()
    {
        $data = [
            'urusan'        => $this->input->post('urusan'),
            'sub_urusan'    => $this->input->post('sub_urusan'),
        ];

        $update = $this->db->update($this->tableUrusan, $data, [
            'urusan_id' => $this->input->post('urusan_id')
        ]);

        return $this->db->affected_rows();
    }

    public function delete()
    {
        $this->db->delete($this->tableUrusan, [
            'urusan_id' => $this->input->post('urusan_id')
        ]);

        return $this->db->affected_rows();
    }
}
