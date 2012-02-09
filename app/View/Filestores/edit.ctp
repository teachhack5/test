<div class="filestores form">
<?php echo $this->Form->create('Filestore');?>
	<fieldset>
		<legend><?php echo __('Edit Filestore'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('server_id');
		echo $this->Form->input('virtualdirectory');
		echo $this->Form->input('protocol');
		echo $this->Form->input('downloadport');
		echo $this->Form->input('uploadport');
		echo $this->Form->input('uploaduri');
		echo $this->Form->input('smbpath');
		echo $this->Form->input('datecreated');
		echo $this->Form->input('datemodified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Filestore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Filestore.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
