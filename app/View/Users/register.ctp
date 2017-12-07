<header class="panel-heading text-center">
                            <strong>Sign up</strong>
                        </header>
                        <?php echo $this->Form->create('User',array('id'=>'loginform','class'=> "panel-body wrapper-lg"));?>
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <?php echo $this->Form->input("User.name",array("required"=>false,"class"=>"form-control input-lg validate[required]","id"=>"inputPassword","div"=>false,'placeholder'=>'Enter Your Full Name','label'=>false));?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Mobile No</label>
                                <?php echo $this->Form->input("User.username",array("required"=>false,"class"=>"form-control input-lg validate[required]","id"=>"inputPassword","div"=>false,'placeholder'=>'9897947152','label'=>false));?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <?php echo $this->Form->input("User.password",array("required"=>false,"class"=>"form-control input-lg validate[required]","id"=>"inputPassword","div"=>false,'placeholder'=>'Password','label'=>false));?>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password</label>
                                <?php echo $this->Form->input("User.re-password",array("type"=>"password","required"=>false,"class"=>"form-control input-lg validate[required]","id"=>"inputPassword","div"=>false,'placeholder'=>'Password','label'=>false));?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <?php echo $this->Form->input('rememberMe',array("type"=>'checkbox',"id" => "abc",'div' => false,'label' => false,$flag));?>
                                     Agree the <a href="#">terms and policy</a>
                                </label>
                            </div>
                             <?php echo $this->Form->submit('Sign up',array("class"=>"btn btn-primary"));?>
                            <div class="line line-dashed"></div>
                            <p class="text-muted text-center">
                                <small>Already have an account?</small>
                            </p>
                            <?php echo $this->Html->link('Sign in',array('controller'=>'users','action'=>'login'),array('escape'=>false,"class"=>"btn btn-default btn-block"));?>
<?php echo $this->Form->end()?>