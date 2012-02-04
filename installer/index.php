<?php 
    require_once('install.php');
    global $install;
    
    //check if ushahidi is installed?.
    if( $install->is_ushahidi_installed())
    {
        header('Location:../');
    }
   
    $header = $install->_include_html_header();
    print $header;
 ?>
<body>
<div id="ushahidi_install_container">
    <div id="ushahidi_login_logo"><img src="../media/img/admin/logo_login.gif" /></div>
    <div id="ushahidi_login" class="clearfix">
    
	<p>Welcome to the Ushahidi server install process.</p>
		
	<a href="basic_summary.php" class="tc-left btn-box">
		<span class="btn-box-title">BASIC INSTALLATION</span>
		<span class="btn-box-content">Simple and fast.  All you need is your website's root directory and your database information. You can configure everything else later.</span>
		<span class="last btn-action">Proceed with basic &rarr;</span>
	</a>
        	
	</div>

</div>
</body>
</html>
