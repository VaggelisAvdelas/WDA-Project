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
            <div class="results-container">
            
                <?php
                if (isset($_GET["checkin"])){
                    $_SESSION["checkin"] = $_GET["checkin"];
                    $_SESSION["checkout"] = $_GET["checkout"];
                }
                ?> 
                <?php include "filters.php"; ?>
                <?php include "results.php"; ?>

            </div> 

            <!--scripts -->
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {                    
                    $( "#datepicker1" ).datepicker({
                        dateFormat:"dd-mm-yy",
                        minDate: 0,
                        onSelect: function() {
                            var dt2 = $("#datepicker2");
                            var minDate = $(this).datepicker('getDate');
                            var dt2Date = dt2.datepicker('getDate');
                            //difference in days. 86400 seconds in day, 1000 ms in second
                            var dateDiff = (dt2Date - minDate)/(86400*1000);
                            //dt2 not set or dt1 date is greater than dt2 date
                            if (dt2Date == null || dateDiff < 0) {
                                dt2.datepicker('setDate', minDate);
                            }
                            //first day which can be selected in dt2 is selected date in dt1
                            dt2.datepicker('option', 'minDate', minDate);
                        }});
                    $( "#datepicker2" ).datepicker({
                        dateFormat:"dd-mm-yy",
                        minDate: 0});
                } );
            </script>
            <script>
                $( function() {
                  $( "#slider-range" ).slider({
                    range: true,
                    min: 0,
                    max: 600,
                    values: [ 150, 450 ],
                    slide: function( event, ui ) {
                      $( "#amount1" ).val( "€" + ui.values[ 0 ]);
                      $( "#amount2" ).val( "€" + ui.values[ 1 ]);
                    }
                  });
                  $( "#amount1" ).val("€" + $("#slider-range").slider( "values", 0 ));
                  $( "#amount2" ).val("€" + $("#slider-range").slider( "values", 1 ));
                } );
            </script>
        </main>
        <?php include "footer.php" ?>
    </body>
</html>
<?php mysqli_close($conn); ?>