<!-- 
	Name:		msheeler
	File Name:	LawnCareServices_EmployeePortal_ViewAccount.php
	Date:		3/15/2016
-->

<html>
	
<head>
	<title>Lawn Care Services</title>
	<link rel ="stylesheet" type="text/css" href="LawnCareServices.css" >
</head>

<body>

<h1>Lawn Care Services Inc.</h1>

<?php
		print("<form action=\"LawnCareServices_EmployeePortal_ViewAccount.php\" method=\"post\">");

		//Data from input
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
			
		//Navigation bar
		print("<div class=\"menubar\">");
			print("<li><a title = \"Home Page\" href=\"LawnCareServices.php\">Home</a></li>
				<li><a title = \"Contact Us\" href=\"LawnCareServices_Contact.php\">Contact</a></li>
				<li><a title = \"Examples of Our Work\" href=\"LawnCareServices_Portfolio.php\">Portfolio</a></li>
				<li><a title = \"Employee Portal Log In\" href=\"LawnCareServices_LogIn.php\">Log In</a></li>");
		print("</div>");		
		
		//employee portal left containter		
		print("<div class=\"leftemployeeportal\">");
						
		//print("<button type=\"submit\">View Account</button>");
		print("<input type = \"submit\" formaction=\"LawnCareServices_EmployeePortal_ViewAccount.php\" title = \"View Account\" class=\"button\" value = \"View Account\">");
		print("<input type = \"submit\" formaction=\"LawnCareServices_EmployeePortal_EnterAccount.php\" title = \"Enter Account\" class=\"button\" value = \"Enter Account\">");			
		print("</div>");
		
		//employee portal right container
		print("<div class=\"rightemployeeportal\">");
		
		//Connect to database
		$conn = odbc_connect('LawnCareServicesdsn','','');
	
		//Output error if database connection fails
		if (!$conn)
		{
			exit("Connection Failed: " . $conn);
		}
		
		//look up customer account information if we already have a name to go by
		if (!empty ($firstName) && !empty($lastName))
		{	
			$sql="SELECT * FROM customerTable WHERE customerLastName = '$lastName' AND customerFirstName = '$firstName'";
			$rs=odbc_exec($conn,$sql);
			if (!$rs)
			{
				exit("Error in SQL");
			}
			
			$firstName = odbc_result($rs,"customerFirstName");			
			$lastName = odbc_result($rs,"customerLastName");
			$streetAddress = odbc_result($rs,"customerStreetAddress");
			$streetAddress2 = odbc_result($rs,"customerStreetAddress2");
			$city = odbc_result($rs,"customerCity");
			$state = odbc_result($rs,"customerState");
			$zipcode = odbc_result($rs,"customerZipcode");
			$phoneAreaCode = odbc_result($rs,"customerPhoneAreaCode");
			$phonePrefix = odbc_result($rs, "customerPhonePrefix");
			$phoneNumber = odbc_result($rs, "customerPhoneNumber");
			$balance = odbc_result($rs,"customerBalance");
			$email = odbc_result($rs, "customerEmail");
			
			//Alert user that no record was found
			if ($firstName == "" && $lastName == "")
			{
				print("<h3>No Records Found</h3>");
			}
			
			//Print out account found
			else
			{					
				print("</br>");
				print("</br>");
				print("</br>");
				print("<table>");				
					print("<tr>
						<td>$firstName</td>
						<td>$lastName</td>
					</tr>
					<tr>
						<td rowspawn=\"2\">$streetAddress</td>
					</tr>
					<tr>
						<td rowspawn=\"2\">$streetAddress2</td>
					</tr>
					<tr>
						<td>$city</td>
						<td>$state</td>
					</tr>
					<tr>
						<td rowspawn=\"2\">$zipcode</td>
					</tr>
					<tr>
						<td rowspawn=\"2\">($phoneAreaCode)$phonePrefix-$phoneNumber</td>
					</tr>
					<tr>
						<td rowspawn=\"2\">$email</td>
					</tr>
					<tr>
						<td>Balance:</td>
						<td>$balance</td>
					</tr>");			
				print("</table>");
			}		
		}
		//We don't have a name to look up yet
		else
		{
			print("</br>");
			print("</br>");
			print("</br>");
				print("<table>
					<tr>
						<td>Customer First Name:</td>
						<td><input type=\"text\" size=\"25\" name=\"firstName\" value=$customerFirstName></td>
					</tr>
					<tr>
						<td>Customer Last Name:</td>
						<td><input type=\"text\" size=\"25\" name=\"lastName\" value=$customerLastName></td>
					</tr>
					<tr>
						<td><input type = \"submit\" title = \"Submit Form\" class=\"button\" value = \"Submit\"></td>
						<td><input type = \"reset\" title = \"Clear Form\" class=\"button\" value = \"Clear\"></td>
				</tr>
				</table>");
		}		
		print("</div>");
		
				

		
	//there must have been some other error during the log in
	/*else
	{
		print("<h3>Error: Please try again</h3>");
	}*/
?>

</body>

</html>