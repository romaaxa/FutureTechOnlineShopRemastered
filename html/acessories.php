<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--display scale-->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FTS Acessories</title>
    <!--css-->
    <link rel="stylesheet" href="..\css\mainc.css?=1.1">
    <link rel="stylesheet" href="..\css\sortblocks.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="..\bootstrap-4.3.1-dist\css\bootstrap.css">
    <!--g fonts-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!--icons-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <header>
        <nav class="menu">
            <ul class="menu">
                <li>
                    <a href="main.html" class="transition">Home</a>
                </li>
                <li>
                    <a href="#cases">Cases</a>
                </li>
                <li>
                    <a href="#stands">Stands</a>
                </li>
                <li>
                    <a href="shop.html" class="transition">Shop</a>
                </li>
                <li>
                    <a id="date" style="margin-left: 850px;"></a>
                </li>
            </ul>
            <a href="#" id="toggle-btn">Menu</a>
        </nav>
    </header>
    <div style="background-color: #0E0B16">
        <div id="phones" class="section">
            <div class="container">
                <div class="phones-content">
                    <div>
                        <h2><i class="fa fa-magic" aria-hidden="true"></i></i>Make your life more comfortable.<br />
                            <br />
                            <br /> <br /></h2>
                    </div>
                    <div>
                        <img src="..\images\mainacessories.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <a name="cases"></a>
        <h2 style="text-align: center;"><i class="fa fa-hand-o-down" area-hidden="true"></i>Laptop Cases.</h2>
        <div id="sortingblock">
            <ul id="options">
                <li>Price sorting: </li>
                <li><a id="selectsorting">None</a>
                    <ul id="sorting-list">
                        <li><a href="acessories.php?sort=price-asc">low cost first</a></li>
                        <li><a href="acessories.php?sort=price-desc">high cost first</a></li>
                    </ul>
            </ul>
        </div>
        <form method="post" style="margin-left: 30px" class="searchform">
            <input type="text" name="search" class="search" placeholder="Brand name"><button type="sumbits" name="submits" value="Search" class="buttonsearch">Search</button>
        </form>
        <div class="container">
            <div class="item_box-content">
                <table>
                    <tr style="align-content: center; text-align: center;">
                        <?php
                        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                        $connectt = mysqli_connect('localhost', 'admin', 'root', 'shopcourse');
                        if (isset($_POST['submits'])) {
                            $search = $_POST['search'];
                            $query = mysqli_query($connectt, "SELECT * FROM `db_acces` WHERE `name` LIKE '%$search%'");
                            while ($row = mysqli_fetch_assoc($query)) echo '
                            <div style="background-color: grey;">
                                <hr style="color: black; width: 70%">
                                <div style="display: inline">
                                <img src="' . $row["img"] . '" class="minimized" style="width: 50%; height: 30%; text-align: center;" alt=""></a>
                                <p style="color: Black;">' . $row["name"] . '</p>

                                <div style="display: inline;">
                                <small style="color: white;">Diagonal:' . $row["diagonal"] . ' <br /></small>
                                <small style="color: white;">Matherial:' . $row["matherial"] . ' <br /></small>
                                
                                <p>' . $row["price"] . ' $</p> <br />
                                <b href=""   class="buy" data-price = ' . $row["price"] . '
                                data-product = ' . $row["name"] . ' >Purchase</b>
                                </div>
                                </hr>
                                </div>
                                ';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div id="item_box" class="section" style="margin-left: 10px">
            <div class="container">
                <div class="item_box-content">
                    <?php
                    $dbUser = 'admin';
                    $dbName = 'shopcourse';
                    $dbPass = 'root';
                    $mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);

                    $sorting = $_GET['sort'];
                    switch ($sorting) {
                        case 'price-asc';
                            $sorting = 'price ASC';
                            $sort_name = 'low cost first';
                            break;
                        case 'price-desc';
                            $sorting = 'price DESC';
                            $sort_name = 'high cost first';
                            break;

                        default:
                            $sorting = 'price DESC';
                            $sort_name = "no sorting";
                            break;
                    }

                    $query = "set names utf8";
                    $mysqli->query($query);
                    $query = "select * from db_acces";
                    $results = $mysqli->query("select * from db_acces ORDER BY $sorting");
                    while ($row = $results->fetch_assoc()) {
                        echo '
                                <hr style="color: black; width: 70%">
                                <div style="display: inline">
                                <img src="' . $row["img"] . '" class="minimized" style="width: 50%; height: 30%; text-align: center;" alt=""></a>
                                <p>' . $row["name"] . '</p>

                                <div style="display: inline;">
                                <small style="color: white;">Diagonal:' . $row["diagonal"] . ' <br /></small>
                                <small style="color: white;">Matherial:' . $row["matherial"] . ' <br /></small>
                                
                                <p>' . $row["price"] . ' $</p> <br />
                                <b href=""   class="buy" data-price = ' . $row["price"] . '
                                data-product = ' . $row["name"] . ' >Purchase</b>
                                </div>
                                </hr>
                                
                                ';
                    }
                    ?>
                        
                </div>
                <div class="modal fade" id="cart">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Take an order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="buy" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="name" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Product</label>
                                        <input type="text" class="form-control" name="product" id="product" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="but" method="post" id="makeanorder">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <a name="stands"></a>
        <h2 style="text-align: center;"><i class="fa fa-laptop" area-hidden="true"></i>Laptop Stands.</h2>
        <form method="post">
            <input type="text" name="search" class="search" placeholder="Brand name"><button type="sumbits" name="submits" value="Search" class="buttonsearch">Search</button>
        </form>
        <div class="container">
            <div class="item_box-content">
                <table>
                    <tr style="align-content: center; text-align: center;">
                        <?php
                        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                        $connectt = mysqli_connect('localhost', 'admin', 'root', 'shopcourse');
                        if (isset($_POST['submits'])) {
                            $search = $_POST['search'];
                            $query = mysqli_query($connectt, "SELECT * FROM `db_acces1` WHERE `name` LIKE '%$search%'");
                            while ($row = mysqli_fetch_assoc($query)) echo '
                            <div style="background-color: grey;">
                            <hr style="color: grey; width: 70%">
                            <div style="display: inline">
                            <img src="' . $row["img"] . '" class="minimized" style="width: 50%; height: 30%; text-align: center;" alt=""></a>
                            <p style="color: Black;">' . $row["name"] . '</p>
                            
                            <small style="color: white;">Weight:' . $row["weight"] . ' <br /></small>
                            <small style="color: white;">Cooling:' . $row["freeze"] . ' <br /></small>
                            
                            <p>' . $row["price"] . ' $</p> <br />
                            <b href=""   class="buy" data-price = ' . $row["price"] . '
                            data-product = ' . $row["name"] . ' >Purchase</b>
                            </div>
                            </hr>
                                </div>
                                ';
                        }
                        ?>
                    </tr>
                </table>
            </div>
        </div>
        <div id="item_box" class="section" style="margin-left: 10px">
            <div class="container">
                <div class="item_box-content">
                    <?php
                    $dbUser = 'admin';
                    $dbName = 'shopcourse';
                    $dbPass = 'root';
                    $mysqli = new mysqli('localhost', $dbUser, $dbPass, $dbName);

                    $sorting = $_GET['sort'];
                    switch ($sorting) {
                        case 'price-asc';
                            $sorting = 'price ASC';
                            $sort_name = 'low cost first';
                            break;
                        case 'price-desc';
                            $sorting = 'price DESC';
                            $sort_name = 'high cost first';
                            break;

                        default:
                            $sorting = 'price DESC';
                            $sort_name = "no sorting";
                            break;
                    }

                    $query = "set names utf8";
                    $mysqli->query($query);
                    $query = "select * from db_acces1";
                    $results = $mysqli->query("select * from db_acces1 ORDER BY $sorting");
                    while ($row = $results->fetch_assoc()) {
                        echo '
                                <hr style="color: grey; width: 70%">
                                <div style="display: inline">
                                <img src="' . $row["img"] . '" class="minimized" style="width: 50%; height: 30%; text-align: center;" alt=""></a>
                                <p>' . $row["name"] . '</p>
                                
                                <small style="color: white;">Weight:' . $row["weight"] . ' <br /></small>
                                <small style="color: white;">Cooling:' . $row["freeze"] . ' <br /></small>
                                
                                <p>' . $row["price"] . ' $</p> <br />
                                <b href=""   class="buy" data-price = ' . $row["price"] . '
                                data-product = ' . $row["name"] . ' >Purchase</b>
                                </div>
                                </hr>
                                ';
                    }
                    ?>
                        
                </div>
                <div class="modal fade" id="cart">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Take an order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="buy" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="name" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Product</label>
                                        <input type="text" class="form-control" name="product" id="product" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="but" method="post" id="makeanorder">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="..\scripts\mainj.js"></script>
    <script src="..\scripts\sortingblock.js"></script>
    <script src="..\scripts\order.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
