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
        $itemId = $this->input->post('itemId');
        $listId = $this->input->post('listId');
        $data = array(
            'item_name' => $this->input->post('editItemName'),
            'item_details' => $this->input->post('editItemDetails'),
            'item_time' => $this->input->post('editItemTime'),
            'item_status' => $this->input->post('editStatus')
        );
        $this->Item->updateItem($itemId, $listId, $data);
        redirect('Items/index');
    }

    public function delete($id)
    {
        $this->load->model('Item');
        $this->Item->delete($id);
        redirect('Items/index');
    }
}
