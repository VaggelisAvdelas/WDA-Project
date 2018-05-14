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

                <?php include "filters.php"; ?>
                <?php include "results.php"; ?>

            </div> 

            <!--scripts -->
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $( function() {                    
                    $( "#datepicker1" ).datepicker();
                    $( "#datepicker2" ).datepicker();
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