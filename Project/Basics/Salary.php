<?php

     $Name="";
	 $Gender="";
	 $Marital="";
	 $Department="";
	 $BasicSalary="";
	 $Ta="";
	 $Da="";
	 $Hra="";
	 $Lic="";
	 $Pf="";
	 $Net="";
	 $Deduction="";
	  if(isset($_POST["btn_submit"]))
	  {
		  $Firstname=$_POST["first_name"];
		  $Lastname=$_POST["last_name"];
		  $Gender=$_POST["gender"];
		  $Marital=$_POST["btn"];
		  $Department=$_POST["department"];
		  $BasicSalary=$_POST["basicsalary"];	 
		  $Name=$Firstname." ".$Lastname; 
	  if($Basicsalary>=10000)
	   {
		  $Ta=$BasicSalary*.40;
		  $Da=$BasicSalary*.35;
		  $Hra=$BasicSalary*30;
		  $Lic=$BasicSalary*.25;
		  $Pf=$BasicSalary*20;
		  $Deduction=$Lic+$Pf;
		  $Net=$BasicSalary+$Ta+$Da+$Hra+$Deduction;
	  }
	  else if($Basicsalary>=5000 && $Basicsalary<10000)
	  {
		  $Ta=$BasicSalary*.35;
		  $Da=$BasicSalary*30;
		  $Hra=$BasicSalary*25;
		  $Lic=$BasicSalary*.20;
		  $Pf=$BasicSalary*15;
		  $Deduction=$Lic+$Pf;
		  $Net=$BasicSalary+$Ta+$Da+$Hra+$Deduction;
	  }
	  else
	  {
		  $Ta=$BasicSalary*.35;
		  $Da=$BasicSalary*.25;
		  $Hra=$BasicSalary*.20;
		  $Lic=$BasicSalary*.15;
		  $Pf=$BasicSalary*.10;
	      $Deduction=$Lic+$Pf;
		  $Net=$BasicSalary+$Ta+$Da+$Hra+$Deduction;
	  }
	  if($Gender=="male")
	  {
		  $Name="Mr"." ".$Name;
	  }
	  else if($Gender=="female" && $marital=="married")
	  {
		  $Name="Mrs"." ".$Name;
	  }
	  else
	 
	  {
		  $Name="Ms"." ".$Name;
	  }
	  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
	<form method="post">
		<table border="2" align="center">
    			<tr>
      			  	<th>First name</th>
     			   	<td><input type="text" name="first_name"></td>
    			</tr>
    			<tr>
       				 <th>Last name</th>
       			 	 <td><input type="text" name="last_name"></td>
		   	 </tr>
  			 <tr>
        			<th>Gender</th>
  				<td><input type="radio" name="gender" value="male">Male  
		            <input type="radio" name="gender" value="female">Female</td>
    			</tr>
			<tr>
				<th>Marital</th>
				<td><input type="radio" name="btn" value="Single">Single
				    <input type="radio" name="btn" value="Married">Married</td>
			</tr>
			<tr>
   			
				<th>Department</th>	
                
                <td>
				<select name="department">
                <option value=" ">--Select--</option>
				<option value="BCA">bca</option>
				<option value="BTTM">bttm</option>
				<option value="BCOM">bcom</option>
				</select>
                
                </td>
			</tr>
            
			<tr> 
				<th>Basic salary</th>
				<td><input type="text" name="basicsalary"></td>
			</tr>
            
            <tr>
            <td colspan="2" align="center">
		
			<input type="submit" value="submit" name="btn_submit">
			<input type="reset" value="cancel" name="btn_cancel">
            </td>
            </tr>
		</table>
		<table border="2" align="center">
			<tr>
				<th>Name</th>
				<td><?php echo $Name ?></td>
			</tr>
			<tr>
				<th>Gender</th>
                <td><?php echo $Gender?></td>
			</tr>
			<tr>
				<th>Marital</th>
				<td><?php echo $Marital?></td>
			</tr>
                        <tr>
				<th>Department</th>
				<td><?php echo $Department?></td>
			</tr>
			<tr>
				<th>Basic Salary</th>
				<td><?php echo $BasicSalary?></td>

			</tr>
			<tr>
				<th>TA</th>

				<td><?php echo $Ta?></td>
			</tr>
			<tr>
				<th>DA</th>
				<td><?php echo $Da?></td>
			</tr>
			<tr>
				<th>HRA</th>
				<td><?php echo $Hra?></td>
			</tr>
			<tr>
				<th>LIC</th>
				<td><?php echo $Lic?></td>				
			</tr>

			<tr>
				<th>PF</th>

				<td><?php echo $Pf?></td>
			</tr>
			<tr>
				<th>DEDUCTION</th>

				<td><?php echo $Deduction?></td>
			</tr>
			<tr>
				<th>NET</th>
				<td><?php echo $Net?></td>
			</tr>

		</table>
         </form>
		</body>
		</html>

		
                       
