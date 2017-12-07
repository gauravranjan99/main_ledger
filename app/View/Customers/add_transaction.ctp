<!--<style>
    table tr.installmentTr{background-color: red;}
</style>-->
<div class="wrap refresh-after-ajax">
            	<!-- search panel start here -->
            	
                <?php echo "<b>TRANSACTION PROCESS</b>";
		    if(empty($disableAttr)) {
						echo $this->Html->link($this->Html->image('edit.png',array('height'=>'30px','width'=>'30px','alt'=>"Edit Order", 'title'=>"Edit Order")),array('controller'=>'customers','action'=>'add_ledger',$customerId,base64_encode($paymentData['Payment']['purchase_date']),'redirect'),array('escape'=>false));
					    }
		?>
                
                <div class="clearfix"></div>
                <!-- table wrap start here -->
                <div class="tbl-wrap clearfix refresh-after-ajax">
		    <table>
                    	<thead>
                            <tr>
				
				<th>QTY</th>
                            	<th>Item Name</th>
                                <th>Type</th>
                                <th>Rate</th>
                                <th>Making Charge</th>
                                <th>weight</th>
                                <th>Amount to pay</th>
                            </tr>
                                
                        </thead>
                    <?php //pr($paymentData);die;
                        if(empty($paymentData)) { 
			    echo "<tbody><tr><td colspan='7'>there are no data</td></tr></tbody>";
                            
                        } else {
                            $orderData = $this->Common->fetchCustomerOrder($paymentData['Payment']['customer_id'],$paymentData['Payment']['purchase_date']);
			    echo "<tbody>";
			    $m = 1;
			    foreach($orderData as $a){ ?>
				<tr>
				    <td><?php echo $m;?></td>
				    <td><?php echo !empty($a['Order']['item'])?$a['Order']['item']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Category']['type'])?$a['Category']['type']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['rate'])?$a['Order']['rate']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['making_charge'])?$a['Order']['making_charge']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['weight'])?$a['Order']['weight']:'N/A'; ?></td>
				    <td>
					<?php 
					    echo !empty($a['Order']['amount'])?$a['Order']['amount']:'N/A'; 
					    
					?>
				    </td>
				</tr>
			    <?php $m++;} ?>
			    
				<tr>
				    <td colspan="6">Total</td>
				    <td><?php echo $paymentData['Payment']['amount']?></td>
				</tr>
			
				<tr>
				    <td colspan="5">Discount</td>
				    <td>
					<?php
					
					    if(!empty($disableAttr)) {
						$disAble = 'true';
						$cbtn = '';
					    } else {
						$disAble = 'false';
						$cbtn = '<input type="button" id="commentBtn" value="Add" class="btn"/>';
					    }
					    
					    echo $this->Form->input('Transaction.payment_id',array('type'=>'hidden','value'=>$paymentData['Payment']['id'],'class'=>'discount_payment_id'));
					echo $this->Form->input('Transaction.total_amount',array('type'=>'hidden','value'=>$paymentData['Payment']['amount'],'class'=>'amount'));
					
					 echo $this->Form->input('Transaction.comment',array('type'=>'textarea','div'=>false,'label'=>false,'placeholder'=>'comment for free gift if any','id'=>'comment','class'=>'comment','value'=>$paymentData['Payment']['comment'],"style"=>"height:50px !important;",'disabled'=>$disAble));
					echo $cbtn;?>
					
				    </td>
				
				    <td id="discountAmount" colspan="2">
				    
					<?php
					    $disAble = '';
					    $btn = '<input type="button" id="discountBtn" value="DEDUCT" class="btn"/>';
					    if(!empty($disableAttr)) {
						$disAble = 'true';
						$btn = '';
					    } else {
						$disAble = 'false';
						$btn = '<input type="button" id="discountBtn" value="DEDUCT" class="btn"/>';
					    }
					 
					    echo $this->Form->input('Transaction.discount',array('div'=>false,'label'=>false,'placeholder'=>'Discount Amount','id'=>'discount','class'=>'discount','value'=>$paymentData['Payment']['discount'],'disabled'=>$disAble));
					    echo $btn;
					?>
				    </td>
				
				
					
				   
				
			    </tr>
				
                            <tr>
                                <td colspan="6">Grand Total</td>
                                <td><?php echo $paymentData['Payment']['total_amount']?></td>
                            </tr>
			    <?php if(!empty($transactionData)) {
				$i = 1;
				$count = count($transactionData);
				foreach($transactionData as $data) { ?>	
			   
			    <tr class="installmentTr">
				<td>Payment date :</td><td> <?php echo !empty($data['Transaction']['created'])?date('d-m-Y h:m:s',strtotime($data['Transaction']['created'])):'N/A'; ?></td>
                                <td colspan="3">Installment <?php echo $i?></td>
				<td><?php echo $data['Transaction']['amount_paid']?></td>
                                <td><?php
					if(!empty($data['Transaction']['dues'])) {
					    echo $data['Transaction']['dues'];
					} else{
					    echo "NIL";
					}
				    ?>
				</td>    
                            </tr>
			    <?php
				if(($paymentData['Payment']['status'] == 1) && ($i == $count)) {
				    echo '<tr><td colspan="6">Amount Paid</td>';
				    echo '<td>';
				     echo $this->form->create('Transaction',array('url'=>array('url'=>array('controller'=>'Customers','action'=>'transaction_details',$paymentData['Payment']['id']))));
				    echo $this->Form->input('Transaction.payment_id',array('type'=>'hidden','value'=>$paymentData['Payment']['id'],'class'=>'payment_id'));
				    echo $this->Form->input('Transaction.amount_to_pay',array('type'=>'hidden','value'=>$data['Transaction']['dues'],'class'=>'amount_to_pay'));
				    echo $this->Form->input('Transaction.amount_paid',array('div'=>false,'label'=>false,'placeholder'=>'Amount Paid','id'=>'amount_paid','class'=>'amount_paid','value'=>''));
				    echo '<input type="button" id="paybtn" value="PAY" class="btn"/>';
				    echo $this->form->end();
				    echo '</td></tr>';
				}
			    ?>
				
			    <?php $i++;}
				if($paymentData['Payment']['status'] == 2){
				    echo '<tr><td colspan="7">Transaction Complete</td>';
				}
			    } else { ?>
                             <tr>
                                <td colspan="6">Amount Paid</td>
                                <td>
				<?php
				    echo $this->form->create('Transaction',array('url'=>array('url'=>array('controller'=>'Customers','action'=>'transaction_details',$paymentData['Payment']['id']))));
				    echo $this->Form->input('Transaction.payment_id',array('type'=>'hidden','value'=>$paymentData['Payment']['id'],'class'=>'payment_id'));
				    echo $this->Form->input('Transaction.amount_to_pay',array('type'=>'hidden','value'=>$paymentData['Payment']['total_amount'],'class'=>'amount_to_pay'));
				    echo $this->Form->input('Transaction.amount_paid',array('div'=>false,'label'=>false,'placeholder'=>'Amount Paid','id'=>'amount_paid','class'=>'amount_paid'));
				    echo '<input type="button" id="paybtn" value="PAY" class="btn"/>';
				    echo $this->form->end();
				?>
				</td>
                            </tr>
			<?php } ?>
                        </tbody>
                    </table>
                        <?php } ?>
                </div><!-- /table wrap end -->
            </div>
        </div><!-- /content end -->
