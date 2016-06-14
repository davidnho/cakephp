<div>Create</div>
<?php
/* initialize the form . the app model as it's argument */
echo $this->Form->create('Topic'); 

/* input form. the input will be based on the data type of the field */
//echo $this->Form->input('user_id'); 
//echo $this->Form->input('modified');

echo $this->Form->input('title'); 
echo $this->Form->select('visible',array('1'=>'Published','2'=>'Hidden'),array('empty'=>FALSE)); 


/* this will end the form and creates a button */
echo $this->Form->end('Submit'); 

