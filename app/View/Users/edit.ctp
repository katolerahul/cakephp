<h2>Edit User Details</h2>
<?php  echo $this->Form->create('User',array('enctype'=>'multipart/form-data','inputDefaults' => array(
        'label' => false,
        'div' => false
    )))?>
<h3>Username :</h3><?php echo $this->Form->input('username',array('lable'=>false)); ?>
<?php $city= array(0=>'Nagpur',1=>'Mumbai',2=>'Pune'); ?>
<h3>City :</h3><?php echo $this->Form->input('city',array('type'=>'select','options'=>$city,'empty'=>'Select City','lable'=>false));  ?>
<?php $options=array('male'=>'Male ','female'=>' Female');
$attributes = array('legend'=>false,'value'=>$this->request->data['User']['gender'],);?>

<h3>Gender :</h3><?php echo $this->Form->radio('gender', $options,$attributes); ?>

<h3>Photo :</h3><?php echo $this->Form->file('tmp_img',array('type'=>'file'));?>
<?php echo $this->Form->input('id',array('type'=>'hidden'));?>
<?php echo $this->Form->input('image',array('type'=>'hidden'));?>
<img width='100' height='100' src='<?php echo $this->webroot;?>img/images/<?php echo $this->request->data['User']['image']; ?>'>
<?php echo $this->Form->end(__('Update'));?>