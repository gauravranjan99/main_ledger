
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />-->
<?php
		echo $this->Html->meta('icon');
		echo $this->Html->script('jquery-1.11.1');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->css('login-test');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>


</head>
<body>
<div class="wrapper">
		<div class="landing-form-wrap">
				<!-- <h1 class="logo">&nbsp;</h1> -->


			<div id="content">


      <?php echo $this->fetch('content'); ?>

			</div>
			</div>
		</div>
			<div id="footer">
				<!-- <center>Copyright @ Satkar Jewellers</center> -->
			</div>



</body>
</html>
