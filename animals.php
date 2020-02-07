<!DOCTYPE html>
<html>
  <!--
	this PHP page demonstrates the PHP use of an array lookup as well as displaying an image in html using php. Also, it shows 
	how to open a text file and write each line of the file it in the html.
  -->
  <head>
    <title>PHP-Zoo</title>
  </head>
  
    <?php
	$iName = $_POST['iName'];		//read input from thr form
	$selectAnimal = $_POST['selectAnimal'];	//read selectAnimal input from the form
	$destination = "theZoo/";			//the directory
	$textDestination = $destination.$selectAnimal.".txt";	//path to text file
	$imageDestination = $destination.$selectAnimal.".jpg";	//path to jpg file
	$myfile = fopen($textDestination, "r") or die("Unable to open file!");	//open file. Show error if unable to read
	$colors = array("purple","blue","green", "orange","maroon", "gray");    //colors for different animal information
	$animals = array ("Elephant","PolarBear", "Peafowl", "Lion", "Tiger", "Wolf"); //array of chosen animals

    ?>
  
   <body>
   <p>Hello <b><i><?php print($iName); ?> </i></b>. Here is an image and some information about <b><i><u><?php echo $selectAnimal ?></u></i></b>.</p>
   <br>
   
   <table>
   <tr>
   <!-- Dispay the image using the path to jpg. -->
   <td><?php echo "<img src= '$imageDestination'>" ?></td>
   <td align="center">
   <?php
			
			
			echo "<h2 align='center'> $selectAnimal</h2>";
			$i = 0;
			
			//check which animal is chosen and change the color of the fonts accordingly
			
			for($i = 0; $i<6; $i++)					
			{
				if($animals[$i] == $selectAnimal)		
				{
					echo"<font color='$colors[$i]'";
				}
			}	
		
			//write every single line until the end is reached
			while (! feof ($myfile)) 
			{ 
				echo fgets($myfile); 
				echo "<br>";
			} 
			//close the file
			fclose($myfile);
	?>
	</td>
   </tr>
   </table>
  
  </body>

</html>