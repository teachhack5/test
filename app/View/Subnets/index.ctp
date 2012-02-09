<div class="subnets index">
	<h2><?php echo __('Subnets');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('location_id');?></th>
			<th><?php echo $this->Paginator->sort('iprangelow');?></th>
			<th><?php echo $this->Paginator->sort('iprangehigh');?></th>
			<th><?php echo $this->Paginator->sort('datecreated');?></th>
			<th><?php echo $this->Paginator->sort('datemodified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($subnets as $subnet): ?>
	<tr>
		<td><?php echo h($subnet['Subnet']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($subnet['Location']['name'], array('controller' => 'locations', 'action' => 'view', $subnet['Location']['id'])); ?>
		</td>
		<td><?php echo h($subnet['Subnet']['iprangelow']); ?>&nbsp;</td>
		<td><?php echo h($subnet['Subnet']['iprangehigh']); ?>&nbsp;</td>
		<td><?php echo h($subnet['Subnet']['datecreated']); ?>&nbsp;</td>
		<td><?php echo h($subnet['Subnet']['datemodified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $subnet['Subnet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subnet['Subnet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subnet['Subnet']['id']), null, __('Are you sure you want to delete # %s?', $subnet['Subnet']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Subnet'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
