<?		//local
		$username="root";
		$password="";
		$database="galicia";
		$url="localhost";
		mysql_connect($url,$username,$password);
		@mysql_select_db($database) or die( "No pude conectarme a la base de datos");
?>