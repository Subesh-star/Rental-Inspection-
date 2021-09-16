<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Details</title>
</head>
<body>
<?php
     
     session_start();
     if($_SESSION['user_type']=="land owner"){

         include "include/property_manager_navbar.php"; 
     
     }elseif($_SESSION['user_type']=="customer"){
         
         include "include/customer_navbar.php"; 
     
     }elseif($_SESSION['user_type']=="admin"){
         
         include "include/admin_navbar.php"; 
     
     }?>
     <section class=" section-t4">
    <?php

     $property_id= $_GET['id'];
     $query= "select property_title,latitude,longitude,bathroom,living_room,bed_room,kitchen,area,featured,address,price,image from property where property_id ='$property_id';";
     $result = mysqli_query($con,$query);
     
     if(mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_assoc($result)){
            ?>
        
            <div class="container">
                <div class="title-box-d">
                    <h3 class="title-d"><?php echo $row['property_title']; ?></h3>
                </div>  
            </div> 
            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                                                    
                        <img class="rounded center" height="100%" width="100%" src='images/<?php echo $row['image'] ?>' alt="">
                        
                    </div>
                    <div class="col">

                        <div class="col-md-10">
    
                            <b style="font-size:20px">Location:</b>
                             <?php echo $row['address']; ?>  
             
                        </div> 
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Price:</b>
                             $<?php echo $row['price']; ?>  
             
                        </div>
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Living Room:</b>
                             <?php echo $row['living_room']; ?>  
             
                        </div>
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Bed Room:</b>
                             <?php echo $row['bed_room']; ?>  
             
                        </div>
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Bath Room:</b>
                            <?php echo $row['bathroom']; ?>  

                        </div>
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Kitchen:</b>
                            <?php echo $row['kitchen']; ?>  

                        </div>
                        <div class="col-md-10">
    
                            <b style="font-size:20px">Area:</b>
                             <?php echo $row['area']; ?> sq.feet 
             
                        </div>
                        
                    </div>
                </div>
            </div>

    <?php

        }
     }
    ?>
    </section>
    <script>
        
        window.onload= function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
        }

        function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
        "<br>Longitude: " + position.coords.longitude;
        }

    </script>
    
</body>
</html>