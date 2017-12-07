
<div class="left">

<?php echo $this->Session->flash(); ?>
<div class="widgetbox">
      <h3><span>Change Password</span></h3>
    <div class="content">
  <div>Note: All fields marked with (<em style="color:red;">*</em>) are required. </div><br/>
  <?php echo $this->Form->create(array('id'=>'ValidateForm')); ?>
  <div class="form_default">
      <table border=0 cellpadding=0 cellspacing="0" class="tableformfield">
    <tr>
        <td width="180px">Password <em>*</em> :</td>
        <td>
      <?php echo $this->Form->input('Admin.password',array('maxlength' => '20','autocomplete'=>'off','size'=>'30','type'=>'password','label'=>false,'class' =>'','value'=>'')); ?>
        </td>
                      </tr>
    <tr>
        <td width="180px">New Password <em>*</em> :</td>
        <td>
      <?php echo $this->Form->input('Admin.newpassword',array('maxlength' => '20','size'=>'30','type'=>'password','label'=>false,'class' =>'','value'=>'')); ?>
        </td>
                      </tr>
    <tr>
        <td width="180px">Confirm Password <em>*</em> :</td>
        <td>
      <?php echo $this->Form->password('Admin.confirmpassword',array('maxlength' => '20','size'=>'30','type'=>'password','div'=>false,'label'=>false,'class' =>'','value'=>'')); ?>
        </td>
                      </tr>
      </table>
      <table cellpadding="0" cellspacing="0" width="500px" style="margin-left:180px">
    <tr>
        <td>
                              <?php echo $this->Form->button('Save', array('id'=>'save','name'=>'save','onclick' => "return ajax_form('change_password','/admin/admins/changepass','receiver')",'type'=>'submit','div'=>false,'label'=>false,'tabindex'=>'1','escape'=>false));?>
      <?php echo $this->Form->button('cancel', array('id'=>'cancel',"name"=>"cancel",'type'=>'button','div'=>false,'label'=>false,'tabindex'=>'1','escape'=>false,'onclick'=>"window.location.href = '/admin/admins/index'",'style'=>'margin-left:0px !important'));?>
        </td>
    </tr>
      </table>
  </div><!-- form_default -->
  <?php echo $this->Form->end(); ?>
    </div><!-- content -->
</div><!-- widgetbox -->
</div><!-- left -->
