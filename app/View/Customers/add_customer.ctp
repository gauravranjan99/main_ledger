

        <!-- content start here -->
        <div class="content">
        	<div class="wrap">
            	<!-- profile wrap start here -->
                <div class="profile-wrap" style="margin-left:35px;height:520px;">
                	<form id="my-form" method="post" data-validate="parsley">
                    	<div class="pw-img-box clearfix">
                        	<input id="imgSrc" value = "" name="data[Customer][image]" type="hidden"/>
                            <div class="clearfix"></div>

                        </div>
                    	<div class="input-field">
                        	<label>Customer Name <sup>*</sup></label>
                                <?php echo $this->Form->input('Customer.name',array('class'=>'txt-bx','label'=>false,'data-required'=>true,'required'=>'required')); ?>

                        </div>
                        <div class="input-field">
                        	<label>Refernce Name</label>
                                <?php echo $this->Form->input('Customer.reference',array('class'=>'txt-bx','label'=>false)); ?>

                        </div>
                        <div class="input-field">
                        	<label>Address <sup>*</sup></label>
                                <?php echo $this->Form->input('Customer.address',array('class'=>'txt-bx','label'=>false,'data-required'=>true)); ?>

                        </div>
                        <div class="input-field">
                        	<label>Phone <sup>*</sup></label>
                                <?php echo $this->Form->input('Customer.phone',array('class'=>'txt-bx','label'=>false)); ?>

                        </div>
                        <div class="input-field">
                            <button id="submitBtn" onclick="$('#my-form').parsley('validate')"; style="display: block;margin: 0 auto;max-width: 150px;padding: 10px 15px;width: 100%;" class="btn">Submit</button>
                        </div>

                    </form>

                        <div class="row" style="margin-left: 499px; margin-top: -516px;">
        <div class="span12 say-cheese">
          <div id="say-cheese-container">
            <div id="action-buttons">
              <button class="btn btn-success" id="take-snapshot">snap!</button>
            </div>
          </div>
          <div id="say-cheese-snapshots" style="float: left;margin-left: 321px;margin-top: -243px;"></div>
        </div>
      </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script src="/webcam_snapshot/say-cheese.js"></script>
    <script>
     $(function() {
        var sayCheese = new SayCheese('#say-cheese-container', { audio: false });

        sayCheese.on('start', function() {
          $('#action-buttons').fadeIn('fast');

          $('#take-snapshot').on('click', function(evt) {
			var width = 320, height = 240;
		sayCheese.takeSnapshot(width, height);
          });
        });

        sayCheese.on('error', function(error) {
          var $alert = $('<div>');
          $alert.addClass('alert alert-error').css('margin-top', '20px');

          if (error === 'NOT_SUPPORTED') {
            $alert.html("<strong>:(</strong> your browser doesn't support video yet!");
          } else if (error === 'AUDIO_NOT_SUPPORTED') {
            $alert.html("<strong>:(</strong> your browser doesn't support audio yet!");
          } else {
            $alert.html("<strong>:(</strong> you have to click 'allow' to try me out!");
          }

          $('.say-cheese').prepend($alert);
        });

        sayCheese.on('snapshot', function(snapshot) {
          var img = document.createElement('img');

          $(img).on('load', function() {
			$('#say-cheese-snapshots img:last-child').remove();
			$('#say-cheese-snapshots').prepend(img);
          });
          img.src = snapshot.toDataURL('image/png');
		var imgSRC = $(img).attr('src');
		$("#imgSrc").val(imgSRC);
	});

        sayCheese.start();

	   $("#submitBtn").click(function() {
			$.ajax({
				type: 'POST',
				url: '<?php echo Configure::read('BASE_URL')?>Customers/add_customer',
				data : $('form').serialize(),
				success : function(responseStatus){
					if(responseStatus == 1) {
						$("form").find("input").val('');
						$("form").find("textarea").val('');
            window.location = '<?php echo Configure::read('BASE_URL')?>Customers/customer_listing/flashAdd';
					}
				}
			});

		})


    $('#CustomerPhone').on('focusout', function () {
      if (jQuery(this).val() !=='') {
        var phoneNumber = jQuery(this).val();
        var regex = /^[0-9]{10}$/;
        if(regex.test(phoneNumber)){
            return true;
        }else{
            $('#CustomerPhone').val('');
            alert('Phone number must have 10 digits');
        }
      }
      // $.ajax({
      //   'type':'post',
      //   'url': '<?php //echo Configure::read('BASE_URL')?>',
      // });
    });



      });
    </script>
                </div><!-- /profile wrap end -->
            </div>
        </div><!-- /content end -->
    </div><!-- /wrapper end -->
