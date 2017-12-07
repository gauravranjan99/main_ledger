<?php
    App::uses('Model', 'Model');
    class Customer extends AppModel {
	var $name = 'Customer';
	public $actsAs = array('Containable');
	
        
//	public $belongsTo = array(
//                                    'Customer'=>array(
//                                                       'className'=>'Customer',
//                                                       'foreignKey'=>'customer_id'
//                                                       )  
//                                );
//        
	public function beforeSave($options = array()) {
	   // pr($this->data);die;
	    if (isset($this->data[$this->alias]['password'])) {
		
		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
    }
?>