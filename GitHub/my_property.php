<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Properties</title>
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
                    <h3 class="title-d">Properties</h3>
                </div>
                <div class="container">
                    <div class="row align-items-center" style="padding: 15px;">
                        <?php
                        $query= "select property_title, image, price, address from property;";
                        $result = mysqli_query($con,$query);
                        if(mysqli_num_rows($result)>0){
                            while($row= mysqli_fetch_assoc($result)){
                                ?>
                                <div class="col-md-4" >
                                        <div class="card" style="padding:15px;">
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <img class="rounded center" height="60px" width="80px" src='images/<?php echo $row['image'] ?>' alt="">
                                                    </div>
                                                    <?php
                                                    if($_SESSION['user_type']=="admin" || $_SESSION['user_type']=="land owner"){

                                        
                                                    
                                                    
                                                    ?>
                                                    <div class="col-md-3">
                                                        </br>
                                                        <a href="deleteproduct.php?product_id=<?php echo $saxophone_id;?>" class="btn btn-danger">Delete</a>
                                                    </div>
                                                        <?php
                                                    } ?>
                                                </div>
                                                <div class="row">
                                                    <div class="card-body">
                                                        <h3 class="card-title">
                                                            <?php echo $row['property_title']; ?>
                                                        </h3>
                                                        <p class="card-text"><b>Address:</b> <?php echo $row['address']; ?></p>
                                                        <p class="card-text"><b>Price:</b> $<?php echo $row['price']; ?></p>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        </br>
                                    </div>
                                <?php
                            }
                        }else{ echo ""; }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>