<div class="locations view">
<h2><?php  echo __('Location');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($location['Location']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($location['Location']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($location['Location']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($location['Location']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Location'), array('action' => 'edit', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Location'), array('action' => 'delete', $location['Location']['id']), null, __('Are you sure you want to delete # %s?', $location['Location']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subnets'), array('controller' => 'subnets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subnet'), array('controller' => 'subnets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Servers');?></h3>
	<?php if (!empty($location['Server'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Displayname'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Datecreated'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($location['Server'] as $server): ?>
		<tr>
			<td><?php echo $server['id'];?></td>
			<td><?php echo $server['name'];?></td>
			<td><?php echo $server['location_id'];?></td>
			<td><?php echo $server['displayname'];?></td>
			<td><?php echo $server['address'];?></td>
			<td><?php echo $server['datecreated'];?></td>
			<td><?php echo $server['datemodified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'servers', 'action' => 'view', $server['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'servers', 'action' => 'edit', $server['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'servers', 'action' => 'delete', $server['id']), null, __('Are you sure you want to delete # %s?', $server['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Subnets');?></h3>
	<?php if (!empty($location['Subnet'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Iprangelow'); ?></th>
		<th><?php echo __('Iprangehigh'); ?></th>
		<th><?php echo __('Datecreated'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($location['Subnet'] as $subnet): ?>
		<tr>
			<td><?php echo $subnet['id'];?></td>
			<td><?php echo $subnet['location_id'];?></td>
			<td><?php echo $subnet['iprangelow'];?></td>
			<td><?php echo $subnet['iprangehigh'];?></td>
			<td><?php echo $subnet['datecreated'];?></td>
			<td><?php echo $subnet['datemodified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'subnets', 'action' => 'view', $subnet['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'subnets', 'action' => 'edit', $subnet['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subnets', 'action' => 'delete', $subnet['id']), null, __('Are you sure you want to delete # %s?', $subnet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subnet'), array('controller' => 'subnets', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