<script>	
    $(document).ready(function(){
	    
	    $('body').on('change','.discountType',function(){
		var thisVal = $(this).val();
		if (thisVal == 1) {
		    $("#discountComment").css('display','none');
		    $("#discountAmount").css('display','block');
		} else if (thisVal == 2) {
		    $("#discountComment").css('display','block');
		    $("#discountAmount").css('display','none');
		}
	    });
	    
	    $('body').on('click','#paybtn',function(){
		var paidAmount = $(".amount_paid").val();
		var amountToPay = $(".amount_to_paid").val();
		var paymentId = $(".payment_id").val();
		if ((paidAmount != '')) {
		     $.ajax({
			type: 'POST',
                        url:'<?php echo configure::read('BASE_URL')?>customers/calculate_emi',
                        data : $('form').serialize(),
                        success:function(data){
                            if (data) {
                               divRefresh();
                            }
                        }
                    });
		}
	    });
	    
	    $('body').on('click','#discountBtn',function(){
		var discount = $(".discount").val();
		var paymentId = $(".discount_payment_id").val();
		var amount = $(".amount").val();
		//alert(amount);
		if ((discount != '')) {
		     $.ajax({
			url:'<?php echo configure::read('BASE_URL')?>customers/calculate_discount',
                        data : {'discount':discount,'paymentId':paymentId,'amount':amount},
                        success:function(data){
                            if (data) {
                              divRefresh();
                            }
                        }
                    });
		}
	    });
	    
	    $('body').on('click','#commentBtn',function(){
		var comment = $(".comment").val();
		var paymentId = $(".discount_payment_id").val();
		if ((comment != '')) {
		    
		     $.ajax({
			type:'POST',
			url:'<?php echo configure::read('BASE_URL')?>customers/add_discount_comment',
                        data : {'comment':comment,'paymentId':paymentId},
                        success:function(data){
                            if (data) {
                              divRefresh();
                            }
                        }
                    });
		}
	    });
	});
    
    function divRefresh() {
        $(".refresh-after-ajax").load(window.location + " .refresh-after-ajax");
    }
</script>