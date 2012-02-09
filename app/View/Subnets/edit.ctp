<div class="subnets form">
<?php echo $this->Form->create('Subnet');?>
	<fieldset>
		<legend><?php echo __('Edit Subnet'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('location_id');
		echo $this->Form->input('iprangelow');
		echo $this->Form->input('iprangehigh');
		echo $this->Form->input('datecreated');
		echo $this->Form->input('datemodified');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Subnet.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Subnet.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Subnets'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
