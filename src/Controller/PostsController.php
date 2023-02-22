<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Posts Controller
 *
 * @property \App\Model\Table\PostsTable $Posts
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PostsController extends AppController
{

    // public function initialize(): void
    // {
    //     $this->Model = $this->loadModel('Comments');
    //     $this->loadComponent('Flash');
    // }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $posts = $this->paginate($this->Posts);

        $this->set(compact('posts'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $post = $this->Posts->get($id, [
    //         'contain' => ['Users','Comments'],
    //     ]);

    //     $this->set(compact('post'));
    // }


    public function view($id = null)
    {
        $this->Model = $this->loadModel('Comments');
        $post = $this->Posts->get($id, [
            'contain' => ['Users', 'Comments'],
        ]);
        // $post['users_id'] = $userid;
     
        $comment = $this->Comments->newEmptyEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['posts_id'] = $id;
            $comment = $this->Comments->patchEntity($comment, $data);
            // echo '<pre>'; print_r($comment);die;
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The comment could not be saved. Please, try again.'));
        }

        $this->set(compact('post', 'comment'));
    }

    


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $post = $this->Posts->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $post = $this->Posts->patchEntity($post, $this->request->getData());
    //         if ($this->Posts->save($post)) {
    //             $this->Flash->success(__('The post has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The post could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
    //     $this->set(compact('post', 'users'));
    // }

    public function add($id)
    {
        $post = $this->Posts->newEmptyEntity();
        $post['users_id'] = $id;
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['users_id'] = $id;
            $post = $this->Posts->patchEntity($post, $data);
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['controller'=>'Users','action' => 'view', $id]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users'));
    }
   
   
    /**
     * Edit method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $post = $this->Posts->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $post = $this->Posts->patchEntity($post, $this->request->getData());
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('post', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Post id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $post = $this->Posts->get($id);
        if ($this->Posts->delete($post)) {
            $this->Flash->success(__('The post has been deleted.'));
        } else {
            $this->Flash->error(__('The post could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
}
