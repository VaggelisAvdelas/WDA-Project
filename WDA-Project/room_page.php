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

            $hotel_id = $_GET["room_id"]; 
            $sql = "SELECT * FROM room WHERE room_id= $hotel_id";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { ?>
                <?php include "room_info.php" ?>

                <?php
                }
            }

            if (isset($_POST["text-review"])) {
                $stmt = $conn->prepare("INSERT INTO reviews(rate, text, date_created, user_id, room_id) VALUES (?,?,?,?,?)");
                $stmt->bind_param("issii", $rating, $text, $date, $user_id, $hotel_id);

                $rating = $_POST["rating"];
                $text = $_POST["text-review"];
                $date = date("Y-m-d H:i:s");
                $user_id = 1;
                $hotel_id = $_GET["room_id"];
                $stmt->execute();

                $stmt->close();
            }

            include "reviews.php"
            ?>
                <div class="hotelroom-reviews-add">
                    <form method="POST" action="">
                        <span class="review-labels">Add Review</span>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5"><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4"><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3"><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2"><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1"><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        </fieldset>
                        <textarea name="text-review" rows="4" cols="50"></textarea>
                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </main>
        <?php include "footer.php"; ?>
    </body>
</html>
<?php mysqli_close($conn); ?>