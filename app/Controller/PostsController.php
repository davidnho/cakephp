<?php

class PostsController extends AppController {

    public $components = array('Session');

    public function index() {

        if (AuthComponent::user('role') == 1) {
            $this->redirect(array('controller' => 'topics', 'action' => 'index'));
        }

        $data = $this->Post->find('all');

        $this->set('posts', $data);
    }

    public function add($id) {
        if ($this->request->is('post')) {

            $this->Post->create();

            $this->request->data['Post']['topic_id'] = $id;
            $this->request->data['Post']['user_id'] = AuthComponent::user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('The post has been created');
                $this->redirect('/topics/view/' . $id);
            }
        }
        $this->set('topics', $this->Post->Topic->find('list'));
    }

    public function view($id) {
        $data = $this->Post->findById($id);
        $this->set('post', $data);
    }

    //noel review
    public function addpost($id) {
        if ($this->request->is('post')) {
            $this->Post->create();
            $this->request->data['Post']['topic_id'] = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('The post have been created');
                $this->redirect('listposts');
            }
        }

        $this->set('topics', $this->Post->Topic->find('list'));
    }

    public function viewdata($id) {
        //get data based from the id
        $data = $this->Post->findById($id);

        //create a variable that will hold the data
        $this->set('post', $data);
    }
    
    public function listposts() { //
        $data = $this->Post->find('all');
        $this->set('posts', $data);
    }

}
