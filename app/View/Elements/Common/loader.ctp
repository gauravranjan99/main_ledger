<div class="modal"></div>    
<script>
     $(document).ready(function(){
		$(document).ajaxStart(function() {
			
			$(".modal").fadeIn();
		});
		$(document).ajaxStop(function(){
			$(".modal").fadeOut();
		});	
     });
</script>
