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
    <title>

        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

            <?php
            		echo $this->Html->meta('icon');

            		echo $this->Html->css(array(
						'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
            			'global/plugins/font-awesome/css/font-awesome.min',
            			'global/plugins/simple-line-icons/simple-line-icons.min',
            			'global/plugins/bootstrap/css/bootstrap.min',
            			'global/plugins/bootstrap-switch/css/bootstrap-switch.min',
              		    'global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5',
                        'global/plugins/bootstrap-markdown/css/bootstrap-markdown.min',
                        'global/plugins/bootstrap-summernote/summernote',
                        'global/plugins/bootstrap-fileinput/bootstrap-fileinput',
                        'layouts/layout4/css/custom',
                        'global/plugins/datatables/datatables.min',
                        'global/plugins/datatables/plugins/bootstrap/datatables.bootstrap',
                        'global/css/components-rounded.min.css',
                        'global/css/plugins.min',
                        'layouts/layout4/css/layout.min',
                        'layouts/layout4/css/themes/default.min',
                        'layouts/layout4/css/custom.min'

            		));
            #### END GLOBAL MANDATORY STYLES ####
            ?>

            <?= $this->fetch('meta') ?>
            <?= $this->fetch('css') ?>
            <script>
            </script>


         </head>




  <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">

  <!-- INNER HEADER , CONTAINER AND SIDEBAR -->

  <?php echo $this->element('header');


echo $this->element('sidebar');

?>
   <?= $this->fetch('content') ?>

    <?php
    	echo $this->Html->script(array(
    		'global/plugins/jquery.min',
    		'global/plugins/bootstrap/js/bootstrap.min',
    		'global/plugins/js.cookie.min',
    		'global/plugins/jquery-slimscroll/jquery.slimscroll.min',
    		'global/plugins/jquery.blockui.min',
    		'global/plugins/bootstrap-switch/js/bootstrap-switch.min',
    		'global/scripts/app.min',
    		'layouts/layout4/layout.min',
    		'layouts/layout4/demo.min',
			  'global/plugins/bootstrap-fileinput/bootstrap-fileinput',
        'global/scripts/datatable',
        'global/plugins/datatables/datatables.min',
        'global/plugins/datatables/plugins/bootstrap/datatables.bootstrap',

        'assets/pages/scripts/table-datatables-editable.min'

    	));
    ?>

<?php echo $this->element('footer');?>

</body>
</html>
