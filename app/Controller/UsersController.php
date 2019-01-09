<?php class UsersController extends AppController {
	public $helpers = array('Html','Form','Flash');
	
	public $components = array('Session','Flash');
	
	  public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('login','add');
		
	} 
	 
	public function login(){
		 
		if($this->request->is('post')){
			
			$email = !empty($this->request->data ['User'] ['username']) ? trim($this->request->data ['User'] ['username']) : null;
            $password = !empty($this->request->data ['User'] ['password']) ? trim(AuthComponent::password($this->request->data['User']['password'])) : null;
			 
			  $conditions = array(
                'User.username' => $email,
                'User.password' => $password,
                );
			 $userData = $this->User->find('first', array(
            'conditions' => $conditions,));
			if(!empty($userData)){
				 if ($this->Auth->login()) {
				$this->Session->setFlash('Welcome '.$this->Auth->user('username'));
				 $this->redirect(array('action'=>'index'));
				 }
			}
			//print_r($userData);exit;
			
		} 
	}
	
	public function logout(){
		$this->redirect($this->Auth->logout());
		
	}
	
	public function index(){
		
		$id=$this->Auth->user('id');
	
		$users = $this->User->findById($id);
		//print_r($users); exit;
		$this->set('users',$users);
		print_r($this->request->data['UserSearch']); 
		if(isset($this->request->data['UserSearch'])){
			if(isset($this->request->data['UserSearch']['name']) and !empty($this->request->data['UserSearch']['name']))				
			{
				$cond['User.username LIKE']="%".$this->request->data['UserSearch']['name']."%";
			}
			$this->request->data['UserSearch']['name'];
		}
		
		
        $conditions = array(
                'User.is_deleted' =>0,
                );
		$conditions=array_merge($conditions,$cond);
		
			 $userData = $this->User->find('all', array(
            'conditions' => $conditions,));	
       //  print_r($userData); exit;
      $this->set('userData',$userData);		 
	}
	
	public function add(){
		
		if($this->request->is('post')){
			
			//print_r($this->request->data);exit;	
			if($this->data['User']['image']['name']){
				$file = $this->data['User']['image'];
				$ext = substr(strtolower(strrchr($file['name'],'.')),1);
				$ext_arr = array('jpg','jpeg','png');
				if(in_array($ext,$ext_arr)){
				  if(move_uploaded_file($file['tmp_name'],WWW_ROOT. 'img/images/' .DS. $file['name'])){
					 $this->request->data['User']['image']=$file['name']; 
				  }
				}else{
					$this->Flash->error(__('Invalid File Format'));
				}
			}
			$this->request->data['User']['client_ip']=$this->request->clientIp();
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('User Data Saved Successfully'));
				return $this->redirect(array('controller'=>'users','action'=>'login'));
			}else{
				$this->Flash->error(__('User Data not Saved'));
			}
		}
		
	}
	
	
	
	public function edit($id=null){
		if(empty($id)){
			throw new NotFoundException(__('Invalid'));
		}
		$users=$this->User->findById($id);
		//print_r($users);exit;
		if($this->request->is(array('post','put'))){
				
			if($this->data['User']['tmp_img']['name']){
				$file = $this->data['User']['tmp_img'];
				$ext = substr(strtolower(strrchr($file['name'],'.')),1);
				$ext_arr = array('jpg','jpeg','png');
				if(in_array($ext,$ext_arr)){
				  if(move_uploaded_file($file['tmp_name'],WWW_ROOT. 'img/images/' .DS. $file['name'])){
					 $this->request->data['User']['image']=$file['name']; 
					 pr($this->data);
				  }
				}else{
					$this->Flash->error(__('Invalid File Format'));
				}
			}else{
				 $this->request->data['User']['image']=$this->request->data['User']['image']; 
			}
			$this->request->data['User']['client_ip']=$this->request->clientIp();
			$this->User->id=$id;
			if($this->User->save($this->request->data)){
				$this->Flash->success(__('User Data Updated Successfully'));
				return $this->redirect(array('controller'=>'users','action'=>'index'));
			}else{
				$this->Flash->error(__('User Data Could not be Saved Successfully'));
			}
		}
		if(!$this->request->data){
			$this->request->data = $users;
		}
		
		
	}
}