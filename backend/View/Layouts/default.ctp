<?php
	$this->Html->css(
		array(
			//'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/cupertino/jquery-ui.css',
			'//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.css',
			'//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.css',	
			'style',
		),
		null,array('inline' => false)
	);
	$this->Html->script(
		array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
			//'//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js',
			'//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',	
			//'jquery.form',
			'app'
		),
		array('inline' => false)
	);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title_for_layout; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php 
		echo $this->Html->meta('icon');
		echo $this->Html->meta('description');
	?>

	<?php echo $this->fetch('css'); ?>

	<?php echo $this->fetch('script');	?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="//raw.github.com/twbs/bootstrap/v3.0.0/assets/js/html5shiv.js"></script>
      <script src="//raw.github.com/twbs/bootstrap/v3.0.0/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<a href="#content" class="sr-only">Skip navigation</a>
	
	<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
		<div class="container">
    		<div class="navbar-header">
      			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex-collapse">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a class="navbar-brand" href="/">Final Table Skills Report</a>
    		</div>
    		<nav class="collapse navbar-collapse navbar-ex-collapse" role="navigation">
      			<ul class="nav navbar-nav navbar-right">
        			<li><a href="#">Trends</a></li>
        			<li><a href="/questions">Instant Polls</a></li>
        			<li><a href="/analyses">Analyses</a></li>        			        			
      			</ul>
    		</nav>
  		</div>
	</header>	

	<div id="content" class="container">
		<?php echo $this->Session->flash('flash', array('element' => 'flash')); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<footer class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<span class="navbar-text">&copy; Ltd. 2013</span> <a href="#top" class="navbar-text navbar-link navbar-right">Back to Top <i class="glyphicon glyphicon-arrow-up"></i></a>
		</div>
	</footer>

</body>
</html>
