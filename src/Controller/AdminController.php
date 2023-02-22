<?php
declare(strict_types=1);

namespace App\Controller;

class AdminController extends AppController
{
    // function for load model and give access to the page befor login
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Model = $this->loadModel('Posts');
        $this->Model = $this->loadModel('Comments');
        $this->Authentication->addUnauthenticatedActions(['login']);
    }
    
    // function to show all users
    public function userIndex()
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $users = $this->paginate($this->Users);
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user','users'));
    }
    
    // function to show the main website home page
    public function index()
    {
        $this->viewBuilder()->setLayout('website_layout');
    }

    // function to show the user dashboard after login
    public function dashboard($id=null)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }

    // function to show all existing posts
    public function allPost()
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $posts = $this->paginate($this->Posts);
        $this->set(compact('user','posts'));
       
    }

    // function to view your profile
    public function profile($id=null)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();
        $this->set(compact('user'));
    }

   // function to show users view
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('user'));
    }


    public function addPost($id)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $this->request->allowMethod(['get', 'post']);
        $user = $this->Authentication->getIdentity();

        $post = $this->Posts->newEmptyEntity();
        $post['users_id'] = $id;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['users_id'] = $id;
            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['controller'=>'Users','action' => 'allPost', $id]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('user','post', 'users'));
    }

    public function viewPost($id = null)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $user = $this->Authentication->getIdentity();
        $post = $this->Posts->get($id, [
            'contain' => ['Comments'],
        ]);
        $post['users_id'] = $id;
            $comment = $this->Comments->newEmptyEntity();
            if ($this->request->is(['patch', 'post', 'put'])) {
                $data = $this->request->getData();
                $data['posts_id'] = $id;
                $comment = $this->Comments->patchEntity($comment, $data);
                if ($this->Comments->save($comment)) {
                    $this->Flash->success(__('The comment has been saved.'));
                    return $this->redirect(['action' => 'viewPost', $id]);
                }
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        $this->set(compact('user','post'));
    }

    public function add()
    {
        $this->viewBuilder()->setLayout('website_layout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // dd($this->request->getData());
            $user = $this->Users->patchEntity($user,$this->request->getData());

            $image = $this->request->getData('image');
            $fileName = $image->getClientFilename();
            $path = WWW_ROOT.'img/'.$fileName;

            if($fileName){
                $image->moveTo($path);
                $user->image = $fileName;
            }

            if ($this->Users->save($user,
            [
                'associated' => ['Profile'],
                
            ])) {
                $this->Flash->success(__('The customer has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

   

    public function login()
    {
        
        $this->viewBuilder()->setLayout('website_layout');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        $session = $this->getRequest()->getSession(); 
        $session->write('email', $this->request->getData('email')); 
        if ($result && $result->isValid()) {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'dashboard',
            ]);

            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
