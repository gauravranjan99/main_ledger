<?php

class CustomersController extends AppController {

    public $name = 'Customers';
    public $helpers = array('Js','Common','Barcode','QrCode');
    public $components = array('RequestHandler');

    public function index(){
        $this->layout='default';
    }


    public function add(){
        $this->autoRender=false;
        if($this->RequestHandler->isAjax()){
            Configure::write('debug', 0);
        }
            if(!empty($this->data)){
                if($this->Customer->save($this->data)){
                    $this->Session->setFlash('Your message has been submitted');
                    //$this->redirect(array('action' => 'index'));
                        }
            }
    }


    function beforeFilter() {
	     $this->layout='mylayout';
        $this->loadModel('Contact');
    }

    public function add_customer(){
        $model = "Customer";
        $folder = "userimg";
        $this->loadModel($model);
        if($this->RequestHandler->isAjax()){
            $this->layout = false;
            $this->autoRender = false;
            $data = $this->request->data['Customer']['image'];
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $imagename=rand().'_image.png';
            if(file_exists ($folder) != 1){
                    $oldmask = umask(0);
                    mkdir($folder, 0777);
                    umask($oldmask);
            }
            $fp = fopen(WWW_ROOT.$folder.DS.$imagename,'x+');
            if(fwrite($fp, $data)){
                $saveArr[$model]['name'] = $this->request->data[$model]['name'];
                $saveArr[$model]['reference'] = $this->request->data[$model]['reference'];
                $saveArr[$model]['address'] = $this->request->data[$model]['address'];
                $saveArr[$model]['phone'] = $this->request->data[$model]['phone'];
                $saveArr[$model]['image'] = $imagename;
                $this->$model->create();
                if($this->$model->save($saveArr)){
                    return 1;
                    exit;
                }
            }
	   }

    }


    /********************  Put This function in app **************************/

    public function edit_customer($customerId = null){
        $this->layout='mylayout';
        $model = "Customer";
        $folder = "userimg";
        $this->loadModel($model);
        if($this->RequestHandler->isAjax()){
	    $this->layout = false;
            $this->autoRender = false;
	    $saveArr = array();
	    if(!empty($this->request->data['Customer']['image'])) {
		$data = $this->request->data['Customer']['image'];
		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		$imagename=rand().'_image.png';
		if(file_exists ($folder) != 1){
			$oldmask = umask(0);
			mkdir($folder, 0777);
			umask($oldmask);
		}
		$fp = fopen(WWW_ROOT.$folder.DS.$imagename,'x+');
		if(fwrite($fp, $data)){
		    $saveArr[$model]['image'] = $imagename;
		}
	    } else {
		unset($this->request->data['Customer']['image']);
	    }
	    $saveArr[$model]['id'] = $this->request->data[$model]['id'];
      $saveArr[$model]['name'] = $this->request->data[$model]['name'];
	    $saveArr[$model]['reference'] = $this->request->data[$model]['reference'];
	    $saveArr[$model]['address'] = $this->request->data[$model]['address'];
	    $saveArr[$model]['phone'] = $this->request->data[$model]['phone'];
	    if($this->$model->save($saveArr)){
		return 1;
		exit;
	    }

	} else {
	    if(!empty($customerId)) {
		$this->request->data = $this->$model->find('first',array('conditions'=>array($model.'.id'=>$customerId)));
		//pr($this->request->data);
	    }
	}
    }
    public function autoname() {
    $this->layout='mylayout';
   $this->Customer->recursive = -1;
   if ($this->request->is('ajax')) {
      $this->autoRender = false;
      $this->layout = 'ajax';
      $results = $this->Customer->find('all', array('fields' => array('Customer.name'),
          'conditions' => array('Customer.name LIKE ' => $this->request->query['term'] . '%'),
          'group' => array('Customer.name'),
       ));
      $cities = Set::extract('../Customer/name', $results);
      echo json_encode($cities);
   }
}
    public function customer_listing($flashParam = null){

        $this->layout='mylayout';
        //$this->layout='my-dashboard';
        $this->loadModel('Customer');
        $cities = '';
        $this->set('cities', $cities);
	$conditionArr = '';
	if(!empty($_GET)) {
	    if(!empty($_GET['id'])){
		$id = trim($_GET['id']);
		$conditionArr['Customer.id LIKE']= '%'.$id.'%';
	    }
	    if(!empty($_GET['name'])){
		$name = trim($_GET['name']);
		$conditionArr['Customer.name LIKE']= '%'.$name.'%';;
	    }
	    if(!empty($_GET['phone'])){
		$phone = trim($_GET['phone']);
		$conditionArr['Customer.phone LIKE']= '%'.$phone.'%';;
	    }
	    if(!empty($_GET['reference'])){
		$reference = trim($_GET['reference']);
		$conditionArr['Customer.reference LIKE']= '%'.$reference.'%';;
	    }
	    $this->set(compact('id','name','reference','phone'));
	}
	$post = $this->Customer->find('all',array('order'=>'Customer.id DESC','conditions'=>$conditionArr));
        $this->set('abc',$post);
	if(!empty($flashParam) && ($flashParam == "flashAdd")) {
	    $this->Session->setFlash('Customer info have been added','/Notifications/success');
	} elseif(!empty($flashParam) && ($flashParam == "flashEdit")) {
	    $this->Session->setFlash('Customer info have been updated','/Notifications/success');
	}
    }


