<?php
include ("index.html");
?>


<body>
    <!-- Robinson Farms title-->
<h1>Robinson Farms</h1>
<!-- Notify customer of alternative method of communication if problem occurs with email-->
<h3> In order to get a price quote and information about our products and services, please fill out the form below or give us a call at (501)580-3461.</h3>
<!-- send email form-->
<form action="sendMail.php" onsubmit="return validateSubmit();" method="post">
<!--textbox for firstname -->
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br><br>
<!-- textbox for last name-->
        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname"><br><br>
<!-- email input for email-->
        <label for="email">Email:</label>
        <input  type="email" required id="email" name="email"><br><br>
<!-- phone number input for phone-->
        <label for="phoneNum">phone Number:</label>
        <input type="tel" id="phoneNum" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxLength="12" onKeyUp="validatePhoneNumber()"
       required><small>Format: 123-456-7890</small><br><br>
<!-- allows user to input a comment-->
         <label for="commentsBox">Comments</label>
        <textarea id="commentsBox" name="commentsBox" rows="4" cols="50"></textarea><br><br>
<!--keeps track of selected cows -->
        <input type="hidden" id="cowsSelected" name="cowsSelected"><script>
//gets cows chosen from localhost
                var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];
//
     //           for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)){
       //             document.getElementById("cowsSelected").value=  "";

         //       }

              
//gets cowId value from every selected cow by removing corresponding "button" concatenation
                for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {     

                 document.getElementById("cowsSelected").value=   document.getElementById("cowsSelected").value+cowsChosenArray[k]; 
                 document.getElementById("cowsSelected").value = document.getElementById("cowsSelected").value.replace('Button',' ');
                
                
           
                  }  
                  //if the value of hte selected cows is 0, no cows were selected and it should be displayed taht no cows were selected
                 if(document.getElementById("cowsSelected").value==  ""){
                    document.getElementById("cowsSelected").value=  "**No cows were selected** ";

                 }
  
                 
</script>   
   <!-- submission button -->
        <button  type="submit" name="submit">Send Email</button><br><br>
        <!--  end of form-->
    </form> 
    <!-- button to go back to catalog -->
   <button> <a href="buyCows1.php" >Go Back to Catalog</a></button>

   
                 <!-- label for selected cows -->
    <h2 id="selectionLabel">Selected Cows are displayed below.
      <script> 
      //gets cow chosen arrray from selected localstorage
            var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];
      //creates new array for the list of cows
            var cowList = new Array();
            var cowName;
            var length=0;
      //iterates for length of cows chosen
               for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {   
                length++;  
                //<img src="image.png" onerror="imgError(this);"/>
                //<img src="img_girl.jpg" alt="Girl in a jacket">
                cowName='img/';
                cowName=cowName+ cowsChosenArray[k].replace('Button','');
                cowName=cowName+'.jpg ';
                //adds cow image to the list of images
                 cowList.push(cowName);
               }
               //if there are no images notify user no cows were selected
               if(length==0)
               {
                 document.getElementById("selectionLabel").innerHTML="No Cows were selected";
               }


          

                 // cowList = ['img/cow1.jpg', 'img/cow2.jpg', 'img/cow3.jpg']; //your assumed array
cowList.forEach(function(image) {  
  
  // for each link l in ArrayOfImages
  var img = document.createElement('img'); // create an img element

  //if cow has been removed
img.onerror = function(){
  // image not found or change src like this as default image:
  document.body.append("A Cow has been removed since you added it to your list. This cow will be unavailable.");          // append it to the body 

};



  img.src = image;                         // set its src to the link l
  document.body.appendChild(img);          // append it to the body 
});
</script></h2>

    <!-- php -S localhost:4000-->
    <!-- http://localhost:4000/Downloads/farmWebsite/buyCows1.php to test -->
   
</body>
<script>

//add check to validateSubmit
function validateSubmit() {
  //ensures first name isn't null
   if(document.getElementById("fname").value=="")
        return false;
  //ensures last name isn't null
    if(document.getElementById("lname").value=="")
        return false;
 

    // if neither are null delete
    return true;
}

//validate phone number
function validatePhoneNumber()
{
//validates phone number
  document.getElementById("phoneNum").value;
  //removes all nondigit values from phone number input
  var userInput = document.getElementById("phoneNum").value.replace(/\D/g,'');
  //get first 3 letters from phone number
  var firstThree=userInput.substr(0,3);
  //get second 3 letters from phone number
  var secondThree=userInput.substr(3,3);
  //gets the last 4 number from the phone number
  var lastFour=userInput.substr(6,4);
  
  //appends full phone number if the number of digits is greater than 6
  if(userInput.length>6)
 {
  document.getElementById("phoneNum").value=firstThree+"-"+secondThree+"-"+lastFour;

 }
 //appends first 6 digits of phone number if digits is greater than 3
 else if(userInput.length>3){
  document.getElementById("phoneNum").value=firstThree+"-"+secondThree;
 }
 //appends only first 3 digits if less than 3 digits
else{
  document.getElementById("phoneNum").value=firstThree;
}

}



</script>

</html>


