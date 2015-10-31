<html>
	<head>
		<title> Eggzlist Home page </title>
		<?php
			$this->load->helper('html');
			echo link_tag('assets/css/main.css');
			echo link_tag('assets/css/ol.css');
		?>
		
		<script src=<?php echo base_url('assets/scripts/jquery-2.1.4.min.js'); ?> ></script>
		<script src=<?php echo base_url('assets/scripts/ol.js'); ?> ></script>
		<script src=<?php echo base_url('assets/scripts/mainMap.js'); ?>></script>
	</head>
	<body>
		<center> <?php echo img('assets/pics/LogoTitle.png'); ?> </center>
		