    //function for change status of category
         public function change_status($uid = NULL,$status = NULL)
    {
	$this->autoRender = false;

	$this->loadModel('Customer');
	if($uid!='' && $status!='')
	{
	  if($status==0)
	  {
	    $this->Customer->updateAll(array('Customer.status'=>0),array('Customer.id'=>$uid));
	  }
	  else
	  {
	    $this->Customer->updateAll(array('Customer.status'=>1),array('Customer.id'=>$uid));
	  }

	  $this->redirect(array('action'=>'customer_listing'));
	}
	else
	{
	  throw new NotFoundException(__('Error! Invalid Url'));
	}
    }

    public function delete_customer($id){
      $this->autoRender = false;
      $this->loadModel('Customer');
	    if($this->request->is('post')){
		    throw new MethodNotAllowedException(__('Invalid'));
	    }
	    if($this->Customer->delete($id)){
		//$this->Session->setFlash('<div class="errcolorsuc">The Customer with id: '.$id.' has been deleted.</div>');
		$this->redirect(array('controller'=>'customers','action'=>'customer_listing'));
	    }
    }

    public function view_customer($id = null) {
        $this->layout='mylayout';
        $posts = $this->Customer->findById($id);
	$this->set('customerId',$id);
        $this->set('post', $posts);
    }

    public function add_ledger($customerId = null,$purchase_date_order = null,$redirectParam = null) {
      //$this->layout='my-dashboard';
        $this->loadModel('Order');
        $this->loadModel('Category');
        $this->loadModel('Customer');
      	$this->loadModel('Payment');
      	$this->set('purchase_date_order',$purchase_date_order);
      	$this->set('redirectParam',$redirectParam);
      	$this->set('customerId',$customerId);
      	$this->set('type',$this->Category->find('list',array('conditions'=>array('Category.status'=>1),'fields'=>'Category.type')));

	if ($this->request->is('post')) {
	    //pr(($this->request->data));die;
	    $purchaseDate = date('Y-m-d h:m:s');
	    $itemCount = count($this->request->data['Order']['item']);
	    $totalItemAmount = '';
	    if(!empty($purchase_date_order) && ($redirectParam)) {
		//echo $paymentId = $this->request->data['Payment']['id'];die;
		$deleteStatus = $this->delete_order_on_edit($customerId,$purchase_date_order);
		if($deleteStatus == 1) {
		    for ($i = 0; $i < $itemCount; $i++) {
			$data['Order']['purchase_date'] = base64_decode($purchase_date_order);
			$data['Order']['customer_id'] = $customerId;
			$data['Order']['item'] = $this->request->data['Order']['item'][$i];
			$data['Order']['type'] = $this->request->data['Order']['type'][$i];
			$data['Order']['rate'] = $this->request->data['Order']['rate'][$i];
			$data['Order']['making_charge'] = $this->request->data['Order']['making_charge'][$i];
			$data['Order']['weight'] = $this->request->data['Order']['weight'][$i];
			$data['Order']['amount'] = $this->request->data['Order']['amount'][$i];
			$totalItemAmount = $data['Order']['amount']+$totalItemAmount;
			$this->Order->create();
			$this->Order->save($data);
		    }
		    //$paymentData['Payment']['id'] =
		    $this->Payment->updateAll(array('Payment.total_amount'=>$totalItemAmount,'Payment.amount'=>$totalItemAmount,'Payment.discount'=>null,'Payment.comment'=>null),array('Payment.customer_id'=>$customerId,'Payment.purchase_date'=>base64_decode($purchase_date_order)));
		    $this->Session->setFlash('Items Have been updated in the user cart','/Notifications/success');
		    $this->redirect(array('controller'=>'customers','action'=>'add_transaction',$customerId,$purchase_date_order));
		}
	    } else {
		for ($i = 0; $i < $itemCount; $i++) {
		$data['Order']['purchase_date'] = $purchaseDate;
		$data['Order']['customer_id'] = $customerId;
		$data['Order']['item'] = $this->request->data['Order']['item'][$i];
		$data['Order']['type'] = $this->request->data['Order']['type'][$i];
		$data['Order']['rate'] = $this->request->data['Order']['rate'][$i];
		$data['Order']['making_charge'] = $this->request->data['Order']['making_charge'][$i];
		$data['Order']['weight'] = $this->request->data['Order']['weight'][$i];
		$data['Order']['amount'] = $this->request->data['Order']['amount'][$i];
		$totalItemAmount = $data['Order']['amount']+$totalItemAmount;
		$this->Order->create();
		$this->Order->save($data);
	    }
		$paymentSaveArr['Payment']['customer_id'] = $customerId;
		$paymentSaveArr['Payment']['purchase_date'] = $purchaseDate;
		$paymentSaveArr['Payment']['total_amount'] = $totalItemAmount;
		$paymentSaveArr['Payment']['amount'] = $totalItemAmount;
		$vatPercentage = VAT_PER;
		$vat = ( $vatPercentage * $totalItemAmount )/100;
		$paymentSaveArr['Payment']['vat'] = $vat;
		$paymentSaveArr['Payment']['order_id'] = '#'."23263263";
		if($this->Payment->save($paymentSaveArr)) {
		    $this->Session->setFlash('Items Have been added in the user cart','/Notifications/success');
		    if(!empty($redirectParam)) {
			$this->redirect(array('controller'=>'customers','action'=>'add_transaction',$customerId,base64_encode($purchaseDate),$redirectParam));
		    } else {
			$this->redirect(array('controller'=>'customers','action'=>'add_transaction',$customerId,base64_encode($purchaseDate)));
		    }

		}
	    }
	} else {
		$orderData = $this->Order->find('all',array('conditions'=>array('Order.customer_id'=>$customerId,'Order.purchase_date'=>base64_decode($purchase_date_order))));
		$this->set('orderData',$orderData);
	}
    }

