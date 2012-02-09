<div class="filestores view">
<h2><?php  echo __('Filestore');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Server'); ?></dt>
		<dd>
			<?php echo $this->Html->link($filestore['Server']['name'], array('controller' => 'servers', 'action' => 'view', $filestore['Server']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Virtualdirectory'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['virtualdirectory']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Protocol'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['protocol']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Downloadport'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['downloadport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uploadport'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['uploadport']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uploaduri'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['uploaduri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Smbpath'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['smbpath']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($filestore['Filestore']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Filestore'), array('action' => 'edit', $filestore['Filestore']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Filestore'), array('action' => 'delete', $filestore['Filestore']['id']), null, __('Are you sure you want to delete # %s?', $filestore['Filestore']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filestore'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Servers'), array('controller' => 'servers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Server'), array('controller' => 'servers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Resourceobjects');?></h3>
	<?php if (!empty($filestore['Resourceobject'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Resource Id'); ?></th>
		<th><?php echo __('Filestore Id'); ?></th>
		<th><?php echo __('Resourcetype Id'); ?></th>
		<th><?php echo __('Uri'); ?></th>
		<th><?php echo __('Datecreated'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($filestore['Resourceobject'] as $resourceobject): ?>
		<tr>
			<td><?php echo $resourceobject['id'];?></td>
			<td><?php echo $resourceobject['resource_id'];?></td>
			<td><?php echo $resourceobject['filestore_id'];?></td>
			<td><?php echo $resourceobject['resourcetype_id'];?></td>
			<td><?php echo $resourceobject['uri'];?></td>
			<td><?php echo $resourceobject['datecreated'];?></td>
			<td><?php echo $resourceobject['datemodified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resourceobjects', 'action' => 'view', $resourceobject['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resourceobjects', 'action' => 'edit', $resourceobject['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resourceobjects', 'action' => 'delete', $resourceobject['id']), null, __('Are you sure you want to delete # %s?', $resourceobject['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
