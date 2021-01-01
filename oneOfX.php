<?php
include ("index.html");
?>


<body>

    <?php
    include ("buyCowsInfo.php");
    echo '<div id="centerInfo">';
    

    echo '<ul id="list">';
    for($x=0;$x< ceil($numberCows/15); $x++)
    {
        $listAdd='<li>';
        $listAdd .='<a href="buyCows';
        $listAdd .=$x+1;
        $listAdd .='.php">';
        
        $listAdd .= ($x+1);
        $listAdd .="</a></li>";
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