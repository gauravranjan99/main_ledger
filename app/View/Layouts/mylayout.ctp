<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    

    <?php	echo $this->Html->meta('icon');
		echo $this->Html->script('jquery-1.11.1');
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('say-cheese');
		echo $this->Html->script('parsley');
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('index-style');
		//echo $this->Html->css('bootstrap');
		echo $this->Html->css('parsley-test');
		echo $this->Html->css('custom-test');
		echo $this->Html->css('jquery-ui-test');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
    ?>
</head>


<?php

 if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();

?>


<body>
	<!-- wrapper start here -->
	<div class="wrapper">
    	<!-- header start here -->
    	<header>
        	<div class="wrap clearfix">
                <h1 class="logo logo-inner">&nbsp;</h1>

            </div>
            <nav class="clearfix">
            	<div class="wrap">
                	<ul style="margin-bottom:0px;">
                    	<li><?php echo  $this->Html->link('Customers',array('action'=>'customer_listing'),array('escape'=>false), false); ?></li>
                        <li><a href="javascript:void();">Sales</a></li>
                        <li><a href="javascript:void();">Purchase</a></li>
                        <li><a href="javascript:void();">Invoice</a></li>
                        <li><?php echo  $this->Html->link('Category',array('controller'=>'customers','action'=>'category_listing'),array('escape'=>false), false); ?></li>
												<li style="float:right;"><?php echo $this->Html->link('Test',array('controller'=>'users','action'=>'test'),array('escape'=>false));?></li>
												<li style="float:right;"><?php echo $this->Html->link('Logout',array('controller'=>'users','action'=>'logout'),array('escape'=>false));?></li>
												<li style="float:right;"><?php echo $this->Html->link('Profile',array('controller'=>'users','action'=>'change_password'),array('escape'=>false));?></li>
                    </ul>
                </div>
            </nav>
        </header><!-- /header end -->

        <!-- content start here -->
        <div class="content">
        	<?php echo $this->Session->flash(); ?>
          <?php echo $this->fetch('content'); ?>
    </div><!-- /wrapper end -->
    <?php //echo $this->element('sql_dump'); ?>
    <script>
	    $(document).ready(function(){
		$(".success-msg").fadeOut(10000);
	    })
    </script>
     <?php echo $this->Element('Common/ajax-loader');?>
</body>
</html>
