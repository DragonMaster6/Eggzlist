<html>
	<head>
		<title> Eggzlist Home page </title>
		<?php
			$this->load->helper('html');
			echo link_tag('assets/css/main.css');
			echo link_tag('assets/css/ol.css');
		?>
		<script src=<?php echo base_url('assets/scripts/jquery-2.1.4.min.js'); ?> ></script>
		<script src=<?php echo base_url('assets/scripts/main.js'); ?>></script>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc1WN40QmAVJ-Jy4z4SEMbDRgDna7p0hA"
            type="text/javascript"></script>
-->
	</head>
	<body onload = "load()">
    <input type="hidden" id="base_url" value="<?php echo base_url();?>">
    <input type="hidden" id="site_url" value="<?php echo site_url();?>">
		<center> <?php echo img('assets/pics/eggzlist_header.png'); ?> </center>
		