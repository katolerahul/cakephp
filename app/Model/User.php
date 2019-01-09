<?php 
class User extends AppModel {
	
	
	public $validate = array(
		
		'username' => array(
			'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter email',
				),	
			'isUnique' => array(
				'rule' => array('isUnique', array('username','is_deleted'=>0), true),
				'message' => 'Email already exists.'
				),			
            'email' => array(
                'rule' => array('email', true),
                'message' => 'Please enter valid email',
				)
			),
				
		 'password' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please enter password',
            ),
			'minLength' => array(
                'rule' => array('minLength', 8),
                'message' => 'Password lenght should be minimum 8 characters',
            )
			),
			
			/*'mobile_no' => array(
				'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Please enter mobile number',
				),
			
				'maxLength' => array(
                'rule' =>  array('maxLength', 10),
                'message' => 'Please enter 10 digit mobile number',
				),
				'minLength' => array(
                'rule' => array('minLength', 10),
                'message' => 'Please enter 10 digit mobile number',
				)
			),*/
			
			'country' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => 'Please select country',
            )),
			
		
	);
	 
 public function beforeSave($options = array()){
	 
	 if(isset($this->data['User']['password'])){
		 $this->data['User']['password']= AuthComponent::password($this->data['User']['password']);
		 
		 return parent::beforeSave($options);
		 
	 }
	 
 }
}