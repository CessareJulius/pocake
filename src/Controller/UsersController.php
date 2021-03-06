<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'login']);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'user')
        {
            if (in_array($this->request->action, ['home', 'view', 'edit' ,'logout']))
            {
                return true;
            }
        }
        return parent::isAuthorized($user);

    }

    public function login()
    {
        //verificamos la peticion del usuario
        if ($this->request->is('post'))
        {
            // verifica todos los datos que ingresa el usuario para autenticarse
            $user = $this->Auth->identify();
            // preguntamos si existen los datos del usuario y a la vez verifica si son correctos
            if ($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl()); // retornamos la url donde se hizo la peticion
                
            }
            else
            {
                $this->Flash->error('Datos Invalidos, Por favor intente nuevamente', ['key' => 'auth']);
            }
        }
        //$this->Flash->error('se ve o no se ve?');

        if ($this->Auth->user()) {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }

    public function home()
    {
        if($this->Auth->user("role") == 'admin'){
            $mensaje = 'Bienvenido Administrador';
        }else{
            $mensaje = 'Bienvenido Usuario';
        }
        $this->Flash->info($mensaje);
        
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
//        $users = $this->Users->find("all");
        $this->paginate = [
            'limit' => 10,
        ];
        $users = $this->paginate($this->Users);
        $this->set('users', $users);
    }

    public function add()
    {
        $user = $this->Users->newEntity();

        if ($this->request->is("post"))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->role = 'user';
            $user->active = 1;
            
            if ($this->Users->save($user))
            {
                $this->Flash->success("El usuario se creo correctamente");
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
            else
            {
                $this->Flash->error("no se pudo crear el usuario, Intente nuevamente.");
            }
        }
        $this->set(compact("user"));
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set('user', $user);
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['Patch', 'post', 'put'])) 
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) 
            {
                $this->Flash->success("El usuario a sido modificado Exitosamente");
                $this->redirect(['action' => 'index']);
            }
            else 
            {
                $this->Flash->error("El usuario no pudo ser modificado. Por favor, Intente nuevamente"); 
            }
        }

        $this->set(compact("user"));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if($this->Users->delete($user))
        {
            $this->Flash->success('El usuario ha sido eliminado correctamente');
        }
        else
        {
            $this->Flash->error('El usuario no pudo ser eliminado. Por Favor intente nuevamente.');
        }

        return $this->redirect(['action' => 'home']);
    }

}
