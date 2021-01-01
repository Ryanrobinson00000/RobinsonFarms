

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buyCowsPage1</title>
    <link rel="stylesheet" href="style.css">
    <style>img[alt="www.000webhost.com"]{display:none;}</style>
</head>


<body onload="start()">
    <!-- php -S localhost:4000-->
    <!-- http://localhost:4000/Downloads/farmWebsite/buyCows1.php to test -->
 
  
  <?php


 include ("header.html");
?>
    <!-- php -S localhost:4000-->
    <!-- http://localhost:4000/Downloads/farmWebsite/buyCows1.php to test -->

<div id="pageDiv".clear { clear: both; }>
    <?php
   


 
 include ("buyCowsInfo.php");

$page = basename($_SERVER['PHP_SELF']);
$page = str_replace("buyCows","",$page);
$page = str_replace(".php","",$page);
if($numberCows==0)
{
echo "<h2> There are currently no cows/calves actively being sold at this time.<a href='contact.html'>Click here</a> for various methods of contacting us regarding our cattle.</h2>" ;
}
else{
 for ($x = 1+(($page-1)*15); $x <= $page*15; $x++)
 {
if($x <=$numberCows)
 perform($x, $text, $cowTag, $cowId);

 }
}
  echo '</div>';















    function perform($placement, $text, $tag, $idNum){
        

    
    $cowIdentification='<div class="img-with-text" id="cow';
    $cowIdentification .= $placement%15;
    $cowIdentification .= '">';
echo $cowIdentification;
 

     
 $a='<img src="img/cow';
 $a .= $idNum[$placement];
 $a .= '.jpg">';
 
echo $a;

echo '<div>';
echo '<p>';
echo $text[$placement];
echo $idNum[$placement];
echo $tag[$placement];
echo '</p>';



echo '<br>';
$buttonSetter='<button id="cow';
$buttonSetter .= $idNum[$placement];
$buttonSetter .= 'Button" type="button" onclick="addToList(this.id); add(this.id); ">';
//$buttonSetter .=$idNum[$placement];




$buttonSetter .='Add</button>';
echo $buttonSetter;

$idNum[$placement];
//close cowtext div

echo '</div></div>';

$buttonCheck= "cow";
$buttonCheck .= $idNum[$placement];
$buttonCheck .= 'Button';

echo '<script>
var cowsChosenArray = JSON.parse(localStorage.getItem("cowsChosenArray")) || [];
var length=0;
for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)){length++;
if(cowsChosenArray[k]=="'; echo $buttonCheck; echo'")
document.getElementById("'; echo $buttonCheck; echo'").innerHTML="Remove";
    }
</script>
    
';


  }


  ?>
<!--<p id="hello"><script>
    var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];

for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {
  document.getElementById("hello").innerHTML=  document.getElementById("hello").innerHTML + cowsChosenArray[k]; 
}
</script></p>  -->
   <!--close allcows div-->



 


  
   
    

    
</body>
<script>
//////////////////////////////////////////////////////////////////////////////

function start()
{
  setPageNum();
}


function addToList(clicked_id)
{
  var cowChosen= clicked_id.toString();
    var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];


 
  if(document.getElementById(clicked_id.toString()).innerHTML !="Remove")
    {


 


  cowsChosenArray.push(cowChosen);

  localStorage.setItem('cowsChosenArray', JSON.stringify(cowsChosenArray));

 var length = 0;

 //will likely be able to add without this for loop, will likely just be used for verification

    }
else{
  const index = cowsChosenArray.indexOf(clicked_id.toString());
  if (index > -1) {
    cowsChosenArray.splice(index, 1);
    localStorage.setItem('cowsChosenArray', JSON.stringify(cowsChosenArray));

}
  }
 // document.getElementById("hello").innerHTML=  ""; 

  for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {length++;
  //document.getElementById("hello").innerHTML=  document.getElementById("hello").innerHTML + cowsChosenArray[k]; 
      }

 
}

///////////////////////////////////////////////////////////////////////////////

function add(clicked_id)
{  
    //if button is pressed and it doesnt say remove, change value to remove
    if(document.getElementById(clicked_id.toString()).innerHTML !="Remove")
    {
    document.getElementById(clicked_id.toString()).innerHTML="Remove"; 



    
    


    }
    //if button is pressed and it says remove, change shown value to add
    else
    {
    document.getElementById(clicked_id.toString()).innerHTML="Add"; 
   

    }  
}
</script>
<footer>
<?php


include ("oneOfX.php");
echo '<div id="centerButtons">';
echo '<button type="button" id="remove" onclick="removeAll(this.id)">Remove All</button>';
echo '<button><a href="email.php">Get Info on Selected Cows</a href></button>';
echo '</div>';
?>

</footer>
<script>
  function removeAll()
    {
   
 var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];
      for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {
        if(document.getElementById(cowsChosenArray[k])){
        document.getElementById(cowsChosenArray[k]).innerHTML=  "Add"; 
        }
      }
    
     localStorage.clear();
    // document.getElementById("hello").innerHTML=  ""; 
      
    }
</script>

</html>


