<?php include 'sql_connection.php'; 
    session_start();
?>
<!DOCUMENT html>
<html>
    <head>
        <?php include "header.php" ?>
    </head>
    <body>
        <nav>
            <div class="nav-bar">
                <ul>
                    <li class="logo" style="float: left;"><a href="list_page.php" style="color: red;">EzBooking</a></li>
                    <li><a href="profile_page.php"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="landing_page.php"><i class="fas fa-home"></i> Home</a></li>
                </ul>
            </div>
        </nav>
        <main>
            <?php 
            $sql = "SELECT * FROM room WHERE name='Hilton Hotel'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="room-container">
                <div class="room-title-container">
                    <p class="sr-block"><?php echo $row["name"]." - ".$row["city"].",".$row["area"]." | Reviews: "//stars |
                        //heart ?>
                        <span style="float: right;">Per Night:<?php echo $row["price"]."&euro;"?></span>
                    </p>
                    <?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image' style='width: 60%; height: auto;'>"?>
                </div>
                <div class="room-info-container">                   
                    <div class="info-guests">
                        <i class="fas fa-user"></i><?php echo $row["count_of_guests"] ?><br>
                        <label for="info-guests">Count of Guests</label>
                    </div>
                    <div class="info-room">
                        <i class="fas fa-bed"></i><?php echo $row["room_type"] ?><br>
                        <label for="info-room">Type of Room</label>
                    </div>
                    <div class="info-parking">
                        <i class="fas fa-car"></i><?php echo $row["parking"] ?><br>
                        <label for="info-parking">Parking</label>
                    </div>
                    <div class="info-wifi">        
                        <i class="fas fa-wifi"></i><?php echo $row["wifi"] ?><br>
                        <label for="info-wifi">Wifi</label>
                    </div>
                    <div class="info-pets">
                        <i class="fas fa-paw"></i><?php echo $row["pet_friendly"] ?><br>
                        <label for="info-pets">Pet Friendly</label>
                    </div>                       
                </div>
                <div class="room-description">
                    <span class="review-labels">Room Description</span>
                    <p><?php echo $row["long_description"] ?></p>
                </div>
                <span class="book-button"><button type="button">Book Room</button></span>
                <div class="map">
                <?php echo "<iframe src='https://maps.google.com/maps?q=" . $row["lat_location"] . ',' . $row["lng_location"] . "&hl=es;z=14&amp;output=embed'></iframe>" ?>
                </div>
            <?php
                }
            }
            ?>
                <div class="hotelroom-reviews-container">
                    <span class="review-labels">Reviews</span>
                    <ol>
                        <li>
                            username //stars<br>
                            add time 472470924709
                        </li>
                    </ol>
                </div>
                <div class="hotelroom-reviews-add">
                    <form>
                        <span class="review-labels">Add Review</span>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5"><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                        <textarea rows="4" cols="50" placeholder="Add Review">
                        </textarea><br>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </body>
</html>