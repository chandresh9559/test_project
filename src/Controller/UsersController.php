<?php
declare(strict_types=1);

namespace App\Controller;



class UsersController extends AppController
{
    // function for load model and give access to the page befor login
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Model = $this->loadModel('Posts');
        $this->Model = $this->loadModel('Comments');
        $this->Model = $this->loadModel('Profile');
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
        // echo"<pre>";
        // print_r($user);
        // die;
        
       
        
        $comment = $this->paginate($this->Comments);
        $this->paginate = [
            'contain' => ['Users'],
        ];
        // $posts = $this->Posts->find('all',['order'=>['id'=>'DESC']]);
        
        $posts = $this->paginate($this->Posts);
    
        $this->set(compact('user','posts','comment'));

       
       
    }

    public function addComment($id=null){
        $comment = $this->Comments->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Authentication->getIdentity();
            $user_id = $user->id;
            $user_name = $user->name;    
            $data['posts_id'] = $id;
            $data['user_id'] = $user_id;
            $data['name'] = $user_name;
            $data['comment'] = $this->request->getData('comment');
            $comment = $this->Comments->patchEntity($comment, $data);
            //  echo '<pre>'; print_r($comment);die;
            if ($this->Comments->save($comment)) {
                $this->Flash->success(__('The comment has been saved.'));
                return $this->redirect(['action' => 'allPost']);
            }else{
                
                return $this->redirect(['action' => 'allPost']);
                $this->Flash->error(__('The comment could not be saved. Please, try again.'));
            }
        }

      
    }

    // function to view your profile
    // public function profile($id=null)
    // {
       
    //     $this->viewBuilder()->setLayout('admin_layout');
       
    //     $this->request->allowMethod(['get', 'post']);
    //     $user = $this->Authentication->getIdentity();
    //     $this->set(compact(''));


    //     // // $this->paginate = [
    //     // //     'contain' => ['Users'],
    //     // // ];
    //     // // $profile = $this->paginate($this->Profile);

    //     // // $this->set(compact('profile'));
    //     // $user = $this->paginate($this->Users,['contain'=>['Profile']]);

    //     // $this->set(compact('user'));
        
    // }

    public function profile($id = null)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        $user = $this->Users->get($id, [
            'contain' => ['Profile'],
        ]);

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

            $image = $this->request->getData('image_file');
            $fileName = $image->getClientFilename();
            $path = WWW_ROOT.'img/'.DS.$fileName;

            if($fileName){

                $image->moveTo($path);
                $post->post = $fileName;
            }
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('The post has been saved.'));

                return $this->redirect(['controller'=>'Users','action' => 'allPost', $id]);
            }
            $this->Flash->error(__('The post could not be saved. Please, try again.'));
        }
        $users = $this->Posts->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('user','post', 'users'));
    }

    // public function viewPost($id = null)
    // {
    //     $this->viewBuilder()->setLayout('admin_layout');
    //     $user = $this->Authentication->getIdentity();
    //     $post = $this->Posts->get($id, [
    //         'contain' => ['Comments'],
    //     ]);
    //     $post['users_id'] = $id;
    //         $comment = $this->Comments->newEmptyEntity();
    //         if ($this->request->is(['patch', 'post', 'put'])) {
    //             $data = $this->request->getData();
    //             $data['posts_id'] = $id;
    //             $comment = $this->Comments->patchEntity($comment, $data);
    //             if ($this->Comments->save($comment)) {
    //                 $this->Flash->success(__('The comment has been saved.'));
    //                 return $this->redirect(['action' => 'viewPost', $id]);
    //             }
    //             $this->Flash->error(__('The comment could not be saved. Please, try again.'));
    //         }
    //     $this->set(compact('user','post'));
    // }


    

    public function add()
    {

        // $this->viewBuilder()->setLayout('website_layout');

        // $image_data = $this->request->getData('image');

        // $contents = $image_data;
        // $contents = explode('base64', $contents);
        // $contents = base64_decode(str_replace(' ', '+', $contents[1]));
        
        
        // $f = finfo_open();
        // $mime_type = finfo_buffer($f, $contents, FILEINFO_MIME_TYPE);
        // $ext = $this->getFileExt($mime_type);
        // $unique = rand(9999, 99999).microtime();
        // $path = 'files/';
        // $path = WWW_ROOT . 'img' . DS. $unique.$ext;


        // $path = str_replace(" ", "", $path);
        // file_put_contents($path, $contents);

        // dd('here');

        // /** FILE CREATE END */
        
        // $name = $this->request->getData('name');
        // $email = $this->request->getData('email');
        // $password = $this->request->getData('password');
        // $occupation = $this->request->getData('occupation');
        // $phone = $this->request->getData('profile.phone');
        // $address = $this->request->getData('profile.address');
        // $gender = $this->request->getData('profile.gender');
        // $image = $this->request->getData('image');
        // //save these field into database using patchEntity
        // echo json_encode(array(
        //     "status" => 200,
        //     "message" => "Data Submitted Successfully",
        //     "name" => $name,
        //     "email" => $email,
        //     "image" => $image,
        //     "password" => $password,
        //     "profile.phone" => $phone,
        //     "profile.gender" => $gender,
        //     "profile.address" => $address,
        //     "" => $image,
        // ));
        // die;
        // $this->viewBuilder()->setLayout('website_layout');
        // $user = $this->Users->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     // dd($this->request->getData());
        //     $user = $this->Users->patchEntity($user,$this->request->getData());

        //     // $image = $this->request->getData('image');
        //     // $fileName = $image->getClientFilename();
        //     // $path = WWW_ROOT.'img/'.$fileName;

        //     // if($fileName){
        //     //     $image->moveTo($path);
        //     //     $user->image = $fileName;
        //     // }

        //     if ($this->Users->save($user
        //     // 
        //     // [
        //         // 'associated' => ['Profile'],
        //         // 
        //     // ])
        //     )) {
        //         $this->Flash->success(__('The customer has been saved.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The customer could not be saved. Please, try again.'));
        // }
        // $this->set(compact('user'));

        $this->viewBuilder()->setLayout('website_layout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $data = $this->request->getData();
            $email = $this->request->getData('email');
            $result = $this->Users->find('all')->where(['email'=>$email])->first();
            if(!$result){

                $user = $this->Users->patchEntity($user, $this->request->getData());
            
                // $image = $this->request->getData('image');
                // $fileName = $image->getClientFilename();
                // $path = WWW_ROOT.'img/'.$fileName;
    
                // if($fileName){
                //     $image->moveTo($path);
                //     $user->image = $fileName;
                // }
                if ($this->Users->save($user,['associated' => ['Profile']])) {
    
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "user has been created"
                    )); 
    
                    exit;
                }

            }

            echo json_encode(array(
                "status" => 0,
                "message" => "email is already exist",
            )); 

            exit;
        }
        $this->set(compact('user'));


    }

    public function addUser(){
        
        $this->viewBuilder()->setLayout('website_layout');
        $user = $this->Users->newEmptyEntity();
    
        if ($this->request->is('post')) {
            
            print_r($this->request->getData('name'));die;
            $user = $this->Users->patchEntity($user, );
            if ($this->Users->save($user)) {

                $this->Flash->success(__('Student has been created'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Student has been created"
                )); 

                exit;
            }

            $this->Flash->error(__('Failed to save student data'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            )); 

            exit;
        }
       
    }

    
    
    // function for edit user profile
    // public function edit($id = null)
    // {
    //     $this->viewBuilder()->setLayout('admin_layout');
    //     $user = $this->Users->get($id, [
    //         'contain' => ['Profile'],
   

    
    
    // function for edit user profile
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('admin_layout');
        
        // $user = $this->Users->get($id, [
        //     'contain' => ['Profile'],
        // ]);
        // $newFile = $user['image'];
        // // print_r($newFile);
        // // die;
        
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $user = $this->Users->patchEntity($user, $this->request->getData());

        //      $image = $this->request->getData('image');
        //      $fileName = $image->getClientFilename();
        //      $path = WWW_ROOT.'img/'.DS.$fileName;

        //     if ($fileName == '') {
        //         $fileName = $newFile;
        //     }
         
        //     if($fileName){
        //             $image->moveTo($path);
        //             $user->image=$fileName;
        //     }
        //     if ($this->Users->save($user)) {
        //             $this->Flash->success(__('The user has been saved.'));

        //             return $this->redirect(['action' => 'index']);
        //         }
        //         $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }    
        
        $this->set(compact('user'));
    }


    // public function edit($id = null)
    // {
    //     $this->viewBuilder()->setLayout('admin_layout');
    //     $user = $this->Users->get($id, [
    //         'contain' => ['Profile'],
    //     ]);
    //     $newFile = $user['image'];

        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $data = $this->request->getData();
        //     $userImage = $this->request->getData("image");
        //     $fileName = $userImage->getClientFilename();
        //     if ($fileName == '') {
        //         $fileName = $newFile;
        //     }

        //     $data["image"] = $fileName;
        //     $user = $this->Users->patchEntity($user, $data);
        //     if ($this->Users->save($user)) {
        //         $hasFileError = $userImage->getError();
        //         if ($hasFileError > 0) {
        //             $data["image"] = "";
        //         } else {
        //             $fileType = $userImage->getClientMediaType();

        //             if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg" || $fileType == "image/webp") {
        //                 $imagePath = WWW_ROOT . "img/" . $fileName;
        //                 $userImage->moveTo($imagePath);
        //                 $data["image"] = $fileName;
        //             }
        //         }
        //         $this->Flash->success(__('The user has been saved.'));

        //         return $this->redirect(['action' => 'userIndex']);
        //     }
        //     $this->Flash->error(__('The user could not be saved. Please, try again.'));
        // }
        // $this->set(compact('user'));
    // }

    // function for delete user
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
    
    // function for login to all user and admin
    public function login()
    {
        
        $this->viewBuilder()->setLayout('website_layout');
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $result = $this->Authentication->getIdentity();
           if($result->role == 1){
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Admin',
                'action' => 'dashboard',
            ]);
            return $this->redirect($redirect);

           }
           if($result->role ==0){

            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'allPost',
            ]);

            return $this->redirect($redirect);
           }
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    // function for logout user
    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
