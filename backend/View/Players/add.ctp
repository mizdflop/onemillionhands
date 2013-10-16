<div class="page-header">
  <h1>Player Add <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('List Analyses'), array('controller' => 'analyses', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Analysis'), array('controller' => 'analyses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<div class="col-lg-10">
	<?php echo $this->Form->create('Player'); ?>
		<?php
			echo $this->Form->input('name');		
		?>
		<div class="btn-toolbar">
			<div class="btn-group">
  				<button type="submit" class="btn btn-success">Add</button>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>