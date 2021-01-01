<?php
include ("index.html");
?>


<body>
    
<h1>Robinson Farms</h1>
<h3> In order to get a price quote and information about our products and services, please fill out the form below or give us a call at (501)580-3461.</h3>
<form action="sendMail.php" onsubmit="return validateSubmit();" method="post">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname"><br><br>

        <label for="lname">Last name:</label>
        <input type="text" id="lname" name="lname"><br><br>

        <label for="email">Email:</label>
        <input  type="email" required id="email" name="email"><br><br>

        <label for="phoneNum">phone Number:</label>
        <input type="tel" id="phoneNum" name="phone"
       pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxLength="12" onKeyUp="validatePhoneNumber()"
       required><small>Format: 123-456-7890</small><br><br>

         <label for="commentsBox">Comments</label>
        <textarea id="commentsBox" name="commentsBox" rows="4" cols="50"></textarea><br><br>

        <input type="hidden" id="cowsSelected" name="cowsSelected"><script>
            
                var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];

                for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)){
                    document.getElementById("cowsSelected").value=  "";

                }

              

                for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {     

                 document.getElementById("cowsSelected").value=   document.getElementById("cowsSelected").value+cowsChosenArray[k]; 
                 document.getElementById("cowsSelected").value = document.getElementById("cowsSelected").value.replace('Button',' ');
                
                
           
                  }  
                 if(document.getElementById("cowsSelected").value==  ""){
                    document.getElementById("cowsSelected").value=  "**No cows were selected** ";

                 }
  
                 
</script>   
   
        <button  type="submit" name="submit">Send Email</button><br><br>
    </form> 
    <button onclick="goBack()">Go Back</button>

   

    <h2 id="selectionLabel">Selected Cows are displayed below.<script> 
            var cowsChosenArray = JSON.parse(localStorage.getItem('cowsChosenArray')) || [];

            var cowList = new Array();
            var cowName;
            var length=0;
               for(var k in cowsChosenArray) if(cowsChosenArray.hasOwnProperty(k)) {   
                length++;  
                //<img src="image.png" onerror="imgError(this);"/>
                //<img src="img_girl.jpg" alt="Girl in a jacket">
                cowName='img/';
                cowName=cowName+ cowsChosenArray[k].replace('Button','');
                cowName=cowName+'.jpg ';

                 cowList.push(cowName);
               }
               
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
   if(document.getElementById("fname").value=="")
        return false;
    if(document.getElementById("lname").value=="")
        return false;
 


    return true;
}
function validatePhoneNumber()
{

  document.getElementById("phoneNum").value 		
  var userInput = document.getElementById("phoneNum").value.replace(/\D/g,'');
  var firstThree=userInput.substr(0,3);
  var secondThree=userInput.substr(3,3);
  var lastFour=userInput.substr(6,4);
  
  if(userInput.length>6)
 {
  document.getElementById("phoneNum").value=firstThree+"-"+secondThree+"-"+lastFour;

 }
 else if(userInput.length>3){
  document.getElementById("phoneNum").value=firstThree+"-"+secondThree;
 }
else{
  document.getElementById("phoneNum").value=firstThree;
}

}


function goBack() {

  window.history.back();
}

</script>

</html>


