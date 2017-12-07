<?php echo $this->Html->script('webcam.js');?>
<div id="results" style="display:none;"></div>
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="../webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->
	<form>
		<input type=button value="Take Snapshot" onClick="take_snapshot()">
	</form>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
<?php echo $this->Form->create('Customer',array('enctype'=>'multipart/form-data')); ?>
<center>
    <fieldset>
        <legend>Add Customer</legend>
        <table>
            <tr>
                <td>Customer Name</td>
                <td><?php echo $this->Form->input('Customer.name',array('label'=>false)); ?></td>
            </tr>
            <tr>
                <td>Refernce Name</td>
                <td><?php echo $this->Form->input('Customer.reference',array('label'=>false)); ?></td>
            </tr>
             <tr>
                <td>Address</td>
                <td><?php echo $this->Form->input('Customer.address',array('label'=>false)); ?></td>
            </tr>
             <tr>
                <td>Phone</td>
                <td><?php echo $this->Form->input('Customer.phone',array('label'=>false)); ?></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><?php echo $this->Form->file('Customer.image',array('label'=>false)); ?></td>
            </tr>
            
        </table>
        <br/>
        <?php echo $this->Form->input('Submit',array('type'=>'submit','label'=>false,'class'=>'myButton'));?><br/>
        <?php echo $this->Form->end();?>
    </fieldset>
    
    
    
</center>