
<script>
$(function() {
    $("#custname").autocomplete({
        source: "../customers/autoname",
        minLength: 2,
        delay: 2
    });
});
</script>

<div class="wrap">
            	<!-- search panel start here -->
            	<div class="search-panel clearfix">
                    <?php echo $this->Form->create('Customer',array('type'=>'get','action'=>'customer_listing'));?>

                    	<div class="input-field">
			    <?php $id = !empty($id)?$id:''?>
                            <?php echo $this->Form->input('Customer.id',array('placeholder'=>'Enter Customer id','label'=>false,'div'=>false,'type'=>'text','value'=>$id));?>
                        </div>
                        <div class="input-field">
			    <?php $name = !empty($name)?$name:''?>
                            <?php echo $this->Form->input('Customer.name',array('placeholder'=>'Enter Customer Name','id'=>'custname','option'=> $cities,'autocomplete' => 'on','label'=>false,'div'=>false,'type'=>'text','value'=>$name));?>
                        </div>
                        <div class="input-field">
			    <?php $reference = !empty($reference)?$reference:''?>
                            <?php echo $this->Form->input('Customer.reference',array('placeholder'=>'Enter Reference Name','label'=>false,'div'=>false,'type'=>'text','value'=>$reference));?>
                        </div>
                        <div class="input-field">
			    <?php $phone = !empty($phone)?$phone:''?>
                            <?php echo $this->Form->input('Customer.phone',array('placeholder'=>'Enter Customer Phone Number','label'=>false,'div'=>false,'type'=>'text','value'=>$phone));?>
                        </div>
                        <div class="input-field input-field-sm">
                            <?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'btn'));?>
                        </div>

                    <?php echo $this->Form->end();?>
                </div><!-- /search panel end -->
                <?php echo  $this->Html->link('Add Customer',array('controller'=>'Customers','action'=>'add_customer'),array('class'=>'btn-add','escape'=>false), false); ?>

                <div class="clearfix"></div>
                <!-- table wrap start here -->
                <div class="tbl-wrap clearfix" style="overflow:hidden;">



                	<table>
                    	<thead>
                        	<tr>
				                      <th>Created</th>
                            	<th>Profile Picture</th>
                              <th>Name</th>
                              <th>Reference</th>
                              <th>Address</th>
                              <th>Mobile</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>

                        </thead>
			 <tbody>
			 <?php
                        if(!empty($abc)) { ?>
			 <?php foreach($abc as $a){ ?>

                        	<tr>
				    <td><?php echo !empty($a['Customer']['created'])?date('d M Y',strtotime($a['Customer']['created'])):'N/A'; ?></td>
				    <td><?php echo !empty($a['Customer']['image'])?$this->Html->image(BASE_URL.'userimg/'.$a['Customer']['image'],array('height'=>'90px','width'=>'110px')):'N/A'; ?></td>
				    <td><?php echo !empty($a['Customer']['name'])?$a['Customer']['name']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Customer']['reference'])?$a['Customer']['reference']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Customer']['address'])?$a['Customer']['address']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Customer']['phone'])?$a['Customer']['phone']:'N/A'; ?></td>
				    <td><span class="active"><?php if($a['Customer']['status']==1){
		 echo  $this->Html->link($this->Html->image('tick.jpg', array('alt'=>"Activate", 'title'=>"Activate",'height'=>'30px','width'=>'30px') ),array('controller'=>'customers','action'=>'change_status',$a['Customer']['id'],0),array('escape'=>false), false);
	    }else{
		 echo  $this->Html->link($this->Html->image('cross1.jpg', array('alt'=>"Deactivate", 'title'=>"Deactivate",'height'=>'30px','width'=>'30px') ),array('controller'=>'customers','action'=>'change_status',$a['Customer']['id'],1),array('escape'=>false), false);
	    }?></span></td>
                                <td>
                                	<div class="tbl-action-icon">
                                        <?php echo $this->Html->link($this->Html->image('view.png',array('height'=>'30px','width'=>'30px','alt'=>"View Customer", 'title'=>"View Customer") ),array('controller'=>'customers','action'=>'view_customer',$a['Customer']['id']),array('escape'=>false));?>&nbsp;
                                    	<?php echo $this->Html->link($this->Html->image('edit.png',array('height'=>'30px','width'=>'30px','alt'=>"Edit Customer", 'title'=>"Edit Customer") ),array('controller'=>'customers','action'=>'edit_customer',$a['Customer']['id']),array('escape'=>false));?>&nbsp;
					<?php echo $this->Html->link($this->Html->image('order.gif',array(/*'height'=>'30px',*/'width'=>'65px','alt'=>"ledger", 'title'=>"Add Ledger") ),array('controller'=>'customers','action'=>'add_ledger',$a['Customer']['id']),array('escape'=>false));?>
					&nbsp;
                                        <?php echo  $this->Html->link($this->Html->image('delete.png',array('height'=>'30px','width'=>'30px','alt'=>"Delete Customer", 'title'=>"Delete Customer") ),array('controller'=>'customers','action'=>'delete_customer',$a['Customer']['id']),array('escape'=>false),'Are you sure you want to delete this Customer?', false);?>
                                    </div>
                                </td>
                            </tr>

                        <?php } } else { ?>
			    <tr><td colspan="7">NO CUSTOMER FOUND</td></tr>
			<?php } ?>
			</tbody>
                    </table>

                </div><!-- /table wrap end -->
            </div>
        </div><!-- /content end -->
