<?php
class CommonHelper extends AppHelper {
     
     public function fetchCustomerOrder($customerId = null,$purchaseDate = null) {
        $this->Order = ClassRegistry::init('Order');
        $orderData = $this->Order->find('all',array('conditions'=>array('Order.customer_id'=>$customerId,'Order.purchase_date'=>$purchaseDate)));
        return $orderData;
    }
    
     public function fetchPaymentOrder($customerId = null) {
         $this->Payment = ClassRegistry::init('Payment');
         $paymentData = $this->Payment->find('all',array('conditions'=>array('Payment.customer_id'=>$customerId),'order'=>'Payment.id DESC'));
         return $paymentData;
     }
     
     public function fetchPaymentDues($paymentId = null) {
         $this->Transaction = ClassRegistry::init('Transaction');
         $transactionData = $this->Transaction->find('first',array('conditions'=>array('Transaction.payment_id'=>$paymentId),'order'=>'Transaction.id DESC'));
         if(empty($transactionData)) {
               return $dues = "No Transaction Yet"; 
         } elseif(!empty($transactionData['Transaction']['dues'])) {
         return $transactionData['Transaction']['dues'];
         }
     }

    
}
