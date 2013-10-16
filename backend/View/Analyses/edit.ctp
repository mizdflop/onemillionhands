<div class="page-header">
  <h1>Analysis Add <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink('Delete', array('action' => 'delete', $this->Form->value('Analysis.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Analysis.id'))); ?></li>
			<li><?php echo $this->Html->link('List Analyses', array('action' => 'index')); ?></li>
			<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players','action' => 'add')); ?></li>			
			<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players','action' => 'index')); ?></li>			
		</ul>
	</div>
	<div class="col-lg-10">
	<?php echo $this->Form->create('Analysis'); ?>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('hand_number', array(
				'label' => 'Hand #'
			));
			echo $this->Form->input('analysis_type_id', array(
				'label' => 'Analysis Type',
			)); 
			echo $this->Form->input('skill_luck_events');
			echo $this->Form->input('Player', array(
				'multiple' => 'checkbox',
				'class' => 'checkbox-inline'
			));
			echo $this->Form->input('desc');
		?>
		<div class="btn-toolbar">
			<div class="btn-group">
  				<button type="submit" class="btn btn-success">Update</button>
  				<button type="button" class="btn btn-default">Preview</button>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>