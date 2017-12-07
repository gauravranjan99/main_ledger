
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- ADMIN SIDEBAR NAV MENU -->
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                  <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                      <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">My Experiential</h3>
                        </li>
                        <li class="nav-item  ">
                            <?php echo $this->Html->link(
                               '<i class="icon-diamond"></i><span class="title">Dashboard</span>',
                              ['controller'=>'Customers','action'=>'test'],
                              ['class' => 'nav-link nav-toggle','escape'=>false]
                            );
                            ?>
                             <span class="selected"></span>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">Event</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                      <?php echo $this->Html->link(
                                       'Activation',
                                      '/organisers/activation',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                              <?php echo $this->Html->link(
                                       'Gallery',
                                      '/organisers/gallery',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                              	<?php echo $this->Html->link(
                                       'Exclusive Offer / Coupons',
                                       '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                               <?php echo $this->Html->link(
                                       'Downloads',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                          	<?php echo $this->Html->link(
                                       'Competition winnings',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                            </ul>
                          </li>
                         <li class="nav-item  ">
                          <?php echo $this->Html->link(
						            '<i class="icon-settings"></i><span class="title">Experience Timeline</span>',
						             ['controller'=>'organisers','action'=>'experience_timeline'],
                           ['class' => 'nav-link nav-toggle','escape'=>false]
                          );
                          ?>
                        </li>
                        <li class="nav-item  ">
                      	<?php echo $this->Html->link(
                               '<i class="icon-bulb"></i><span class="title">My Tags</span>',
                              ['controller'=>'organisers','action'=>'my_tags'],
                              ['class' => 'nav-link nav-toggle','escape'=>false]
                            );
                            ?>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Organiser</h3>
                        </li>
                        <li class="nav-item  active open">
                       	<?php echo $this->Html->link(
                               '<i class="icon-layers"></i><span class="title">Dashboard</span>',

                              ['controller'=>'organisers','action'=>'organisers_dashboard'],
                              ['class' => 'nav-link nav-toggle','escape'=>false]
                            );
                            ?>
                          </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-feed"></i>
                                <span class="title">Company Info</span>
                                <span class="arrow"></span>
                            </a>
                          <ul class="sub-menu">
                           <li class="nav-item  ">
                                    <?php echo $this->Html->link(
                                       'Profile',
                                      '/organisers/organisers_profile',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                              <?php echo $this->Html->link(
                                       'Branding',
                                      '/organisers/organisers_branding',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                             <?php echo $this->Html->link(
                                       'User management',
                                      '/organisers/organisers_user_management',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Events</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                          	<?php echo $this->Html->link(
                                       'Create Event',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Manage Event</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                            <?php echo $this->Html->link(
                                       'Modules',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                            <?php echo $this->Html->link(
                                       'Guests',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                          	<?php echo $this->Html->link(
                                       'Activations',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                                <li class="nav-item  ">
                          	<?php echo $this->Html->link(
                                       'Analytics',
                                      '/organisers/test',
                                      ['class' => 'nav-link']
                                    );
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                                <?php echo $this->Html->link(
                                   'Account Settings',
                                  '/organisers/account_settings',
                                  ['class' => 'nav-link']
                                );
                                ?>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class=" icon-wrench"></i>
                                <span class="title">Reports</span>
                            </a>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
