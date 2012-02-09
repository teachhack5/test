<div class="resources form">
<?php echo $this->Form->create('Resource');?>
	<fieldset>
		<legend><?php echo __('Add Resource'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('author_id');
		echo $this->Form->input('active');
		echo $this->Form->input('dateexpires');
		echo $this->Form->input('datecreated');
		echo $this->Form->input('datemodified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Resources'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
