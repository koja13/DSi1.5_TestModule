<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	
	    <link rel="stylesheet" href="<?php echo base_url('assets/countdownTimer/css/styles.css')?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/countdownTimer/countdown/jquery.countdown.css')?>" />
        
        <link rel="stylesheet" href="<?php echo base_url('assets/css/tabs.css')?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/QuizStyle.css')?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>" />
        <script type="text/javascript" >

 var config = {
     base_url: "<?php echo base_url(); ?>",
     site_url: "<?php echo site_url(); ?>",
     use_dsi: "<?php echo $this->session->userdata('use_dsi'); ?>",
 };

</script>
        
<title><?php echo (isset($title)) ? $title : "My CI Site" ?> </title>

</head>
<body>
	<div id="wrapper">