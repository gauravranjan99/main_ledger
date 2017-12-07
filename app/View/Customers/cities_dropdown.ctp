 <?php echo $this->Form->create('Contact', array('type'=>'post','action' => 'find'));
        echo $this->Form->input('Contact.city', array(

            'empty' => 'Pick a city',

            'label' => 'City',

            'option'=> $cities,

            'id' => 'city',

            'autocomplete' => 'on'));

       // echo $this->Form->end(__('Search'));
        ?>
          <?php echo $this->Form->input('Search',array('type'=>'submit','label'=>false,'class'=>'btn'));?>
<script>

$( "#city" ).autocomplete({ 

  source: "../customers/find",

  minLength: 2,

  delay: 2

});

</script>