  public function calculate_item_amount(){
  	$rate = $_GET['rate'];
  	$makingCharge = $_GET['mkCharge'];
  	$weight = $_GET['weight'];
  	$this->layout = false;
  	$this->autoRender = false;
  	$amount = ($rate+ $makingCharge) * $weight;
  	return $amount;
  }

    public function calculate_discount(){
	$this->autoRender = false;
	$this->layout = false;
	$this->loadModel('Payment');
	$discount = $_GET['discount'];
	$paymentId = $_GET['paymentId'];
	$amount = $_GET['amount'];
	if((!empty($discount) && (is_numeric($discount))) || ($discount==0)) {
	    $newAmount = $amount - $discount;
	    $this->Payment->updateAll(array('Payment.total_amount'=>$newAmount,'Payment.discount'=>$discount),array('Payment.id'=>$paymentId));
	}
	echo 1;
    }

    public function add_discount_comment(){
	$this->autoRender = false;
	$this->layout = false;
	$this->loadModel('Payment');
	if(!empty($this->request->data)) {
	    $comment = "'".$this->request->data['comment']."'";
	    $paymentId = $this->request->data['paymentId'];
	    if(!empty($comment)) {
		$this->Payment->updateAll(array('Payment.comment'=>$comment),array('Payment.id'=>$paymentId));
		echo 1;
	    }
	}
    }

    public function calculate_emi(){
	$this->loadModel('Payment');
	$this->loadModel('Transaction');
	$this->autoRender = false;
	$this->layout = false;
	if(!empty($this->request->data)) {
	    $paymentId = $this->request->data['Transaction']['payment_id'];
	    $amountToPay = $this->request->data['Transaction']['amount_to_pay'];
	    $amountPaid = $this->request->data['Transaction']['amount_paid'];
	    $saveArr['Transaction']['amount_to_pay'] = $amountToPay;
	    $saveArr['Transaction']['amount_paid'] = $amountPaid;
	    $saveArr['Transaction']['payment_id'] = $paymentId;
	    if($amountPaid < $amountToPay) {
		$pendingAmount = $amountToPay - $amountPaid;
		$saveArr['Transaction']['dues'] = $pendingAmount;
	    }elseif($amountPaid > $amountToPay){
		$extraAmount = $amountPaid - $amountToPay;
		$saveArr['Transaction']['extra'] = $extraAmount;
	    } elseif($amountPaid == $amountToPay) {
		$this->Payment->updateAll(array('Payment.status'=>2),array('Payment.id'=>$paymentId));
	    }

	    $this->Transaction->create();
	    if($this->Transaction->save($saveArr)){
		echo 1;
	    }

	}
    }

