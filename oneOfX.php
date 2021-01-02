<?php
//removes watermark

include ("index.html");
?>


<body>

    <?php
    include ("buyCowsInfo.php");
    echo '<div id="centerInfo">';
    
//creates list to based off of number of number of cows /15 with based of of ceiling of the number aka 0 cows is 1 page 15 cows is 1 page 16 is2 pages
    echo '<ul id="list">';
    for($x=0;$x< ceil($numberCows/15); $x++)
    {
       //creates label from 1 to x and places in on the page as a clickable link 
        $listAdd='<li>';
        $listAdd .='<a href="buyCows';
        $listAdd .=$x+1;
        $listAdd .='.php">';
        
        $listAdd .= ($x+1);
        $listAdd .="</a></li>";

        //adds clickable list item with proper index
        echo $listAdd;
    }
    echo '</ul>'; 
    echo '</div>';
   

   // echo basename($_SERVER['PHP_SELF']);
    ?>

  
</body>

<script>
  
</script>

</html>