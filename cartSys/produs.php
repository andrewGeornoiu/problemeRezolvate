<?php
session_start();
include 'db_connect.php';
require_once 'classes/Produs.php';
require_once 'classes/CartItem.php';
require_once 'classes/Cart1.php';
require_once 'classes/User.php';

$product_id = $_GET['id'];

$conn = OpenCon();

$query = "SELECT * FROM produs WHERE id='$product_id'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $nume = $row['nume'];
    $descriere = $row['descriere'];
    $sku = $row['pn'];
    $pret = $row['pret'];
    $imagine = $row['imagine'];
}


$sql = "SELECT cantitate_stoc FROM stoc RIGHT JOIN produs on stoc.product_id = '$product_id'";
$res = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($res)) {
    $stoc_disponibil = $row['cantitate_stoc'];
}

$produs = new Produs($id, $nume, $descriere, $sku, $pret, $imagine, $stoc_disponibil);
$item = new CartItem($produs, 1);

if(isset($_GET['addProdus']) && $_GET['addProdus'] == 'true'){

    $email = $_SESSION['username'];
    $query_id = "SELECT id FROM user WHERE email = '$email'";
    $res_q = mysqli_query($conn, $query_id);
    $id_user = mysqli_fetch_array($res_q);

    $cart = new Cart();
    $cart->setCartId(rand(10,100));
    $cart->setUserId($id_user['id']);

    $cart_id = $cart->getCartId();
    $cart_user_id = $cart->getUserId();


    $stmt = $conn->prepare("INSERT INTO cart (id, user_id) VALUES (?, ?)");

    $stmt->bind_param("ii", $cart_id, $cart_user_id);

    $stmt->execute();

    if(isset($cart)){
        $item = new CartItem($produs, 1);
        $produs_id = $item->getProdus()->getId();
        $cantiate = $item->getStoc();
        $id_item = 1;
        $stmt = $conn->prepare("INSERT INTO cart_item (id, cart_id, product_id, cantitate) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("iiii", $id_item, $cart_id, $produs_id, $cantiate);
    
        $stmt->execute();
    }

}


CloseCon($conn);

?>

<html>
<head>
    <title>Produs</title>
<!--    <link rel="stylesheet" href="style.css">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php  



?>


<?php include 'includes/navbar.php'; ?>

<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"><img width="350" src="data:image/jpeg;base64,<?php echo base64_encode( $produs->getImagine() ); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product mt-5">
                            <div class="ml-2"> <span class="fw-light"><?php echo htmlspecialchars($produs->getSku());?></span> </div>
                                <h5><?php echo htmlspecialchars($produs->getNume());?></h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <div class="ml-2"> <span class="fw-bold"><?php echo htmlspecialchars($produs->getPret()) . " RON";?></span> </div>
                                </div>
                            </div>
                            <p class="about"><?php echo htmlspecialchars($produs->getDescriere());?></p>
                            <?php if($produs->getStocDisponibil() > 0){ ?>
                                <div class="ml-2"> <span class="fw-bold" style="color:green;">In stoc</span> </div>
                                <div class="cart mt-4 align-items-center"> <a class="btn fw-bold btn-danger text-uppercase mr-2 px-4" href="produs.php?id=<?php echo $product_id;?>&addProdus=true">Add to cart</a></div>
                            <?php  } else { ?>
                                <div class="ml-2"> <span class="fw-bold" style="color:red;">Indisponibil</span> </div>
                                <div class="cart mt-4 align-items-center"> <a class="btn fw-bold btn-danger text-uppercase mr-2 px-4 disabled">Add to cart</a></div>
                            <?php  } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</body>
</html>