    public function add_transaction($customerId = null,$purchaseDate = null,$disableAttr = null) {
	$this->loadModel('Payment');
	$this->loadModel('Transaction');
	$paymentData = $this->Payment->find('first',array('conditions'=>array('Payment.customer_id'=>$customerId,'Payment.purchase_date'=>base64_decode($purchaseDate)),'order'=>'Payment.id DESC'));
	$transactionData = $this->Transaction->find('all',array('conditions'=>array('Transaction.payment_id'=>$paymentData['Payment']['id']),'order'=>'Transaction.id ASC'));
	$this->set(compact('paymentData','transactionData','disableAttr','customerId'));

    }

     public function transaction_details($customerId = null,$purchaseDate = null) {
	$this->loadModel('Payment');
	$paymentData = $this->Payment->find('first',array('conditions'=>array('Payment.customer_id'=>$customerId,'Payment.purchase_date'=>base64_decode($purchaseDate)),'order'=>'Payment.id DESC'));
	$this->set('paymentData',$paymentData);

    }

    public function delete_order($customerId = null,$purchaseDate = null) {
	$this->autoRender = false;
	$this->layout = false;
	$this->loadModel('Payment');
	$this->loadModel('Order');
	$paymentData = $this->Payment->find('first',array('conditions'=>array('Payment.customer_id'=>$customerId,'Payment.purchase_date'=>base64_decode($purchaseDate))));
	$paymentId = $paymentData['Payment']['id'];
	$conditionsArr = array('Order.customer_id'=>$customerId,'Order.purchase_date'=>base64_decode($purchaseDate),false);
    	if($this->Order->deleteAll($conditionsArr)) {
	    $this->Payment->delete($paymentId);
	}
	$this->Session->setFlash('All the info related to this order has been erased','/Notifications/success');
	$this->redirect(array('controller'=>'customers','action'=>'view_customer',$customerId));
    }

    public function delete_order_on_edit($customerId = null,$purchaseDate = null) {
	$this->loadModel('Order');
	$conditionsArr = array('Order.customer_id'=>$customerId,'Order.purchase_date'=>base64_decode($purchaseDate),false);
    	if($this->Order->deleteAll($conditionsArr)) {
	    return 1;
	}
    }

    public function generate_invoice($customerId = null,$paymentId = null,$purchaseDate = null) {
	$this->loadModel('Payment');
	$paymentData = $this->Payment->find('first',array('conditions'=>array('Payment.id'=>$paymentId)));
	$this->set('paymentData',$paymentData);
	//pr($paymentData);
    }


    public function add_category()
    {
       $this->loadModel('Category');
       if($this->request->is('post')){
       $this->Category->create();
        if($this->Category->save($this->request->data)){
            $this->Session->setFlash('<div class="success-msg">Category added successfully!!!</div>');
            $this->redirect(array('controller' => 'Customers', 'action' => 'category_listing'));
        }
       }
    }

    public function category_listing() {
        $this->loadModel('Category');
        $category = $this->Category->find('all',array('order'=>'Category.id ASC'));
        $this->set('abc',$category);
    }


    public function change_category_status($uid = NULL,$status = NULL)
    {
	$this->autoRender = false;

	$this->loadModel('Category');
	if($uid!='' && $status!='')
	{
	  if($status==0)
	  {
	    $this->Category->updateAll(array('Category.status'=>0),array('Category.id'=>$uid));
	  }
	  else
	  {
	    $this->Category->updateAll(array('Category.status'=>1),array('Category.id'=>$uid));
	  }

	  $this->redirect(array('action'=>'category_listing'));
	}
	else
	{
	  throw new NotFoundException(__('Error! Invalid Url'));
	}
    }

     public function delete_category($id){
      $this->autoRender = false;
      $this->loadModel('Category');
	    if($this->request->is('post')){
		    throw new MethodNotAllowedException(__('Invalid'));
	    }
	    if($this->Category->delete($id)){
		//$this->Session->setFlash('<div class="errcolorsuc">The Customer with id: '.$id.' has been deleted.</div>');
		$this->redirect(array('controller'=>'customers','action'=>'category_listing'));
	    }
    }





    ///test function for autocomplete//////

public function cities_dropdown ()
{
    $cities = '';
    $this->set('cities', $cities);
}

public function find() {
    $this->layout='mylayout';
   $this->Contact->recursive = -1;
   if ($this->request->is('ajax')) {
      $this->autoRender = false;
      $this->layout = 'ajax';
      $results = $this->Contact->find('all', array('fields' => array('Contact.city'),
          'conditions' => array('Contact.city LIKE ' => $this->request->query['term'] . '%'),
          'group' => array('Contact.city'),
       ));
      $cities = Set::extract('../Contact/city', $results);
      echo json_encode($cities);
   }
}
    public function test(){
      $this->layout='my-dashboard';
      $post = $this->Customer->find('all',array('order'=>'Customer.id DESC'));
      $this->set('abc',$post);
    }



}
?>
