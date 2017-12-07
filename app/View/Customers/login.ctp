<script type="text/javascript">
$(document).ready(function(){
$('#email')
  .on('focus', function(){
      var $this = $(this);
      if($this.val() == 'Write your email here'){
          $this.val('');
      }
  })
  .on('blur', function(){
      var $this = $(this);
      if($this.val() == ''){
          $this.val('Write your email here');
      }
  });
  
  $("#pass")
  .on('focus', function(){
      var $this = $(this);
      if($this.val() == 'password'){
          $this.val('');
      }
  })
  .on('blur', function(){
      var $this = $(this);
      if($this.val() == ''){
          $this.val('password');
      }
  });
  });


</script>
<?php
echo $this->Form->create('User');?>
<ul>
	<li>
		<?php echo $this->Form->input('User.username',array('label'=>false,'autocomplete'=>'off','placeholder'=>'Username'));?><a class=" icon user"></a>
		
	</li>
	<li>
		<?php echo $this->Form->input('User.password',array('type'=>'password','label'=>false,'autocomplete'=>'off','placeholder'=>'Password'));?><a class=" icon lock"></a>
		</li>
	</ul>
<?php echo $this->Form->input('Login',array('type'=>'submit','label'=>false,'class'=>'myButton'));?>
<?php echo $this->Form->end();?>





