<div class="page-header">
  <h1>Trends <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Trend'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Analyses'), array('controller' => 'analyses', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Analysis'), array('controller' => 'analyses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="col-lg-10">
	<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('player_id'); ?></th>
			<th><?php echo $this->Paginator->sort('publish'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th><?php echo $this->Paginator->sort('start_hand_range'); ?></th>
			<th><?php echo $this->Paginator->sort('end_hand_range'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($trends as $trend): ?>
	<tr>
		<td><?php echo h($trend['Trend']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trend['Player']['name'], array('controller' => 'players', 'action' => 'edit', $trend['Player']['id'])); ?>
		</td>
		<td><?php echo h($trend['Trend']['publish'])?'Y':'N'; ?>&nbsp;</td>
		<td><?php echo h($trend['Trend']['published']); ?>&nbsp;</td>
		<td><?php echo h($trend['Trend']['title']); ?>&nbsp;</td>
		<td><?php echo h($trend['Trend']['desc']); ?>&nbsp;</td>
		<td><?php echo h($trend['Trend']['start_hand_range']); ?>&nbsp;</td>
		<td><?php echo h($trend['Trend']['end_hand_range']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $trend['Trend']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trend['Trend']['id']), array('class' => 'btn btn-info')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trend['Trend']['id']), array('class' => 'btn btn-default'), __('Are you sure you want to delete # %s?', $trend['Trend']['id'])); ?>
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
		//echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array(
			'before' => '<ul class="pagination">',
			'after' => '</ul>',
			'tag' => 'li',
			'currentClass' => 'active',
			'separator' => '',
			'first' => 2,
			'last' => 2
		));		
		//echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	</div>
</div>
