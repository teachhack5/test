<div class="authors view">
<h2><?php  echo __('Author');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($author['Author']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($author['Author']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($author['Author']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($author['Author']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Author'), array('action' => 'edit', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Author'), array('action' => 'delete', $author['Author']['id']), null, __('Are you sure you want to delete # %s?', $author['Author']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Authors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Author'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Resources');?></h3>
	<?php if (!empty($author['Resource'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Author Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Dateexpires'); ?></th>
		<th><?php echo __('Datecreated'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($author['Resource'] as $resource): ?>
		<tr>
			<td><?php echo $resource['id'];?></td>
			<td><?php echo $resource['title'];?></td>
			<td><?php echo $resource['description'];?></td>
			<td><?php echo $resource['author_id'];?></td>
			<td><?php echo $resource['active'];?></td>
			<td><?php echo $resource['dateexpires'];?></td>
			<td><?php echo $resource['datecreated'];?></td>
			<td><?php echo $resource['datemodified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'resources', 'action' => 'view', $resource['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'resources', 'action' => 'edit', $resource['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'resources', 'action' => 'delete', $resource['id']), null, __('Are you sure you want to delete # %s?', $resource['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
