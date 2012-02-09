<div class="subnets view">
<h2><?php  echo __('Subnet');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($subnet['Subnet']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo $this->Html->link($subnet['Location']['name'], array('controller' => 'locations', 'action' => 'view', $subnet['Location']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iprangelow'); ?></dt>
		<dd>
			<?php echo h($subnet['Subnet']['iprangelow']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iprangehigh'); ?></dt>
		<dd>
			<?php echo h($subnet['Subnet']['iprangehigh']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datecreated'); ?></dt>
		<dd>
			<?php echo h($subnet['Subnet']['datecreated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($subnet['Subnet']['datemodified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Subnet'), array('action' => 'edit', $subnet['Subnet']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Subnet'), array('action' => 'delete', $subnet['Subnet']['id']), null, __('Are you sure you want to delete # %s?', $subnet['Subnet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Subnets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subnet'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add')); ?> </li>
	</ul>
</div>
