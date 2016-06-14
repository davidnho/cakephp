<h2>Edit Topic</h2>
<?php
echo $this->Form->create('Topic');
echo $this->Form->input('title');
//echo $this->Form->select('Visible',array('1'=>'Published','2'=>'Hidden'),array('empty'=>false));
echo $this->Form->input('visible');
echo $this->Form->end('Edit topic');
