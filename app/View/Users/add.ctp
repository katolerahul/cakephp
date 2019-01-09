<h2>Add User Details</h2>
<?php echo $this->Form->create('User',array('enctype'=>'multipart/form-data' , 'inputDefaults' => array(
        'label' => false,
        'div' => false
    ))); ?>
<h3>Username :</h3><?php echo $this->Form->input('username',array('lable'=>false)); ?>
<h3>Password :</h3><?php echo $this->Form->input('password',array('lable'=>false)); ?>
<?php $city = array(0=>'Nagpur',1=>'Mumbai',2=>'Pune');?>
<h3>City :</h3><?php echo $this->Form->input('country',array('type'=>'select','options'=>$city,'empty'=>'Select City','lable'=>false)); ?>
<?php $options = array('male'=>' Male','female'=>' Female');
$attribute = array('legend'=>false,'default'=>'male')?>
<h3>Gender :</h3><?php echo $this->Form->radio('gender',$options,$attribute); ?>
<h3>Photo :</h3><?php echo $this->Form->file('image',array('lable'=>false,'type'=>'file')); ?>

<?php echo $this->Form->end(__('Save'))?>