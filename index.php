<!DOCTYPE html>
<head><title>Hanny Ko Ko MD5 Cracker</title></head>
    <body>
        <h1>MD5 cracker</h1>
        <p>This application takes an MD5 hash
        of a four digit pin check all 10,000 possible four digit PINs to determine the PIN.</p>
        <pre>
        Debug Output:
        <?php
            $goodtext = "Not found";
            // If there is no parameter, this code is all skipped
            if ( isset($_GET['md5']) ) {
                $time_pre = microtime(true);
                $md5 = $_GET['md5'];

                // This is our alphabet
                // $txt = "0123456789";
                $show = 15;

                // Outer loop to go through the alphabet for the
                // first position in our "possible" pre-hash
                // text
                for($i=0; $i<10; $i++ ) {
                    $no1 = $i;   // The first number

                    // Our inner loop. Note the use of new variables
                    // $j and $no2 
                    for($j=0; $j<10; $j++ ) {
                        $no2 = $j;  // the second number

                        for($k=0; $k<10; $k++ ) {
                            $no3 = $k;  // the third number

                                for($l=0; $l<10; $l++ ) {
                                    $no4 = $l;  // the fourth number

                                    // Concatenate the four numbers together to 
                                    // form the "possible" pre-hash pin
                                    $try = $no1.$no2.$no3.$no4;

                                    // Run the hash and then check to see if we match
                                    $check = hash('md5', $try);
                                    if ( $check == $md5 ) {
                                        $goodtext = $try;
                                        break;   // Exit the inner loop
                                    }

                                    // Debug output until $show hits 0
                                    if ( $show > 0 ) {
                                        print "$check $try\n";
                                        $show = $show - 1;
                                    }
                                }
                            }
                        }
                    }
                
                // Compute elapsed time
                $time_post = microtime(true);
                print "Elapsed time: ";
                print $time_post-$time_pre;
                print "\n";
            }
        ?>
        </pre>
        <!-- Use the very short syntax and call htmlentities() -->
        <p>Original Text: <?= htmlentities($goodtext); ?></p>
        <form>
            <input type="text" name="md5" size="60" />
            <input type="submit" value="Crack MD5"/>
        </form>
        <ul>
            <li><a href="index.php">Reset</a></li>
            <li><a href="md5.php">MD5 Encoder</a></li>
            <li><a href="makecode.php">MD5 Code Maker</a></li>
            <!-- <li><a
                href="https://github.com/csev/wa4e/tree/master/code/crack"
                target="_blank">Source code for this application</a></li> -->
        </ul>
    </body>
</html>

