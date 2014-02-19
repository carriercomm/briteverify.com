#briteverify.com 

Validate real emails with briteverify.com API

##Example of use:

	include 'briteverify.com.class.php';
	$brite = new Brite_Verify($_email, 'YOU-API-KEY');
	$result = $brite->verify();
	var_dump($result);
	

##Result fields:
	
	
![Result Fields](https://raw.github.com/madeinnordeste/briteverify.com/master/briteverify-results.png "Result Fields")