<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?= $this->Html->meta('icon') ?>

            <?php
            		echo $this->Html->meta('icon');

            		echo $this->Html->css(array(
						'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
            			'global/plugins/font-awesome/css/font-awesome.min',
            			'global/plugins/simple-line-icons/simple-line-icons.min',
            			'global/plugins/bootstrap/css/bootstrap.min',
            			'global/plugins/bootstrap-switch/css/bootstrap-switch.min',
                  'global/plugins/select2/css/select2.min',
                  'global/plugins/select2/css/select2-bootstrap.min',
                  'global/css/components.min',
                  'global/css/plugins.min',
                  'pages/css/login-2.min'

            		));
            #### END GLOBAL MANDATORY STYLES ####
            ?>

            <?= $this->fetch('meta') ?>
            <?= $this->fetch('css') ?>
            <script>
            </script>


         </head>

  <body class="login">
    <?php echo $this->fetch('content');?>
    <?php
    	echo $this->Html->script(array(
    		'global/plugins/jquery.min',
        'global/plugins/bootstrap/js/bootstrap.min',
        'global/plugins/js.cookie.min',
        'global/plugins/jquery-slimscroll/jquery.slimscroll.min',
        'global/plugins/jquery.blockui.min',
        'global/plugins/bootstrap-switch/js/bootstrap-switch.min',
        'global/plugins/jquery-validation/js/jquery.validate.min',
        'global/plugins/jquery-validation/js/additional-methods.min',
        'global/plugins/select2/js/select2.full.min',
        'global/scripts/app.min',
        'global/plugins/jquery.min',
        'pages/scripts/login'
    	));
    ?>

</body>
</html>
