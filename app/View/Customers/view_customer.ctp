<?php //echo  $this->Html->link('Add Customer',array('controller'=>'Customers','action'=>'add_customer'),array('class'=>'btn-add','escape'=>false), false); ?>

<?php echo  $this->Html->link('Add ledger',array('controller'=>'customers','action'=>'add_ledger',$post['Customer']['id']),array('class'=>'btn-add','escape'=>false,'style'=>'margin-top:-20px;margin-right:33px;'), false); ?>  
        <!-- content start here -->
        <div class="content">
        	<div class="wrap">
            	<div class="profile-wrap-outer">
                    <h2>Customer Information</h2>
                    <!-- profile wrap start here -->
                    <div class="profile-wrap clearfix">
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Name</dt>
                                <dd><strong><?php echo $post['Customer']['name'];?></strong></dd>
                                
                                <dt>Reference</dt>
                                <dd><strong><?php echo $post['Customer']['reference'];?></strong></dd>
                                
                                <dt>Address</dt>
                                <dd><strong><?php echo $post['Customer']['address'];?></strong></dd>
                                
                                <dt>Phone</dt>
                                <dd><strong><?php echo $post['Customer']['phone'];?></strong></dd>
                            </dl>
                        </div>
                        
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Photo</dt>
                                <dd><strong><?php echo $this->Html->image(BASE_URL.'userimg/'.$post['Customer']['image'],array('height'=>'180px','width'=>'180px')); ?></strong></dd>
                            </dl>
                        </div>
			
                    </div><!-- /profile wrap end -->
		     <div class="tbl-wrap clearfix">
		    <table>
                    	<thead>
                        	<tr>
                            	<th>Sr. No</th>
                                <th>Order Date</th>
                                <th>Amount</th>
				<th>Discount</th>
				<th>Grand Total</th>
			      <th>Gift Comments</th>
			      <th>Dues</th>
                                <th>Status</th>
				<th>Actions</th>
				
                            </tr>
			 </thead>
                                <?php
				$paymentData = $this->Common->fetchPaymentOrder($customerId);
				if(!empty($paymentData)){//pr($paymentData);
				   $j = 1;
				foreach($paymentData as $a){
				    $dues = 'NIL';
				    if(!empty($a['Payment']['status']) && ($a['Payment']['status'] == 1)) {
					$dues = $this->Common->fetchPaymentDues($a['Payment']['id']);
					
				    }
				   ?>
				  
			 
				   <tbody>
					   <tr>
					   <td><?php echo $j; ?></td>
					   <td><?php echo !empty($a['Payment']['purchase_date'])?$a['Payment']['purchase_date']:'N/A'; ?></td>
					   <td><?php echo !empty($a['Payment']['amount'])?$a['Payment']['amount']:'N/A'; ?></td>
					   
					    <td><?php echo !empty($a['Payment']['discount'])?$a['Payment']['discount']:'N/A'; ?></td>
					    <td><?php echo !empty($a['Payment']['total_amount'])?$a['Payment']['total_amount']:'N/A'; ?></td>
					    
					     <td><?php echo !empty($a['Payment']['comment'])?$a['Payment']['comment']:'N/A'; ?></td>
					     <td><?php echo $dues;?></td>
					   <td><?php echo (!empty($a['Payment']['status']) && ($a['Payment']['status'] == 1))? '<p style="color:red">PENDING</p>':'<p style="color:green">CLEAR</p>'; ?></td>
					  
					   <td>
					     <div class="tbl-action-icon">
                                        <?php
					 if(!empty($a['Payment']['status']) && ($a['Payment']['status'] == 1)) {
					     echo $this->Html->link($this->Html->image('view.png',array('height'=>'30px','width'=>'30px','alt'=>"addTransaction", 'title'=>"View Payment DEtails") ),array('controller'=>'customers','action'=>'add_transaction',$a['Customer']['id'],base64_encode($a['Payment']['purchase_date'])),array('escape'=>false));
					      echo  $this->Html->link($this->Html->image('delete.png',array('height'=>'30px','width'=>'30px','alt'=>"Delete Order", 'title'=>"Delete o") ),array('controller'=>'customers','action'=>'delete_order',$a['Customer']['id'],base64_encode($a['Payment']['purchase_date'])),array('escape'=>false),'Are you sure you want to delete this order?', false);
					 } else {
					     
					      echo $this->Html->link( 'INVOICE',array('controller'=>'customers','action'=>'generate_invoice',$a['Customer']['id'],$a['Payment']['id'],base64_encode($a['Payment']['purchase_date'])),array('escape'=>false));
					     
					     echo $this->Html->link($this->Html->image('view.png',array('height'=>'30px','width'=>'30px','alt'=>"addTransaction", 'title'=>"View Payment DEtails") ),array('controller'=>'customers','action'=>'add_transaction',$a['Customer']['id'],base64_encode($a['Payment']['purchase_date']),'disabled'),array('escape'=>false));
					     
					     echo  $this->Html->link($this->Html->image('delete.png',array('height'=>'30px','width'=>'30px','alt'=>"Delete Order", 'title'=>"Delete o") ),array('controller'=>'customers','action'=>'delete_order',$a['Customer']['id'],base64_encode($a['Payment']['purchase_date'])),array('escape'=>false),'Are you sure you want to delete this order?', false);
					    
					 }
					 
					
					?>
					</div></td>
				       </tr>
				   <?php $j++;} } else {
					echo "<tr><td colspan='8'>No Transaction made</td></tr>";
				   }
				   ?>
				   </tbody>
                       
                    </table>
		     </div>
                </div>
            	
            </div>
                
        </div><!-- /content end -->
    
    