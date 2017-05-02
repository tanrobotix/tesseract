<?php
        //connect to database
       $conn = mysqli_connect('localhost', 'root');
       mysqli_select_db($conn, "medicine") or die (mysqli_error($con));//"Could not find the database");
  $output = "";
        mysqli_set_charset($conn,"utf8");
        if(isset($_REQUEST['btnbutton'])){
            $search = $_REQUEST['txtsearch'];
            if ($search !=""){
                $query = mysqli_query($conn, "SELECT * FROM medicines WHERE TEN LIKE '%$search%' OR CHIDINH LIKE '%$search%'")
                        or die ("Could not search");
                $result = mysqli_num_rows($query);
                if($result == 0){
                    //ket qua tim kiem = 0
                    $output .= "<span style ='color:red;'>No result with keywords '$search'</span>";
                }else{
                    //Ket qua tim kiem > 0
                    $output .= "<span style ='color:blue;'><br>All result with keywords '$search': $result</span>"
                            . "<br><hr style='width: 200px; float: left;'><br>";
                    while($row = mysqli_fetch_array($query)){
                        //Khai bao bien va gan gia tri, cac truong duoc lay tu database
                       
                        $TEN = $row['TEN'];
                        $CONGTHUC = $row['CONGTHUC'];
                        $CHIDINH = $row['CHIDINH'];
                        $CHONGCHIDINH = $row['CHONGCHIDINH'];
                      
                        $output .= "<br><div>$TEN<br>"
                                . "$CONGTHUC<div><br><hr style='width: 200px; float: left;'><br><div>"
                                . "$CHIDINH<div><br><hr style='width: 200px; float: left;'><br><div> "
                                . "$CHONGCHIDINH<div><br><hr style='width: 200px; float: left;'><br><div> "  ;
                    }
                }
            }else{
                //khong co ky tu duoc nhap
                $output .= "<span style='color: blue ;'>Please enter your keywords</span>";        
            }
        }
          
?>
<html>
<head>
        <meta charset="UTF-8">
        <title>Search</title>          
</head>
        <link rel="stylesheet" href="newcss.css">
    <body>
       <!-- <div id="jdi"><img width="100%" height="100%" src="img/freljord-gatewayhowling.jpg" /></div> -->
             <div style="font-family: Helvetica Neue ; font-size: 16px; color: black;">
                <form action="#" method="REQUEST">
                    <input action="process.php" class="search" autocomplete="off" type="text" data-modulenumber="1" name="txtsearch" maxlength="2048" placeholder="  Enter your keywords"/>
                    <input type="submit" class="button" name="btnbutton" value="Search"/>
                
            </form>
                  <?php echo $output 
                  ?>
         </div>
    </body>
</html>