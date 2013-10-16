<div class="page-header">
  <h1>Polls Instant <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('New Question'), array('action' => 'add')); ?></li>
		</ul>
	</div>
	<div class="col-lg-10">
	<table class="table">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('question'); ?></th>
			<th><?php echo $this->Paginator->sort('published'); ?></th>
			<th><?php echo $this->Paginator->sort('state'); ?></th>			
			<th><?php echo $this->Paginator->sort('opened'); ?></th>
			<th><?php echo $this->Paginator->sort('closed'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($questions as $question): ?>
	<tr>
		<td><?php echo $question['Question']['id']; ?>&nbsp;</td>
		<td><?php echo $question['Question']['question']; ?>&nbsp;</td>
		<td><?php echo $question['Question']['published']?'Y':'N'; ?>&nbsp;</td>
		<td><?php echo $question['Question']['state']?$question['Question']['state']:'N/A'; ?>&nbsp;</td>		
		<td><?php echo $question['Question']['opened']; ?>&nbsp;</td>
		<td><?php echo $question['Question']['closed']; ?>&nbsp;</td>
		<td>
			<div class="btn-group">
				<?php //echo $this->Html->link(__('View'), array('action' => 'view', $question['Question']['id'])); ?>
				<?php echo $this->Html->link('Edit', array('action' => 'edit', $question['Question']['id']), array('class' => 'btn btn-info')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $question['Question']['id']), array('class' => 'btn btn-default'), __('Are you sure you want to delete # %s?', $question['Question']['id'])); ?>
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