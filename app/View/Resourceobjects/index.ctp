<div class="resourceobjects index">
	<h2><?php echo __('Resourceobjects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('resource_id');?></th>
			<th><?php echo $this->Paginator->sort('filestore_id');?></th>
			<th><?php echo $this->Paginator->sort('resourcetype_id');?></th>
			<th><?php echo $this->Paginator->sort('uri');?></th>
			<th><?php echo $this->Paginator->sort('datecreated');?></th>
			<th><?php echo $this->Paginator->sort('datemodified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($resourceobjects as $resourceobject): ?>
	<tr>
		<td><?php echo h($resourceobject['Resourceobject']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($resourceobject['Resource']['title'], array('controller' => 'resources', 'action' => 'view', $resourceobject['Resource']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($resourceobject['Filestore']['id'], array('controller' => 'filestores', 'action' => 'view', $resourceobject['Filestore']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($resourceobject['Resourcetype']['id'], array('controller' => 'resourcetypes', 'action' => 'view', $resourceobject['Resourcetype']['id'])); ?>
		</td>
		<td><?php echo h($resourceobject['Resourceobject']['uri']); ?>&nbsp;</td>
		<td><?php echo h($resourceobject['Resourceobject']['datecreated']); ?>&nbsp;</td>
		<td><?php echo h($resourceobject['Resourceobject']['datemodified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $resourceobject['Resourceobject']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $resourceobject['Resourceobject']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $resourceobject['Resourceobject']['id']), null, __('Are you sure you want to delete # %s?', $resourceobject['Resourceobject']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('controller' => 'filestores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filestore'), array('controller' => 'filestores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourcetypes'), array('controller' => 'resourcetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourcetype'), array('controller' => 'resourcetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
