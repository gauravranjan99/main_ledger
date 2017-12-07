<div class="wrap">
            	<!-- search panel start here -->

                <?php echo  $this->Html->link('Add Category',array('controller'=>'Customers','action'=>'add_category'),array('class'=>'btn-add','escape'=>false), false); ?>

                <div class="clearfix"></div>
                <!-- table wrap start here -->
                <div class="tbl-wrap clearfix">
                	<table>
                    	<thead>
                        	<tr>
                                <th style="text-align:center;color:aqua;">Name</th>
                                <th style="text-align:center;color:aqua;">Status</th>
                                <th style="text-align:center;color:aqua;">Action</th>
                            </tr>

                        </thead>
			 <tbody>
			 <?php
                        if(!empty($abc)) { ?>
			 <?php foreach($abc as $a){ ?>

                        	<tr>
                                <td><?php echo !empty($a['Category']['type'])?$a['Category']['type']:'N/A'; ?></td>

                                <td><span class="active"><?php if($a['Category']['status']==1){
		 echo  $this->Html->link($this->Html->image('tick.jpg', array('alt'=>"Activate", 'title'=>"Activate",'height'=>'30px','width'=>'30px') ),array('controller'=>'customers','action'=>'change_category_status',$a['Category']['id'],0),array('escape'=>false), false);
	    }else{
		 echo  $this->Html->link($this->Html->image('cross1.jpg', array('alt'=>"Deactivate", 'title'=>"Deactivate",'height'=>'30px','width'=>'30px') ),array('controller'=>'customers','action'=>'change_category_status',$a['Category']['id'],1),array('escape'=>false), false);
	    }?></span></td>
                                <td>
                                	<div class="tbl-action-icon">
                                    	<?php echo $this->Html->link($this->Html->image('edit.png',array('height'=>'30px','width'=>'30px','alt'=>"Edit Category", 'title'=>"Edit Category") ),array('controller'=>'customers','action'=>'',$a['Category']['id']),array('escape'=>false));?>&nbsp;
                                        <?php echo  $this->Html->link($this->Html->image('delete.png',array('height'=>'30px','width'=>'30px','alt'=>"Delete Category", 'title'=>"Delete Category") ),array('controller'=>'customers','action'=>'delete_category',$a['Category']['id']),array('escape'=>false),'Are you sure you want to delete this Category?', false);?>
                                    </div>
                                </td>
                            </tr>

                        <?php } } else { ?>
			    <tr><td colspan="7">NO CATEGORY FOUND</td></tr>
			<?php } ?>
			</tbody>
                    </table>

                </div><!-- /table wrap end -->
            </div>
        </div><!-- /content end -->
