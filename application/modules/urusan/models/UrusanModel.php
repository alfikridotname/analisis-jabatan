<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UrusanModel extends CI_Model
{
    private $tableUrusan = 'master_urusan';

    public function getUrusan()
    {
        return $this->db->get($this->tableUrusan);
    }
}
