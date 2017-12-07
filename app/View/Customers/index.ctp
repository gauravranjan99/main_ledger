<?php
echo $this->Form->create('Customer',array('action'=>'add','id'=>'saveForm'));
echo $this->Form->input('name');
echo $this->Form->submit('Save');
echo $this->Form->end();
?> 