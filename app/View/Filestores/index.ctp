<div class="filestores index">
	<h2><?php echo __('Filestores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('server_id');?></th>
			<th><?php echo $this->Paginator->sort('virtualdirectory');?></th>
			<th><?php echo $this->Paginator->sort('protocol');?></th>
			<th><?php echo $this->Paginator->sort('downloadport');?></th>
			<th><?php echo $this->Paginator->sort('uploadport');?></th>
			<th><?php echo $this->Paginator->sort('uploaduri');?></th>
			<th><?php echo $this->Paginator->sort('smbpath');?></th>
			<th><?php echo $this->Paginator->sort('datecreated');?></th>
			<th><?php echo $this->Paginator->sort('datemodified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($filestores as $filestore): ?>
	<tr>
		<td><?php echo h($filestore['Filestore']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($filestore['Server']['name'], array('controller' => 'servers', 'action' => 'view', $filestore['Server']['id'])); ?>
		</td>
		<td><?php echo h($filestore['Filestore']['virtualdirectory']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['protocol']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['downloadport']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['uploadport']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['uploaduri']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['smbpath']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['datecreated']); ?>&nbsp;</td>
		<td><?php echo h($filestore['Filestore']['datemodified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filestore['Filestore']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filestore['Filestore']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filestore['Filestore']['id']), null, __('Are you sure you want to delete # %s?', $filestore['Filestore']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Filestore'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
