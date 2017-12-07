<?php
    App::uses('Model', 'Model');
    class Order extends AppModel {
	var $name = 'Order';
	public $actsAs = array('Containable');
	
        
	public $belongsTo = array(
                                    'Category'=>array(
                                                       'className'=>'Category',
                                                       'foreignKey'=>'type'
                                                       )  
                                );
    }
?>