<h1>Index</h1>
<h2>Hello <?php echo ' '.$users['User']['username'];?><h2>
<h4 style="float:right"><?php echo $this->Html->link('Log Out',array('controller'=>'users','action'=>'logout'));?></h4>
<h4 style=""><?php echo $this->Html->link('Edit User',array('action'=>'edit',$users['User']['id']));?></h4>

<img width='200' height='200' src='<?php echo $this->webroot;?>img/images/<?php echo $users['User']['image']?>'>
<div class="row">
<div class="col-sm-12">	
		
	<?php echo $this->element('flash'); ?> 
		
 <?php echo $this->Form->create('UserSearch',array(
		'url'=>array('controller'=>'users','action'=>'index'),'inputDefaults' => array(
        'label' => false,
        'div' => false
    ))); ?>	
	
	<div class="row form-inline">
	<fieldset>	
	<?php echo $this->Form->input('name',array('class'=>'form-control','placeholder'=>'Search By Name','label'=>false)); ?>   

	<div class="form-group col-sm-2">
	
	<?php
		echo $this->Form->button('Search',array('type'=>'submit','class'=>'btn btn-primary','value'=>'Search','name'=>'data[UserSearch][Search]'));
	?>	
		 	
	</div>		
	
	</fieldset>
	
	</div>
	<?php echo $this->Form->end(); 	?>		
	</div>

</div>
<table>		
	<thead>
			<th>Sr.No.</th>
			<th></th>
			<th></th>
						
			<th>Action</th>
	</thead>
	
	<tbody>

<?php
if(!empty($userData))
	{
	 $i=1;
	
	foreach ($userData as $row)
	{                   
	$i++;
	?>
	<tr>
	<td><?php echo $i; ?></td>
	
	<td><?php echo $row['User']['username']; ?></td>
	<td><img width='200' height='200' src='<?php echo $this->webroot;?>img/images/<?php echo $row['User']['image']?>'></td>
	
	<td>	
	 		
	
	<h4 style=""><?php echo $this->Html->link('Edit User',array('action'=>'edit',$row['User']['id']));?></h4>	
	
	<h4 style=""><?php echo $this->Html->link('Delete User',array('action'=>'delete',$row['User']['id']));?></h4>	
	
	</td>
	
	</tr>
	
	<?php 
	}
	}
	else
	{
	?>
	<tr>
	<td colspan="4" align="center">No Records</td>
	</tr>
	<?php
	}
	?>
	</tbody>
</table>