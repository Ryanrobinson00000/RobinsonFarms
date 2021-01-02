

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>buyCowsPage1</title>
    <link rel="stylesheet" href="style.css">
    <style>img[alt="www.000webhost.com"]{display:none;}</style>
</head>

    <!-- php -S localhost:4000-->
    <!-- http://localhost:4000/Downloads/farmWebsite/buyCows1.php to test locally -->

<!--Performs start() when body is loaded -->
<body onload="start()">

 
  
  <?php

//includes header file
 include ("header.html");
?>
    <!-- php -S localhost:4000-->
    <!-- http://localhost:4000/Downloads/farmWebsite/buyCows1.php to test -->

<!--sets page formating through id and performs clear on formatting to allow for proper formatting-->
<div id="pageDiv".clear { clear: both; }>
    <?php
   


//adds buyCowInfo file which stores cow information 
 include ("buyCowsInfo.php");

 //gets page number
$page = basename($_SERVER['PHP_SELF']);
$page = str_replace("buyCows","",$page);
$page = str_replace(".php","",$page);

//if there are no cows display that there are no cows
if($numberCows==0)
{
echo "<h2> There are currently no cows/calves actively being sold at this time.<a href='contact.html'>Click here</a> for various methods of contacting us regarding our cattle.</h2>" ;
}
//if there are cows available, display those cows according to page numberx15
else{
  //loops for up to 15xpage number
 for ($x = 1+(($page-1)*15); $x <= $page*15; $x++)
 {
   //performs cow addition if there is another cow
if($x <=$numberCows)
 perform($x, $text, $cowTag, $cowId);

 }
}
  echo '</div>';














  //adds cow information
    function perform($placement, $text, $tag, $idNum){
        

    //creates div for cow and formats with class
    $cowIdentification='<div class="img-with-text" id="cow';
    //gets placement in file by modulating by max number of cows per page
    $cowIdentification .= $placement%15;
    $cowIdentification .= '">';
echo $cowIdentification;
 

//gets corresponding cow image
 $a='<img src="img/cow';
 $a .= $idNum[$placement];
 $a .= '.jpg">';
 
echo $a;

//sets cow information/text
echo '<div>';
echo '<p>';
echo $text[$placement];
echo $idNum[$placement];
echo $tag[$placement];
echo '</p>';



echo '<br>';
//sets cow's add/remove button to match its number
$buttonSetter='<button id="cow';
$buttonSetter .= $idNum[$placement];
$buttonSetter .= 'Button" type="button" onclick="addToList(this.id); add(this.id); ">';
$buttonSetter .='Add</button>';
echo $buttonSetter;

$idNum[$placement];
//close cowtext div

echo '</div></div>';

$buttonCheck= "cow";
$buttonCheck .= $idNum[$placement];
$buttonCheck .= 'Button';

//tracks array of cows chosen and removed from chosen list using local storage
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




 


  
   
    

    
</body>
<script>
//////////////////////////////////////////////////////////////////////////////

//performs setPageNumber when body opens
function start()
{
  setPageNum();
}

//performs addition/removal to/from list
function addToList(clicked_id)
{
  //gets clicked id of button
  var cowChosen= clicked_id.toString();
  //gets list of cows chosen
    var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];


  // if cow is to be added add cow
  if(document.getElementById(clicked_id.toString()).innerHTML !="Remove")
    {
  //add cow to array
  cowsChosenArray.push(cowChosen);
  //set local storage for cowsChosenArray
  localStorage.setItem('cowsChosenArray', JSON.stringify(cowsChosenArray));
//sets length to 0, will be used in for loop below
 var length = 0;


    }
    //performs if removal is to occur
else{
  const index = cowsChosenArray.indexOf(clicked_id.toString());
  //if there is a cow selected, remove that cow using splice and add updated to localstorage
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

//adds file that determines total number of catalog pages
include ("oneOfX.php");
//centers buttons
echo '<div id="centerButtons">';
//makes removeall button
echo '<button type="button" id="remove" onclick="removeAll(this.id)">Remove All</button>';
//adds button to go to email page
echo '<button><a href="email.php">Get Info on Selected Cows</a href></button>';
echo '</div>';
?>

</footer>
<script>
  //removes all cows selected from list of cows selected and updates to localstorage
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


