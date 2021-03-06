<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 *
 * @method \App\Model\Entity\Bookmark[] paginate($object = null, array $settings = [])
 */
class BookmarksController extends AppController {

    public function isAuthorized($user) {

        if (isset($user['role']) and $user['role'] === 'user') {
            if (in_array($this->request->action, ['add', 'index'])) {
                return true;
            }
        }
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $id = $this->request->params['pass'][0];
            $bookmark = $this->Bookmarks->get($id);
            if ($bookmark->user_id == $user['id']) {
                return true;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {

        //Asi estaba por default
        //$bookmarks = $this->paginate($this->Bookmarks);

        $this->paginate = [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'order' => ['created' => 'desc']
        ];

        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set('bookmarks', $bookmarks);

        //$this->set(compact('bookmarks'));
        //$this->set('_serialize', ['bookmarks']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => []
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    public function viewall() {
        
        $this->paginate = [
            'order' => ['created' => 'desc']
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        //$usersdata = $this->Users->get($this->bookmarks->user_id);

        //$this->set('bookmarks', $bookmarks);
        $this->set(compact('bookmarks'));
    }

    public function add() {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            $bookmark->user_id = $this->Auth->user('id');

            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success('El enlace se creo correctamente.');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('El Enlace no se pudo crear. POr favor intente nuevamente');
        }
        $this->set(compact('bookmark'));
        //$this->set('_serialize', ['bookmark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $bookmark = $this->Bookmarks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->getData());
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('El Bookmark ha sido editado con exito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El Bookmark no pudo ser editado. Por favor intente nuevamente.'));
        }
        $this->set(compact('bookmark'));
        //$this->set('_serialize', ['bookmark']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bookmark = $this->Bookmarks->get($id);
        if ($this->Bookmarks->delete($bookmark)) {
            $this->Flash->success(__('El Bookmark ha sido eliminado Exitosamente.'));
        } else {
            $this->Flash->error(__('El Bookmark no pudo ser eliminado. Por favor intente nuevamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
