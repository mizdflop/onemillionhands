<div class="page-header">
  <h1>Polls Instant Edit <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-2">
		<ul class="nav nav-pills nav-stacked">
			<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Question.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Question.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Questions'), array('action' => 'index')); ?></li>
		</ul>
	</div>
	<div class="col-lg-10">
	<?php echo $this->Form->create('Question'); ?>
		<?php
			echo $this->Form->input('id');
			echo $this->Form->input('question', array(
				'label' => 'Poll Question'
			));
			echo $this->Form->input('state', array(
				'type' => 'radio',
				'label' => 'Poll State',
				'options' => array('' => 'N/A','Open' => 'Open','Closed' => 'Closed'),
				'class' => 'radio-inline'
			));
			echo $this->Form->input('published');
		?>
		<h4>User-Facing Answers</h4>
		<?php for ($i=0;$i<5;$i++): ?>
			<?php 
				echo $this->Form->input("Answer.{$i}.id");
				echo $this->Form->input("Answer.{$i}.answer", array(
					'label' => false,
					'required' => false	
				)); 
			?>
		<?php endfor; ?>
		<h4>SiG Data</h4>
		<?php for ($i=0;$i<5;$i++): ?>
			<?php 
				echo $this->Form->input("SigData.{$i}.id");
				echo $this->Form->input("SigData.{$i}.percentage", array(
					'label' => false,
					'required' => false
				)); 
			?>
		<?php endfor; ?>		
		<div class="btn-toolbar">
			<div class="btn-group">
  				<button type="submit" class="btn btn-success">Update</button>
  				<button type="button" class="btn btn-default">Preview</button>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>