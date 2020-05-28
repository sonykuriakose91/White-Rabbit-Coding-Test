<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Listing extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        $this->load->model('Listing_model');
    }

    public function index($status = "", $rowno = 0) {
        if ($status == "") {
            $status = "Active";
        }
        else {
            $status = "Deleted";
        }
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        }
        else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }
        $this->session->unset_userdata('search', '');
        $rowperpage = 10;
        if ($rowno != 0) {
            $rowno = ($rowno - 1) * $rowperpage;
        }

        $allcount = $this->Listing_model->getfilesCount($status, $search_text);

        $data['uploaded_files']     = $this->Listing_model->get_all_listings($status, $rowno, $rowperpage, $search_text);
        $config['base_url']         = base_url() . 'listing/index/' . $status;
        $config['use_page_numbers'] = TRUE;
        $config['total_rows']       = $allcount;
        $config['per_page']         = $rowperpage;
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result']     = $data['uploaded_files'];
        $data['row']        = $rowno;
        $data['search']     = $search_text;
        $data['_view']      = 'listings/index';
        $this->load->view('layouts/main', $data);
    }

    public function add() {
        $data['_view'] = 'listings/add-listing';
        $this->load->view('layouts/main', $data);
    }

    public function add_listing() {
        $config['upload_path']   = 'uploads';
        $config['allowed_types'] = 'txt|doc|docx|pdf|png|jpeg|jpg|gif';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('upload_files')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_image_data' => $this->upload->data());
        }
        $params  = array(
            'file_type'   => $data["upload_image_data"]["file_ext"],
            'file_name'   => $data["upload_image_data"]["file_name"],
            'status'      => "Active",
            'uploaded_at' => date('Y-m-d H:i:s'),
        );
        $file_id = $this->Listing_model->add_file($params);
        redirect('listing/index');
    }

    function remove($id) {
        $file = $this->Listing_model->get_file($id);

        if (isset($file['id'])) {
            unlink("uploads/" . $file['file_name']);
            $params = array(
                'status'     => "Deleted",
                'deleted_at' => date('Y-m-d H:i:s'),
            );
            $this->Listing_model->update_file($id, $params);
            redirect('listing/index');
        }
        else
            show_error('The file you are trying to delete does not exist.');
    }

}
