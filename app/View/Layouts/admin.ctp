<html>
    <head>
	<!--[if lte IE 7]> <html class="ie7"> <![endif]-->
	<!--[if IE 8]> <html class="ie8"> <![endif]-->
	<!--[if IE 9]> <html class="ie9"> <![endif]--> 
        <?php echo $this->Html->charset('utf-8'); ?>
        <?php echo $this->Html->meta('icon', '/icon.ico'); ?>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Testing</title>
        <!--<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
        
        <?php
	    echo $this->Html->css('admin'); 
	    echo $this->Html->css('jquery-ui'); 
	    echo $this->Html->script('jquery-1.9.1.js');
	    echo $this->Html->script('jquery-1.7.2.min');
	    echo $this->Html->script('general');
	    echo $this->Html->script('jquery-1.8.2.min.js');
	    echo $this->Html->script('jquery-ui.js');
	    echo $this->Html->script('admin_validation.js'); 
	    echo $this->Html->script('validate.js');
	    echo $this->Html->script('tiny_mce/tiny_mce.js'); 
	    echo $this->Html->script('tiny_mce/jquery.tinymce.js');
	 ?>
        
        <link href="chrome://webdeveloper/content/stylesheets/outline_frames.css" id="webdeveloper-outline-frames" rel="stylesheet" type="text/css">
    </head>
    
<body class="bodygrey">
<!--Overlay-->
<div id="popupWindow"></div>

    
    <div id="cboxOverlay" style="display: none;"></div>
    <div id="colorbox" class="" style="padding-bottom: 20px; padding-right: 0px; display: none;">
	<div id="cboxWrapper"><div>
	<div id="cboxTopLeft" style="float: left;"></div>
	<div id="cboxTopCenter" style="float: left;"></div>
	<div id="cboxTopRight" style="float: left;"></div>
    </div>
	
    <div style="clear: left;">
	<div id="cboxMiddleLeft" style="float: left;"></div>
	<div id="cboxContent" style="float: left;">
	    <div id="cboxLoadedContent" style="width: 0pt; height: 0pt; overflow: hidden; float: left;"></div>
	    <div id="cboxLoadingOverlay" style="float: left;"></div>
	    <div id="cboxLoadingGraphic" style="float: left;"></div>
	    <div id="cboxTitle" style="float: left;"></div>
	    <div id="cboxCurrent" style="float: left;"></div>
	    <div id="cboxNext" style="float: left;"></div>
	    <div id="cboxPrevious" style="float: left;"></div>
	    <div id="cboxSlideshow" style="float: left;"></div>
	    <div id="cboxClose" style="float: left;"></div>
	</div>
	<div id="cboxMiddleRight" style="float: left;"></div>
    </div>
    
    <div style="clear: left;">
	<div id="cboxBottomLeft" style="float: left;"></div>
	<div id="cboxBottomCenter" style="float: left;"></div>
	<div id="cboxBottomRight" style="float: left;"></div>
    </div>

    </div>
	<div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div>
    </div>
    
<div class="headerspace"></div>
    <?php echo $this->element("header"); ?>
    <?php echo $this->element("sidebar"); ?>
    <!--maincontent-->
    <div class="maincontent">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
    <br clear="all"> 
    </div>
    <!--maincontent-->
 
<?php  echo $this->element("footer"); ?>
<!--Overlay-->
<section class="overlay"></section>
</body>

</html>

            
            
           