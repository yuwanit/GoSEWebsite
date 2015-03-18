<?php
class HtmlPage
{
	public function __construct()
	{	
	}
    
	public function notAccess()
    {
    	return '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
        	<html>
            	<head><title>Can\'t Access Page</title></head>
            	<body>
                	<h1>You can\'t access this file directly...</h1>
                	<p>The requested Premission was not found on this server.</p>
                	<hr>
                	<address>'.$_SERVER["SERVER_NAME"].' Server Port '.$_SERVER["SERVER_PORT"].'</address>
            	</body>
        	</html>';
    }
    
    public function notFound()
    {
    	return '<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
        	<html>
            	<head><title>Page Not Found</title></head>
            	<body>
                	<h1>404 File not Found</h1>
                	<p>This file directly not found.</p>
                	<hr>
                	<address>'.$_SERVER["SERVER_NAME"].' Server Port '.$_SERVER["SERVER_PORT"].' </address>
            	</body>
            </html>';
    }
  
}
?>