<?php

class Listing_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_all_listings($status, $rowno, $rowperpage, $search = "") {

        $this->db->where('status', $status);
        $this->db->order_by('id', 'desc');

        if ($search != '') {
            $this->db->like('file_type', $search);
            $this->db->or_like('file_name', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        return $this->db->get('files')->result_array();
    }

    public function getfilesCount($status, $search = '') {

        $this->db->select('count(*) as allcount');
        $this->db->from('files');

        if ($search != '') {
            $this->db->like('file_type', $search);
            $this->db->or_like('file_name', $search);
        }
        $this->db->where('status', $status);
        $query  = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    function add_file($params) {
        $this->db->insert('files', $params);
        return $this->db->insert_id();
    }

    function get_file($id) {
        return $this->db->get_where('files', array('id' => $id))->row_array();
    }

    function update_file($id, $params) {
        $this->db->where('id', $id);
        return $this->db->update('files', $params);
    }

}
