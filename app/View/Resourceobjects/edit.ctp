<div class="resourceobjects form">
<?php echo $this->Form->create('Resourceobject');?>
	<fieldset>
		<legend><?php echo __('Edit Resourceobject'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('resource_id');
		echo $this->Form->input('filestore_id');
		echo $this->Form->input('resourcetype_id');
		echo $this->Form->input('uri');
		echo $this->Form->input('datecreated');
		echo $this->Form->input('datemodified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Resourceobject.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Resourceobject.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('controller' => 'filestores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filestore'), array('controller' => 'filestores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourcetypes'), array('controller' => 'resourcetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourcetype'), array('controller' => 'resourcetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
