<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!--css-->
    <link rel="stylesheet" href="..\adminStuff\adminPageStyles.css?v=1.04">
</head>

<body>
    <header style="padding-bottom:1px;">
        <nav class="menu">
            <ul class="menu">
                <li>
                    <a href="..\html\main.html"> Main page </a>
                </li>
                <li>
                    <a href="..\adminStuff\adminLogin.html"> Logout </a>
                </li>
            </ul>
        </nav>
    </header>

    <div class="datatable">
        
        <?php
        error_reporting(0);
        $dbUser = 'admin';
        $dbName = 'adminorders';
        $dbPass = 'root';
        //$dbtable = "orders";
        $mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);
        $result = $mysqli->query("SELECT * FROM `orders` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>Smartphone orders</h1>';
        if(isset($_GET['del'])){
            $id = $_GET['del'];
            $query = "DELETE FROM `orders` WHERE `id`='$id'";
            mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            header('Refresh: 0.7; url=adminPage.php');
        }
        if (mysqli_num_rows($result) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?confp=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?del=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
        } else {
            echo 'No Data';
        }
        // if(isset($_GET['confp'])){
        //     $subject='a.romashko.work@mail.ru';
        //     require 'phpmailer/PHPMailerAutoload.php';
        //     $mail = new PHPMailer;
        //     $mail->Host='smtp.gmail.com';
        //     $mail->Port=587;
        //     $mail->SMTPAuth=true;
        //     $mail->SMTPSecure='tls';
        //     $mail->Username='romanton97dude@mail.ru';
        //     $mail->Password='lolmostyblrlol';

        //     $mail->setFrom($data['email'], $data['name']);
        //     $mail->addAddress('a.romashko.work@mail.ru');
        //     $mail->addReplyTo($data['email'], $data['name']);

        //     $mail->isHTML(true);
        //     $mail->Subject='Anton Romashko';
        //     $mail->Body='<h1 align=center>Name : '.$data['name'].'<br />Email: '.$data['email'].'<br />Message: Your product has succesfully sent!';

            
        //     echo '<script>alert("Message succesfully sent!")</script>';
        // }
        $result2 = $mysqli->query("SELECT * FROM `orders_laptops` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>Laptop orders</h1>';
        if (mysqli_num_rows($result2) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result2)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?confl=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?dellap=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
            if(isset($_GET['dellap'])){
                $id = $_GET['dellap'];
                $query = "DELETE FROM `orders_laptops` WHERE `id`='$id'";
                mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                header('Refresh: 0.7; url=adminPage.php');
            }
        } else {
            echo 'No Data';
        }
        if(isset($_GET['confl'])){
            echo '<script>alert("Message succesfully sent!")</script>';
        }
        if(isset($_GET['confa'])){
            echo '<script>alert("Message succesfully sent!")</script>';
        }
        if(isset($_GET['confw'])){
            echo '<script>alert("Message succesfully sent!")</script>';
        }
        if(isset($_GET['conftv'])){
            echo '<script>alert("Message succesfully sent!")</script>';
        }
        if(isset($_GET['confhp'])){
            echo '<script>alert("Message succesfully sent!")</script>';
        }
        $result3 = $mysqli->query("SELECT * FROM `orders_accessories` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>Acessories orders</h1>';
        if (mysqli_num_rows($result3) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result3)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?confa=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?delacc=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
            if(isset($_GET['delacc'])){
                $id = $_GET['delacc'];
                $query = "DELETE FROM `orders_accessories` WHERE `id`='$id'";
                mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                header('Refresh: 0.7; url=adminPage.php');
            }
        } else {
            echo 'No Data';
        }

        $result4 = $mysqli->query("SELECT * FROM `orders_watches` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>Watch orders</h1>';
        if (mysqli_num_rows($result4) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result4)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?confw=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?delwatches=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
            if(isset($_GET['delwatches'])){
                $id = $_GET['delwatches'];
                $query = "DELETE FROM `orders_watches` WHERE `id`='$id'";
                mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                header('Refresh: 0.7; url=adminPage.php');
            }
        } else {
            echo 'No Data';
        }

        $result5 = $mysqli->query("SELECT * FROM `orders_tvs` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>TV orders</h1>';
        if (mysqli_num_rows($result5) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result5)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?conftv=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?deltvs=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
            if(isset($_GET['deltvs'])){
                $id = $_GET['deltvs'];
                $query = "DELETE FROM `orders_tvs` WHERE `id`='$id'";
                mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                header('Refresh: 0.7; url=adminPage.php');
            }
        } else {
            echo 'No Data';
        }

        $result6 = $mysqli->query("SELECT * FROM `orders_headphones` ORDER BY `id` DESC LIMIT 15");
        echo '<h1>Headphones orders</h1>';
        if (mysqli_num_rows($result6) > 0) {
            echo '<table style="border-top: 3px solid rgb(0, 0, 0);
            border-bottom: 3px solid rgb(0, 0, 0);"><tr><td>ID</td><td>Name</td><td>mail</td><td>Product</td><td>Price</td></tr>';
            while ($data = mysqli_fetch_array($result6)) {
                echo '<tr><td>' . $data['id'] . '</td><td>' . $data['name'] . '</td>
                <td>' . $data['email'] . '</td>
                <td>' . $data['product'] . '</td><td>' . $data['price'] . '</td><th><a href="adminPage.php?confhp=' . $data['id'] . '">Confirm</a></th><th><a href="adminPage.php?delhp=' . $data['id'] . '">Delete</a></th></tr>';
            }
            echo '</table>';
            if(isset($_GET['delhp'])){
                $id = $_GET['delhp'];
                $query = "DELETE FROM `orders_headphones` WHERE `id`='$id'";
                mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                header('Refresh: 0.7; url=adminPage.php');
            }
        } else {
            echo 'No Data';
        }
        ?>
        <br />
    </div>
    
    <script src="..\adminStuff\adminJS.js"></script>
</body>

</html>
