<?php //echo $this->Html->css('index-style');?>
        <!-- content start here -->
        <div class="content">
	    <?php
		if(!empty($purchase_date_order) && ($redirectParam)) {
		    echo $this->Form->create('Customer',array('url'=>array('controller'=>'Customers','action'=>'add_ledger',$customerId,$purchase_date_order,$redirectParam)));
		} else {
		    echo $this->Form->create('Customer',array('url'=>array('controller'=>'Customers','action'=>'add_ledger',$customerId)));
		}

		?>
        	<div class="wrap">
	    <?php if(empty($orderData)) {?>
            	<div class="profile-wrap-outer">
                    <h2>Add Ledger</h2>
                    <!-- profile wrap start here -->
                    <div class="profile-wrap clearfix clone-div">
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Item Name</dt>
                                <dd><?php echo $this->Form->input('Order.item',array('div'=>false,'label'=>false,'placeholder'=>'Item Name','id'=>'item_name[]','name'=>'data[Order][item][]','class'=>'itemName'));?></dd>

                                <dt>Type</dt>
                                <dd><?php echo $this->Form->input('Order.type',array('type'=>'select','label'=>false,'options'=>$type,'name'=>'data[Order][type][]','class'=>'type'));?></dd>

                                <dt>Rate/gm</dt>
                                <dd><?php echo $this->Form->input('Order.rate',array('div'=>false,'label'=>false,'placeholder'=>'Rate','id'=>'order_rate[]','name'=>'data[Order][rate][]','class'=>'rate'));?></dd>
                            </dl>
                        </div>
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Making Charge</dt>
                                <dd><?php echo $this->Form->input('Order.making_charge',array('div'=>false,'label'=>false,'placeholder'=>'Making Charge','id'=>'making_charge[]','name'=>'data[Order][making_charge][]','class'=>'mkCharge'));?></dd>

                                <dt>Weight</dt>
                                <dd><?php echo $this->Form->input('Order.weight',array('div'=>false,'label'=>false,'placeholder'=>'weight','id'=>'weight[]','name'=>'data[Order][weight][]','class'=>'weight','autocomplete'=>'off'));?></dd>
				<dt>Amount</dt>
                                <dd><?php echo $this->Form->input('Order.amount',array('div'=>false,'label'=>false,'placeholder'=>'Amount','id'=>'amount[]','name'=>'data[Order][amount][]','class'=>'amount'));?></dd>
                            </dl>
                        </div>
			<div class="pw-pi-inner">
                            <h4 class="pull-right">
				<button class="btn remove" style="display: none;">REMOVE</button>
			    </h4>
                        </div>
                    </div><!-- /profile wrap end -->

		    <div class="input-field">
			<input type="button" id="btnAdd" value="ADD ANOTHER ITEM" class="btn add-more"/>
		    </div>
		<?php } else{
		    //pr($this->request->data)
		    echo "<h2>Add Ledger</h2><br>";
		    $k = 1;
		    foreach($orderData as $this->request->data) {
			//echo $this->Form->input('Payment.id',array('type'=>"hidden",'value'=>$customerId));
			?>
			<div class="profile-wrap-outer">

                    <!-- profile wrap start here -->
                    <div class="profile-wrap clearfix clone-div">
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Item Name</dt>
                                <dd><?php echo $this->Form->input('Order.item',array('div'=>false,'label'=>false,'placeholder'=>'Item Name','id'=>'item_name[]','name'=>'data[Order][item][]','class'=>'itemName'));?></dd>

                                <dt>Type</dt>
                                <dd><?php echo $this->Form->input('Order.type',array('type'=>'select','label'=>false,'options'=>$type,'name'=>'data[Order][type][]','class'=>'type'));?></dd>

                                <dt>Rate</dt>
                                <dd><?php echo $this->Form->input('Order.rate',array('div'=>false,'label'=>false,'placeholder'=>'Rate','id'=>'order_rate[]','name'=>'data[Order][rate][]','class'=>'rate'));?></dd>
                            </dl>
                        </div>
                        <div class="pw-pi-inner">
                            <dl>
                                <dt>Making Charge</dt>
                                <dd><?php echo $this->Form->input('Order.making_charge',array('div'=>false,'label'=>false,'placeholder'=>'Making Charge','id'=>'making_charge[]','name'=>'data[Order][making_charge][]','class'=>'mkCharge'));?></dd>

                                <dt>Weight</dt>
                                <dd><?php echo $this->Form->input('Order.weight',array('div'=>false,'label'=>false,'placeholder'=>'weight','id'=>'weight[]','name'=>'data[Order][weight][]','class'=>'weight','autocomplete'=>'off'));?></dd>
				<dt>Amount</dt>
                                <dd><?php echo $this->Form->input('Order.amount',array('div'=>false,'label'=>false,'placeholder'=>'Amount','id'=>'amount[]','name'=>'data[Order][amount][]','class'=>'amount'));?></dd>
                            </dl>
                        </div>
			<div class="pw-pi-inner">
                            <?php if($k != 1) {?>
			    <h4 class="pull-right">
				<button class="btn remove" style="display: block;">REMOVE</button>
			    </h4>
			    <?php } ?>
                        </div>
                    </div><!-- /profile wrap end -->


		    <?php   $k++;}?>

		    <div class="input-field">
			<input type="button" id="btnAdd" value="ADD ANOTHER ITEM" class="btn add-more"/>
		    </div>

		<?php } ?>
                </div>
		<div class="input-field">
                            <button id="submitBtn"  style="display: block;margin: 0 auto;max-width: 150px;padding: 10px 15px;width: 100%;" class="btn">Submit</button>

                        </div>

            </div>
        </div><!-- /content end -->
<script>
        $(document).ready(function(){
	    $('.add-more').click(function (e) {
		e.preventDefault();
		var cloneDiv = $('.clone-div:last').clone().insertAfter(".clone-div:last");
		cloneDiv.find('input').val("");
		cloneDiv.find('div.pw-pi-inner h4 button.remove').css("display","block");
	    });

	    $('body').on('click', '.remove', function() {
		$(this).parent().closest("div.clone-div").remove();
	    });

	    $('body').on('keyup','.weight',function(){
		var ref = $(this);
		var rate = ref.parent().parent().parent().parent().find("input.rate").val();
		var mkCharge = ref.parent().parent().parent().parent().find("input.mkCharge").val();
		//var weight = ref.parent().parent().parent().parent().find("input.weight").val();
		var weight = ref.val();
		var refAmount = ref.parent().parent().parent().parent().find("input.amount");
		if ((weight != '' || weight != null)) {
		     $.ajax({
                        url:'<?php echo configure::read('BASE_URL')?>customers/calculate_item_amount',
                        data:{'rate':rate,'mkCharge':mkCharge,'weight':weight},
                        success:function(data){
                            if (data) {
                                refAmount.val(data);
                            }
                        }
                    });
		}
	    });
	});
</script>
