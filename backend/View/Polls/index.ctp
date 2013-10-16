<div class="page-header">
  <h1>Polls Instant <small>Subtext for header</small></h1>
</div>
<div class="row">
	<div class="col-lg-3">
		<ul class="nav nav-pills nav-stacked">
			<li><a href="#">link</a></li>
			<li><a href="#">link</a></li>
			<li><a href="#">link</a></li>
			<li><a href="#">link</a></li>
		</ul>
	</div>
	<div class="col-lg-9">
		<table class="table">
			<tr>
				<th>Id</th>
				<th>Question</th>
				<th>Published</th>
				<th>Currently Open</th>
				<th>Time Open</th>
				<th>Time Closed</th>
			</tr>
			<?php if (!empty($polls)): ?>
				<?php foreach ($polls as $poll): ?>
					<tr>
						
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="5"></td></tr>
			<?php endif; ?>
		</table>
	</div>	
</div>