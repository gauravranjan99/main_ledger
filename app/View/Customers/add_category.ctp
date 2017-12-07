
        <!-- content start here -->
        <div class="content">
        	<div class="wrap">
                    <h2 style="padding-bottom: 10px; margin-left: 33px;">Add Category</h2>
            	<!-- profile wrap start here -->
                <div class="profile-wrap" style="margin-left:35px;">
                	<form  id="my-form" method="post" data-validate="parsley">
                    	
                    	<div class="input-field">
                        	<label>Category Name <sup>*</sup></label>
                                <?php echo $this->Form->input('Category.type',array('class'=>'txt-bx','label'=>false,'data-required'=>true)); ?>
                            
                        </div>
                       
                        
                        <div class="input-field">
                            <button id="submitBtn" onclick="$('#my-form').parsley('validate')"; style="display: block;margin: 0 auto;max-width: 150px;padding: 10px 15px;width: 100%;" class="btn">Submit</button>
                        </div>
			
                    </form>
                        
     
    </div>

                </div><!-- /profile wrap end -->
            </div>
        </div><!-- /content end -->
    </div><!-- /wrapper end -->
