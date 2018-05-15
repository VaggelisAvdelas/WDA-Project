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
            <div class="profile-container">
                <div class="reviews-container-left">
                    <!-- Favorites not working, didn't have time to implement them 
                        Button exists in room_page but does nothing when clicked -->
                    <span class="red-labels">FAVORITES</span>
                    <div class="favorites-container">
                        <ol>
                            <li>Megali Vretania Hotel</li>
                        </ol>
                    </div>
                    <span class="red-labels">REVIEWS</span>
                    <div class="reviews-container">
                        <dl class="reviewed-hotels">
                            <?php
                            $sql = "SELECT rate, name FROM reviews, room WHERE reviews.room_id = room.room_id";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) { ?>
                                    <dt> <?php echo $row["name"] ?></dt>
                                    <dd>
                                        <div class="rating"> 
                                            <?php 
                                            switch ($row["rate"]) {
                                                case 1:
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    break;
                                                case 2:
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    break;
                                                case 3:
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    break;
                                                case 4:
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star'></span>";
                                                    break;
                                                case 5:
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    echo "<span class='fa fa-star checked'></span>";
                                                    break;
                                            }; ?>
                                        </div>
                                    </dd>
                                <?php
                                }
                            } ?>
                        </dl>
                    </div>
                </div>

                <div class="results-container-right">
                    <p class="sr-block">Search Results</p>

                    <?php
                    $sql = "SELECT check_in_date, check_out_date, bookings.room_id, name, city, area, photo, room_type.room_type, price, short_description from bookings, room, room_type WHERE bookings.room_id = room.room_id and room.room_type = room_type.id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) { ?>

                        <div class="hotel-container">
                            <span><?php echo "<img src='images/rooms/".$row["photo"]."' alt='room-image'>"?></span>
                            <div class="hotel-text">
                                <span><?php echo $row["name"];?></span><br>
                                <span style="font-size: 14px;"><?php echo $row["city"].",".$row["area"]?></span>
                                <p><?php echo $row["short_description"]?></p>
                                <a href="room_page.php?room_id=<?php echo $row["room_id"]?>">Go to Room Page</a>
                            </div>
                            <div class="hotel-price-container">
                                <div class="hotel-price">
                                    <span>Total Cost: <?php echo $row["price"] ?> &euro;</span>
                                </div>
                                <div class="hotel-room">
                                    <span>Check-In Date: <?php echo $row["check_in_date"] ?></span>
                                    <span>Check-Out Date: <?php echo $row["check_out_date"] ?></span><br>
                                    <span><?php echo "Type of Room: ".$row["room_type"] ?></span>
                                </div>
                            </div>
                        </div>

                        <?php 
                        }
                    }
                    ?>
                </div>
            </div>
        </main>
        <?php include "footer.php"?>
    </body>
</html>
<?php mysqli_close($conn); ?>