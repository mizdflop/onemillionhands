<div class="page-header">
  <h1>Trend Add <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('List Trends'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Analyses'), array('controller' => 'analyses', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Analysis'), array('controller' => 'analyses', 'action' => 'add')); ?> </li>		
		</ul>
	</div>
	<div class="col-lg-10">
	<?php echo $this->Form->create('Trend'); ?>
		<?php
			echo $this->Form->input('player_id');
			echo $this->Form->input('title');
			echo $this->Form->input('desc');
			echo $this->Form->input('start_hand_range');
			echo $this->Form->input('end_hand_range');
			echo $this->Form->input('Analysis');
			echo $this->Form->input('publish');					
		?>
		<div class="btn-toolbar">
			<div class="btn-group">
  				<button type="submit" class="btn btn-success">Add</button>
  				<button type="button" class="btn btn-default">Preview</button>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>