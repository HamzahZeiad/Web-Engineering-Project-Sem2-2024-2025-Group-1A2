<?php
	// to make a connection with database
	$link = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

	// to select the targeted database
	mysqli_select_db($link, "mydatabase") or die(mysqli_error());
		
	// to create a query to be executed in sql
	$query = "insert into people values('','Abu Bakar','0191234567','No 1, Jalan 2, Gambang, Kuantan'),
			('','Cheng Chen Lee','0122345678','D203, Kolej Kediaman 2, UMP, Gambang, Kuantan'),
			('','Aliah Ahmad','0111234567','210, Kolej Kediaman 3, UMP, Gambang, Kuantan'),
			('','Monesh','0101234567','No 20/2, Taman Cili, Temerloh'),
			('','Muthusamy','0107654321','Lot 239, Jalan 7/8, Temerloh')"  
	or die(mysqli_connect_error());



	// to run sql query in database
	$result = mysqli_query($link, $query);
	     
	//Check whether the insert was successful or not
	if($result) 
	        {
		        
                    echo("Data insert");
					
		}
		else 
	        {
			        
	            die("Insert failed");
	        }
	 
?>