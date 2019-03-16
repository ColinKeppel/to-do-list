<?php

class Items extends CI_Controller {

    public function index()
    {
        $this->load->model('Item');
        $data['ItemData'] = $this->Item->getItems();
        $this->load->model('Lists');
        $data['ListData'] = $this->Lists->GetLists();
        $this->load->view('index' , $data);
    }

    public function createItem()
    {
        $this->load->model('Item');
        $this->load->model('Lists');
        if (!empty($_POST)) {
            $list_id = $this->input->post('NewListId');
            $item_name = $this->input->post('NewItemName');
            $item_details = $this->input->post('NewItemDetails');
            $item_time = $this->input->post('NewItemTime');
            if ($item_name && $item_details && $item_time && $list_id) {
                $data = array(
                    'item_name' => $item_name,
                    'item_details' => $item_details,
                    'item_time' => $item_time,
                    'list_id' => $list_id
                );
            }
            $this->load->model('Item');
            $this->Item->insert($data);
            redirect('Items/index');
        }
    }
}
