<?php

class Main extends CI_Controller {
    
	public function index()
	{
        $this->load->model('Item');
        $data['ItemData'] = $this->Item->getItems();
        $this->load->model('Lists');
        $data['ListData'] = $this->Lists->GetLists();
        $this->load->view('index' , $data);
	}

    public function createList()
    {
        $this->load->model('Lists');
        if (!empty($_POST)) {
            $list_name = $this->input->post('listName');
            if ($list_name) {
                $data = array(
                    'list_name' => $list_name
                );
            }
            $this->load->model('Lists');
            $this->Lists->insert($data);
            redirect('Items/index');
        }
    }

}
