<html>
<head><title>Your Email Has Been Sent</title></head>
<body>


<ul>
<?php
        ### Replace the email address with your own, 
        ### don't forget the escape backslash before the @ symble.
        $to = "andrew-edwards\@live.com";
        
        ### Replace the subject line with your own.
        $subject = "Question Regarding Website";
        
        ### Placeholder for Email Body
        $message = "";    
        
        ### Placeholder for HTML Feedback
        $html_message = "";
        

        ### Find out what the request method was (We support POST and GET methods)

        $request_method = $_SERVER["REQUEST_METHOD"];

		
        if ($request_method == "GET")                                   ### Info was passed using GET
                {
                
                ### Tell them
                foreach (array_keys($_GET) as $key)                     ### Find out each variable name
                        {
                        $pair = "";										### Place holder for the current key-value pair
		                $pair = $pair."$key";                           ### Variable name
		                $pair = $pair.": ".$_GET[$key]."\n";		    ### Variable value
		                
                        $message = $message.$pair ; 			### Construct email body
                        
                        $html_message = $pair."<br/>";			### Blank line makes things for HTML page	
                        print $html_message;
                        }
                        
                print "</ul>\n";
                
                               }

        elseif ($request_method == "POST")                              ### Repeat the same proceedure for POST
                {
                	
                  foreach (array_keys($_POST) as $key)
                        {
                        $pair = "";
		                $pair = $pair."$key";                           ### Variable name
		                $pair = $pair.": ".$_POST[$key]."\n";			### Variable value
		                
                        $message = $message.$pair ; 			### Construct email body
                        
                        $html_message = $pair."<br/>";			### Blank line makes things for HTML page	
                        print $html_message;
                        }
                        
                print "</ul>\n";
                
                }
        else                                                            ### If we get here, some unknown method was used
                {
                print "Unsupported method used\n";
                }		
                
                if ($message == ""){
                	print "<h3>Please enter a valid message.</h3>";
					exit;
				}
		
		### Sending Email using the PHP mail function.
		$sent = mail($to, $subject, $message);
		if ($sent){
			print "<H3>Your email has been sent.</h3>\n";
		}else{
			print "<H3>There were some problem sending this email. Please contact me directly at andrew@andrewedwards.com.au</h3>\n";
		}
		

?>

</ul>
</body>
</html>

