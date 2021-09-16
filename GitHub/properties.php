<?php
    include("include/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Properties</title>
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
    
    }
?>

    
    <section class=" section-t4">
        <div class="container">
            <div class="title-box-d">
                <h3 class="title-d">My Properties</h3>
            </div>
            <?php
              $query = "select property.property_id,owner_id, property_title, latitude, longitude, bathroom, living_room, bed_room, kitchen, area, featured, address, price, image from property;";
              $result = mysqli_query($con,$query);  
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-mb-4" >
                <div class="container">

                    <div class="carousel-item-b swiper-slide">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="images/<?php echo $row['image'] ?>" alt="no Images" class="img-a img-fluid">
                            </div>
                            <div class="card-overlay">
                                <div class="card-overlay-a-content">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <a href="property-single.html"><?php echo $row['property_title']; ?></a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">Price | $ <?php echo $row['price']; ?></span>
                                        </div>
                                        <row style="grid-gap: 15px;">
                                            
                                            <a href="inspection.php?property_id=<?php echo $row['property_id']; ?>&owner_id=<?php echo $row['owner_id']; ?>" class="link-a">Click here for Inspection
                                                
                                            </a>
                                            <br/>
                                            
                                            <a href="property_location.php?address=<?php echo $row['address'] ?>" class="link-a">Click here for Location
                                                
                                            </a>
                                        </row>
                                    </div>
                                    <div class="card-footer-a">
                                        <ul class="card-info d-flex justify-content-around">
                                            <li>
                                            <h4 class="card-info-title">Area</h4>
                                            <span><?php echo $row['area']; ?>m
                                                <sup>2</sup>
                                            </span>
                                            </li>
                                            <li>
                                            <h4 class="card-info-title">Beds</h4>
                                            <span><?php echo $row['bed_room']; ?></span>
                                            </li>
                                            <li>
                                            <h4 class="card-info-title">Baths</h4>
                                            <span><?php echo $row['bathroom']; ?></span>
                                            </li>
                                            <li>
                                            <h4 class="card-info-title">Kitchen</h4>
                                            <span><?php echo $row['kitchen']; ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </br>
                </div>
            </div>
            <?php }}else{ echo ""; } ?>
        </div>
    </section>
    
</body>
</html>