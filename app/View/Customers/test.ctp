
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">

        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light portlet-fit bordered">

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                      <?=$this->Html->link("<i class='fa fa-plus'></i> Add New Customer",['controller'=>'Customers','action'=>'add_customer'],array('class'=>'btn green','escape'=>false))?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th> ID </td>
                                    <th> Created Date</th>
                                    <th> Image </th>
                                    <th> Customer Name </th>
                                    <th> Reference </th>
                                    <th> Address </th>
                                    <th> Mobile </th>
                                    <th> Status </th>
                                    <th> Delete </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($abc as $a){?>
                                <tr>
                                    <td class="text-center"> <?php echo $a['Customer']['id'];?>
                                    <td class="text-center"> <?php echo !empty($a['Customer']['created'])?date('d M Y',strtotime($a['Customer']['created'])):'N/A'; ?> </td>
                                    <td class="text-center"> <?php echo !empty($a['Customer']['image'])?$this->Html->image(BASE_URL.'userimg/'.$a['Customer']['image'],array('height'=>'50px','width'=>'50px')):'N/A'; ?> </td>
                                    <td class="text-center"> <?php echo !empty($a['Customer']['name'])?$a['Customer']['name']:'N/A'; ?> </td>
                                    <td class="center"> <?php echo !empty($a['Customer']['reference'])?$a['Customer']['reference']:'N/A'; ?> </td>
                                    <td class="text-center"> <?php echo !empty($a['Customer']['address'])?$a['Customer']['address']:'N/A'; ?> </td>
                                    <td class="text-center"><?php echo !empty($a['Customer']['phone'])?$a['Customer']['phone']:'N/A'; ?></td>
                                    <td class="text-center" style="cursor:pointer;">
                                      <?php
                                        if ($a['Customer']['status']==1) {
                                            $status='Active';
                                            $statusClass='label-success';
                                        } else{
                                            $status='Inactive';
                                            $statusClass='label-danger';
                                        }
                                        ?>
                                      <span id="userStatus"  class="label label-sm <?=$statusClass?>"><?=$status;?> </span>
                        		  </td>


                              <td class="text-center" style="cursor:pointer;">
                                  <?=$this->Html->link('<i class="fa fa-times" aria-hidden="true"></i>', ['controller'=>'customers','action'=>'delete_customer',$a['Customer']['id']], ['class'=>'custom-link-color','escape' => false], __('Are you sure you want to delete this Customer ?', false)); ?>
                              </td>

                              <td>

                                      <?php //echo $this->Html->link($this->Html->image('view.png',array('height'=>'30px','width'=>'30px','alt'=>"View Customer", 'title'=>"View Customer") ),array('controller'=>'customers','action'=>'view_customer',$a['Customer']['id']),array('escape'=>false));?>&nbsp;

        <?php echo $this->Html->link($this->Html->image('order.gif',array(/*'height'=>'30px',*/'width'=>'65px','alt'=>"ledger", 'title'=>"Add Ledger") ),array('controller'=>'customers','action'=>'add_ledger',$a['Customer']['id']),array('escape'=>false));?>



                              </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
        <!-- END PAGE BASE CONTENT -->
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<?php //echo $this->Html->link('Add New Customer',['controller'=>'Customers','action'=>'add_customer'],array('class'=>'btn green','id'=>'sample_editable_1_new')) ?>
<script type="text/javascript" src="<?=$this->webroot;?>assets/global/plugins/jquery.min.js"></script>
<script type="text/javascript" src="<?=$this->webroot;?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?=$this->webroot;?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?=$this->webroot;?>assets/admin/pages/scripts/table-managed.js"></script>
<script>
    TableManaged.init();

</script>
