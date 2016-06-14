<?php

class TopicsController extends AppController {

    public $components = array('Session');

    public function beforeFilter() {
        $this->Auth->allow('index');
    }

    public function index() {
        $data = $this->Topic->find('all');
        $this->set('topics', $data);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Topic->create();
            if (AuthComponent::user('role') == 1) {
                $this->request->data['Topic']['visible'] = 2;
            }

            $this->request->data['Topic']['user_id'] = AuthComponent::user('id');

            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash('The topic has been created');
                $this->redirect('index');
            }
        }
    }

    public function view($id) {
        $data = $this->Topic->findById($id);
        $this->set('topic', $data);
    }

    public function edit($id) {
        if (AuthComponent::user('role' == 1)) {
            $this->redirect('index');
        }
        $data = $this->Topic->findById($id);
        if ($this->request->is(array('post', 'put'))) {
            $this->Topic->id = $id;
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash('Topic has been edited');
                $this->redirect('index');
            }
        }
        $this->request->data = $data;
    }

    public function delete($id) {
        if (AuthComponent::user('role' == 1)) {
            $this->redirect('index');
        }
        $this->Topic->id = $id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Topic->delete()) {
                $this->Session->setFlash('Topic has been deleted');
                $this->redirect('index');
            }
        }
    }

    //noel review
    public function create() {

        if ($this->request->is('post')) {

            $this->Topic->create(); //create the model
            if (AuthComponent::user('role') == 1) {
                $this->request->data['Topic']['visible'] = 2;
            }
            $this->request->data['Topic']['user_id'] = AuthComponent::user('id');

            //save the data coming from the form. if the data saved, redirect
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash('The topic has been created');
                $this->redirect('listdata');
            }
        }
    }

    public function redirectpage() {
        $this->set('name', 'Noel');
    }

    public function listdata() {
        //get all data from topic table
        $data = $this->Topic->find('all');

        //create a variable that will hold the data
        $this->set('topics', $data);
    }

    public function viewdata($id) {
        //get data based from the id
        $data = $this->Topic->findById($id);

        //create a variable that will hold the data
        $this->set('topic', $data);
    }

    public function editdata($id) {
        //get data based from the id
        $data = $this->Topic->findById($id);

        if ($this->request->is(array('post', 'put'))) {
            $this->Topic->id = $id;
            if ($this->Topic->save($this->request->data)) {
                $this->Session->setFlash('The topic has been edited');
                $this->redirect('listdata');
            }
        }
        //create a variable that will hold the data
        $this->request->data = $data;
    }

    public function deletedata($id) {
        $this->Topic->id = $id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Topic->delete()) {
                $this->Session->setFlash('The topic has been deleted');
                $this->redirect('listdata');
            }
        }
    }

}
