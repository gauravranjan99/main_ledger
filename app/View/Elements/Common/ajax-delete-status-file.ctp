<script>
$(document).ready(function() {
    $(".delete").on('click',function(){
               if (confirm('Are you sure to delete this record')) {
               
                    var obj = $(this);
                    var id = $(this).attr('rel');
                    var model = '<?php echo $model?>';
                    $.ajax({
                              url:'<?php echo Configure::read('BASE_URL')?>commons/delete',
                              data :{'model':model,'id':id},
                              success:function(data) {
                                   obj.closest('tr').remove();
                              }
                         });
               }
          });
          
          $(".status").on('click',function() {
               var obj = $(this);
               var status = $(this).attr("value");
               var id = $(this).attr("id");
               var model = '<?php echo $model?>';
               jQuery.ajax({
                   url: '<?php echo Configure::read('BASE_URL')?>commons/status',
                   data : {'id':id,'status':status,'model':model},
                   success: function(status) {
                                        if(status == 1) {
                                              obj.closest('tr').find('.update').css("display","block");
                                             obj.attr({//"src":"/img/default-img/tick.png",
                                                      
                                                      'value':status,
                                                      'data-original-title':'Active'
                                             });
                                            obj.find('i').removeClass('fa-times'); 
                                            obj.find('i').removeClass('text-danger');
                                            obj.find('i').addClass('text-success');
                                            obj.find('i').addClass('fa-check');
                                            //obj.html('Active');
                                        }else if(status == 0) {
                                            obj.closest('tr').find('.update').css("display","none");
                                           // alert(obj.closest('tr').find('.update').html());/*.$(".update").removeClass("fa-pencil");*/
                                             obj.attr({//"src":"/img/default-img/cross.png",
                                                      'value':status,
                                                       'data-original-title':'Inactive'
                                             });
                                             obj.find('i').removeClass('fa-check');
                                             obj.find('i').removeClass('text-success');
                                            obj.find('i').addClass('fa-times');
                                            obj.find('i').addClass('text-danger');
                                            //obj.removeClass('btn-success');
                                            //obj.addClass('btn-danger');
                                            //obj.html('Inactive');
                                        }         
                   }
               });
          });
          
});
</script>