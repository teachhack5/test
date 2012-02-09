<div class="resources view">
<h2><?php  echo __('Resource');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Author'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resource['Author']['name'], array('controller' => 'authors', 'action' => 'view', $resource['Author']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dateexpires'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['dateexpires']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($resource['Resource']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resource'), array('action' => 'edit', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resource'), array('action' => 'delete', $resource['Resource']['id']), null, __('Are you sure you want to delete # %s?', $resource['Resource']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('controller' => 'authors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('controller' => 'authors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('controller' => 'resourceobjects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('controller' => 'resourceobjects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Resourceobjects');?></h3>
	<?php if (!empty($resource['Resourceobject'])):?>
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
		foreach ($resource['Resourceobject'] as $resourceobject): ?>
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
