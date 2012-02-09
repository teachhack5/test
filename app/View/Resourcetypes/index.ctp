<div class="resourcetypes index">
	<h2><?php echo __('Resourcetypes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('basictype');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('thumb');?></th>
			<th><?php echo $this->Paginator->sort('thumbsmall');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($resourcetypes as $resourcetype): ?>
	<tr>
		<td><?php echo h($resourcetype['Resourcetype']['id']); ?>&nbsp;</td>
		<td><?php echo h($resourcetype['Resourcetype']['basictype']); ?>&nbsp;</td>
		<td><?php echo h($resourcetype['Resourcetype']['description']); ?>&nbsp;</td>
		<td><?php echo h($resourcetype['Resourcetype']['thumb']); ?>&nbsp;</td>
		<td><?php echo h($resourcetype['Resourcetype']['thumbsmall']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resourcetype['Resourcetype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resourcetype['Resourcetype']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resourcetype['Resourcetype']['id']), null, __('Are you sure you want to delete # %s?', $resourcetype['Resourcetype']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Resourcetype'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
