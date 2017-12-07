<?php
    App::uses('Model', 'Model');
    class Payment extends AppModel {
	var $name = 'Payment';
	public $actsAs = array('Containable');
	
        
	public $belongsTo = array(
                                    'Customer'=>array(
                                                       'className'=>'Customer',
                                                       'foreignKey'=>'customer_id'
                                                       )  
                                );
        
        //public $hasMany = array(
        //                            'Order'=>array(
        //                                               'className'=>'Order',
        //                                               'conditions'=>array('Order.customer_id'=> 'Payment.cutomer_id')
        //                                               )  
        //                        );
	
        
	public function beforeSave($options = array()) {
	   // pr($this->data);die;
	    if (isset($this->data[$this->alias]['password'])) {
		
		$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
    }
?>
