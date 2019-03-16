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

    public function update() {
        $this->load->model('Item');
        $id= $this->input->post('itemId');
        $data = array(
            'item_id' => $this->input->post('itemId'),
            'list_id' => $this->input->post('listId'),
            'item_name' => $this->input->post('editItemName'),
            'item_details' => $this->input->post('editItemDetails'),
            'item_time' => $this->input->post('editItemTime')
        );
        $this->Item->updateItem($id,$data);
        redirect('Items/index');
    }

    public function delete($id)
    {
        $this->load->model('Item');
        $this->Item->delete($id);
        redirect('Items/index');
    }
}
