<?php 
echo $this->Session->flash('auth');
echo $this->Form->create('User');
?>
<fieldset>
<legend><?php echo (__('Enter Username and Password'))?></legend>
<?php 
echo $this->Form->input('username');
echo $this->Form->input('password');
?>
</fieldset>
<?php 
echo $this->Form->end(__('Login'));
echo $this->Html->link('Add User',array('controller'=>'users','action'=>'add'));
?>