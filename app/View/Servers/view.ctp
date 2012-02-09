<div class="servers view">
<h2><?php  echo __('Server');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($server['Server']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($server['Server']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($server['Location']['name'], array('controller' => 'locations', 'action' => 'view', $server['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Displayname'); ?></dt>
		<dd>
			<?php echo h($server['Server']['displayname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($server['Server']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($server['Server']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($server['Server']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Server'), array('action' => 'edit', $server['Server']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Server'), array('action' => 'delete', $server['Server']['id']), null, __('Are you sure you want to delete # %s?', $server['Server']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('controller' => 'filestores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filestore'), array('controller' => 'filestores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Filestores');?></h3>
	<?php if (!empty($server['Filestore'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Server Id'); ?></th>
		<th><?php echo __('Virtualdirectory'); ?></th>
		<th><?php echo __('Protocol'); ?></th>
		<th><?php echo __('Downloadport'); ?></th>
		<th><?php echo __('Uploadport'); ?></th>
		<th><?php echo __('Uploaduri'); ?></th>
		<th><?php echo __('Smbpath'); ?></th>
		<th><?php echo __('Datecreated'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($server['Filestore'] as $filestore): ?>
		<tr>
			<td><?php echo $filestore['id'];?></td>
			<td><?php echo $filestore['server_id'];?></td>
			<td><?php echo $filestore['virtualdirectory'];?></td>
			<td><?php echo $filestore['protocol'];?></td>
			<td><?php echo $filestore['downloadport'];?></td>
			<td><?php echo $filestore['uploadport'];?></td>
			<td><?php echo $filestore['uploaduri'];?></td>
			<td><?php echo $filestore['smbpath'];?></td>
			<td><?php echo $filestore['datecreated'];?></td>
			<td><?php echo $filestore['datemodified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'filestores', 'action' => 'view', $filestore['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'filestores', 'action' => 'edit', $filestore['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'filestores', 'action' => 'delete', $filestore['id']), null, __('Are you sure you want to delete # %s?', $filestore['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Filestore'), array('controller' => 'filestores', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
