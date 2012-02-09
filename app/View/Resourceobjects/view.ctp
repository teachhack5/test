<div class="resourceobjects view">
<h2><?php  echo __('Resourceobject');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resourceobject['Resourceobject']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resource'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceobject['Resource']['title'], array('controller' => 'resources', 'action' => 'view', $resourceobject['Resource']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filestore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceobject['Filestore']['id'], array('controller' => 'filestores', 'action' => 'view', $resourceobject['Filestore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resourcetype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resourceobject['Resourcetype']['id'], array('controller' => 'resourcetypes', 'action' => 'view', $resourceobject['Resourcetype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uri'); ?></dt>
		<dd>
			<?php echo h($resourceobject['Resourceobject']['uri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($resourceobject['Resourceobject']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($resourceobject['Resourceobject']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resourceobject'), array('action' => 'edit', $resourceobject['Resourceobject']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resourceobject'), array('action' => 'delete', $resourceobject['Resourceobject']['id']), null, __('Are you sure you want to delete # %s?', $resourceobject['Resourceobject']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourceobjects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourceobject'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resources'), array('controller' => 'resources', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resource'), array('controller' => 'resources', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filestores'), array('controller' => 'filestores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filestore'), array('controller' => 'filestores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Resourcetypes'), array('controller' => 'resourcetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resourcetype'), array('controller' => 'resourcetypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
