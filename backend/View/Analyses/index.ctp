<div class="page-header">
  <h1>Analyses <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Analysis'), array('action' => 'add')); ?></li>
			<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players','action' => 'add')); ?></li>			
			<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players','action' => 'index')); ?></li>
		</ul>
	</div>
	<div class="col-lg-10">
	<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('hand_number'); ?></th>
			<th>Analysis Type</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($analyses as $analysis): ?>
	<tr>
		<td><?php echo $analysis['Analysis']['id']; ?>&nbsp;</td>
		<td><?php echo $analysis['Analysis']['hand_number']; ?>&nbsp;</td>
		<td><?php echo $analysis['AnalysisType']['name']; ?>&nbsp;</td>		
		<td>
			<div class="btn-group">
				<?php //echo $this->Html->link(__('View'), array('action' => 'view', $analysis['Analysis']['id'])); ?>
				<?php echo $this->Html->link('Edit', array('action' => 'edit', $analysis['Analysis']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $analysis['Analysis']['id']), array('class' => 'btn btn-default'), __('Are you sure you want to delete # %s?', $analysis['Analysis']['id'])); ?>
			</div>
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