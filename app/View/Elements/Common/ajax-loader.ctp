<div class="modal"></div>    
<script>
     jQuery(document).ready(function(){
		jQuery(document).ajaxStart(function() {
			
			jQuery(".modal").fadeIn();
		});
		jQuery(document).ajaxStop(function(){
			jQuery(".modal").fadeOut();
		});	
     });
</script>
<style>
	div.modal {
    display:    none;
    position:   fixed;
    z-index:    1000;
    top:        0;
    left:       0;
    height:     100%;
    width:      100%;
    background: rgba( 255, 255, 255, .8 ) 
                url('<?php echo Configure::read('BASE_URL')?>img/default-images/ajax-loader.gif') 
                50% 50% 
                no-repeat;
}
</style>
