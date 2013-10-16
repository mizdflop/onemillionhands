<div class="trends view">
<h2><?php echo __('Trend'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trend['Player']['name'], array('controller' => 'players', 'action' => 'view', $trend['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Publish'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['publish']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Hand Range'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['start_hand_range']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Hand Range'); ?></dt>
		<dd>
			<?php echo h($trend['Trend']['end_hand_range']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trend'), array('action' => 'edit', $trend['Trend']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trend'), array('action' => 'delete', $trend['Trend']['id']), null, __('Are you sure you want to delete # %s?', $trend['Trend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trends'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trend'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Analyses'), array('controller' => 'analyses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Analysis'), array('controller' => 'analyses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Analyses'); ?></h3>
	<?php if (!empty($trend['Analysis'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Analysis Type Id'); ?></th>
		<th><?php echo __('Hand Number'); ?></th>
		<th><?php echo __('Skill Luck Events'); ?></th>
		<th><?php echo __('Desc'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trend['Analysis'] as $analysis): ?>
		<tr>
			<td><?php echo $analysis['id']; ?></td>
			<td><?php echo $analysis['analysis_type_id']; ?></td>
			<td><?php echo $analysis['hand_number']; ?></td>
			<td><?php echo $analysis['skill_luck_events']; ?></td>
			<td><?php echo $analysis['desc']; ?></td>
			<td><?php echo $analysis['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'analyses', 'action' => 'view', $analysis['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'analyses', 'action' => 'edit', $analysis['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'analyses', 'action' => 'delete', $analysis['id']), null, __('Are you sure you want to delete # %s?', $analysis['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Analysis'), array('controller' => 'analyses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
