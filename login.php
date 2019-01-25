<?php

    $error = ""; $successMessage = "";

    if ($_POST) {
	$username = ($_POST['username']);
  	$password = ($_POST['password']);
        
        if (empty($username)) {
            
            $error .= "An email address is required.<br>";
            
        }
        
        if (empty($password)) {
            
            $error .= "The password field is required.<br>";
            
        }
else
{		$m = new MongoDB\Driver\Manager();
	//$query = new MongoDB\Driver\Query((array("username" => $username,"password" => ($password))));
	//$cursor = $m->executeQuery('mydb.login', $query);
	//print_r($cursor->toArray());
	//if($cursor!=null)
	//echo"yes";

$filter      = ['username' => $username,'password' => $password];
$options = [];

$query = new \MongoDB\Driver\Query($filter, $options);
$rows   = $m->executeQuery('mydb.login', $query); 
$rows=$rows->toArray();
//print( $rows);
if(!empty($rows))
echo "<h2>Sucessfully logged in</h2>";
else
echo "<p><h2>Unsucessful login</h2></p><br><h2>try again</h2>";
		
   
}
}
   
echo $error;
?>
        
        
        
