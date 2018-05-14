<div class="hotelroom-reviews-container">
    <span class="review-labels">Reviews</span>
    <ol>
        <?php
        $sql = "SELECT rate, text, date_created, user.username FROM reviews INNER JOIN user ON user.user_id = reviews.user_id WHERE room_id = $hotel_id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != NULL) {
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) { ?>
                    <li>
                        <?php
                            echo $row["username"];
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
                            };
                            echo "<br>";
                            echo $row["date_created"];
                            echo "<br>";
                            echo $row["text"];
                        ?>
                    </li>
            <?php
                }
            }
        }else {
            echo "Be the first one to review this room!";
        }
        ?>
    </ol>
</div>