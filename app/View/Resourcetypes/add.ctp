<div class="resourcetypes form">
<?php echo $this->Form->create('Resourcetype');?>
	<fieldset>
		<legend><?php echo __('Add Resourcetype'); ?></legend>
	<?php
		echo $this->Form->input('basictype');
		echo $this->Form->input('description');
		echo $this->Form->input('thumb');
		echo $this->Form->input('thumbsmall');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resourcetypes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
