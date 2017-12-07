<link rel="stylesheet" href="<?php echo Configure::read('BASE_URL')?>css/Invoice/app.v2.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Configure::read('BASE_URL')?>css/Invoice/font.css" type="text/css" cache="false" />
<!--[if lt IE 9]>
    <script src="<?php echo Configure::read('BASE_URL')?>js/Invoice/ie/html5shiv.js" cache="false"></script>
    <script src="<?php echo Configure::read('BASE_URL')?>js/Invoice/ie/respond.min.js" cache="false"></script>
    <script src="<?php echo Configure::read('BASE_URL')?>js/Invoice/ie/excanvas.js" cache="false"></script>
<![endif]-->
<script language="javascript" type="text/javascript">
        
        //$(document).ready(function(){
        //    $(".clickBtn").click(function(){
        //        printout();
        //    });
        //});
        
        function printOut(elem)
    {
        Popup($('<div/>').append($(elem).clone()).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Satkar Jewellers Invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Satkar Jewellers Invoice</title>');
        /*optional stylesheet*/ mywindow.document.write('<link rel="stylesheet" href="<?php echo Configure::read('BASE_URL')?>css/Invoice/app.v2.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="<?php echo Configure::read('BASE_URL')?>css/Invoice/font.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }
    </script>
<!--<style>
    header {padding: 0px !important;}
    @media #printDiv
    {
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
</style>-->
<section class="vbox">
         
         <section>
            <section class="hbox stretch">
              
               <section id="content">
                  <section class="<!--vbox bg-white-->">
                     <header class="header b-b b-light hidden-print">
                        <button href="javascript:void(0)" class="clickBtn btn btn-sm btn-info pull-right" onClick="printOut('#printDiv')">Print</button> 
                        <!--<p>Invoice</p>-->
                     </header>
                     <section class="scrollable wrapper" id="printDiv">
                        <i class="fa fa-apple<!-- fa fa-3x-->"></i> 
                        <div class="row">
                           <div class="col-xs-6">
                              <h4><?php echo BUISNESS_NAME;?></h4>
                              <p><?php echo BUISNESS_ADDRESS;?></p>
                              <p> Telephone: <?php echo BUISNESS_PHONE;?><br> Email: <?php echo BUISNESS_EMAIL;?> </p>
			      VAT TIN:<?php echo VAT_TIN;?>
                           </div>
                           <!--<div class="col-xs-6 text-right">
                              <p class="h4">#9048392</p>
                              <h5>29th Mar 2013</h5>
                           </div>-->
                        </div>
                        <div class="well m-t">
                           <div class="row">
                              <div class="col-xs-6">
                                 <strong>TO:</strong> 
                                 <h4><?php echo $paymentData['Customer']['name'];?></h4>
                                 <p> <?php echo $paymentData['Customer']['address'];?><br>
                                 Phone: <?php echo $paymentData['Customer']['phone'];?><br>
                                <!-- Email: <?php echo $paymentData['Customer']['email'];?><br> </p>-->
                              </div>
                              <!--<div class="col-xs-6">
                                 <strong>SHIP TO:</strong> 
                                 <h4>John Smith</h4>
                                 <p> 2nd Floor<br> St John Street, Aberdeenshire 2541<br> United Kingdom<br> Phone: 031-432-678<br> Email: youemail@gmail.com<br> </p>
                              </div>-->
                           </div>
                        </div>
                        <p class="m-t m-b">
                            Order date: <strong><?php
                            echo date('d M Y',strtotime($paymentData['Payment']['created']));
                            
                            //date('d M Y');?></strong><br>
                           <!-- Order status: <span class="label bg-success">Shipped</span><br>-->
                            Invoice No: <strong><?php echo !empty($paymentData['Payment']['order_id'])?$paymentData['Payment']['order_id']:'N/A'?></strong>
                        </p>
                        <div class="line"></div>
                        <?php
                            $orderData = $this->Common->fetchCustomerOrder($paymentData['Payment']['customer_id'],$paymentData['Payment']['purchase_date']);
                           // pr($orderData);
                            
                        ?>
                        <table class="table">
                           <thead>
                              <tr>
                                 <th>S.NO</th>
                            	<th>ITEM NAME</th>
                                <th>TYPE</th>
                                <th>RATE</th>
                                <th>MAKING CHARGE</th>
                                <th>WEIGHT</th>
                                <th>AMOUNT</th>
                              </tr>
                           </thead>
                           <tbody>
                           <?php $m = 1;foreach($orderData as $a) { ?>
                              <tr>
                                 <td><?php echo $m; ?></td>
				    <td><?php echo !empty($a['Order']['item'])?$a['Order']['item']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Category']['type'])?$a['Category']['type']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['rate'])?$a['Order']['rate']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['making_charge'])?$a['Order']['making_charge']:'N/A'; ?></td>
				    <td><?php echo !empty($a['Order']['weight'])?$a['Order']['weight']:'N/A'; ?></td>
				    <td>
					<?php
					    echo !empty($a['Order']['amount'])?$a['Order']['amount']:'N/A'; 
					    
					?>
				    </td>
                              </tr>
                            <?php  $m++;} ?>
                              <tr>
                                 <td colspan="6" class="text-right"><strong>Total</strong></td>
                                 <td><?php echo $paymentData['Payment']['amount']?></td>
                              </tr>
                              <tr>
                                 <td colspan="6" class="text-right no-border"><strong>Discount</strong></td>
                                 <td><?php echo !empty($paymentData['Payment']['discount'])?$paymentData['Payment']['discount']:'NIL'?></td>
                              </tr>
			      <tr>
                                 <td colspan="6" class="text-right no-border"><strong>Gross Total</strong></td>
                                 <td><?php echo $paymentData['Payment']['amount'] - $paymentData['Payment']['discount'] ?></td>
                              </tr>
			      
			      
                              <tr>
                                 <td colspan="6" class="text-right no-border"><strong>VAT 1%</strong></td>
                                 <td><?php echo !empty($paymentData['Payment']['vat'])?$paymentData['Payment']['vat']:'NIL'?></td>
                              </tr>
                              <tr>
                                 <td colspan="6" class="text-right no-border"><strong>Grand Total (Rs.)</strong></td>
                                 <td><strong><?php echo ($paymentData['Payment']['total_amount'] + $paymentData['Payment']['vat']);?></strong></td>
                              </tr>
                           </tbody>
                        </table>
                     </section>
                  </section>
                  <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
               </section>
               <aside class="bg-light lter b-l aside-md hide" id="notes">
                  <div class="wrapper">Notification</div>
               </aside>
            </section>
         </section>
      </section>
      <script src="js/app.v2.js"></script> <!-- Bootstrap --> <!-- App --> 