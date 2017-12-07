<?php
    App::uses('Model', 'Model');
    class User extends AppModel {
	var $name = 'User';
	public $actsAs = array('Containable');
	
	public $validate = array(          
		'username' => array(
                            'notEmpty' => array(
                                 'rule' => array('notEmpty'),
                                 'message' => 'User Name is required.',
                                 'last' => true
                            ),
                            'UniqueField' => array(
                                 'rule' => array('isUnique'),
                                 'message' => 'User Name should be Unique'
                            )
                )
	);
	
	
	public function beforeSave($options = array()) {
	   // pr($this->data);die;
	    if (isset($this->data[$this->alias]['password'])) {
		
		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
    }
?>