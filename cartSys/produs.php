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

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $nume = $row['nume'];
    $descriere = $row['descriere'];
    $sku = $row['pn'];
    $pret = $row['pret'];
    $imagine = $row['imagine'];
}

$sql = "SELECT cantitate_stoc FROM stoc RIGHT JOIN produs on stoc.product_id = '$product_id'";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($res)) {
    $stoc_disponibil = $row['cantitate_stoc'];
}

$produs = new Produs($id, $nume, $descriere, $sku, $pret, $imagine, $stoc_disponibil);

if(isset($_GET['produsAdd'])){
    //get user ID
    $email = $_SESSION['username'];
    $query_id = "SELECT * FROM user WHERE email = '$email'";
    $res_q = mysqli_query($conn, $query_id);
    while ($row = mysqli_fetch_array($res_q)) {
        $id_user = $row['id'];
    }
    //get cart info
    $cart_sql = "SELECT id FROM cart WHERE user_id = '$id_user'";
    $res_cart_sql = mysqli_query($conn, $cart_sql);
    while ($row = mysqli_fetch_array($res_cart_sql)) {
        $cart_id = $row['id'];
    }
    if(empty($cart_id)){
        $cart_id = rand(10,100);
        create_cart($cart_id, $id_user, $conn);
    }
}

if (isset($_POST['addToCart'])){
    $id_produs = $_GET['id'];
    $query_cart_item = "SELECT cantitate FROM cart_item WHERE product_id = '$id_produs'";
    $res_can = $conn->query($query_cart_item);
    $row_can = mysqli_fetch_assoc($res_can);

    if($row_can['cantitate'] >= 1){
        $cantitate = $row_can['cantitate'];
        $cantitate++;
        update_cantitate($id_produs, $cantitate, $conn);
        update_stoc($id_produs, $cantitate, $produs, $conn);
        
    }else{
        $cartItem = new CartItem($produs, 1);
        $cantitate = $cartItem->getCantitate();
        $stmt = $conn->prepare("INSERT INTO cart_item (cart_id, product_id, cantitate) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $cart_id, $id_produs, $cantitate);
        $stmt->execute();
        update_stoc($id_produs, $cantitate, $produs, $conn);
    }
}

//update stoc
function update_stoc($id, $cantitate, $produs, $conn){
    // //get cantitate stoc
    // $query = "SELECT cantitate_stoc FROM stoc WHERE product_id = '$id'";
    // $res_stoc = $conn->query($query);
    // $row_can_stoc = mysqli_fetch_assoc($res_stoc);
    // $stoc = $row_can_stoc['cantitate_stoc'];
    $stoc = $produs->getStocDisponibil();
    $cantitate = $stoc - 1;
    //update cantitate
    $update_sql = "UPDATE stoc SET cantitate_stoc = '$cantitate' WHERE product_id = $id";
    $conn->query($update_sql);
}

//update cantitate
function update_cantitate($id, $cantitate, $conn){
    //update cantitate
    $update_sql = "UPDATE cart_item SET cantitate = '$cantitate' WHERE product_id = $id";
    $conn->query($update_sql);
}

//create cart
function create_cart($id, $user_id, $conn){
    $cart = new Cart ($id, $user_id);
    $stmt = $conn->prepare("INSERT INTO cart (id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $id, $user_id);
    $stmt->execute();
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

    <?php include 'includes/navbar.php'; ?>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <form class="row" method="post" action="produs.php?id=<?php echo $produs->getId();?>&produsAdd">
                                <div class="col-md-6">
                                            <div class="images p-3">
                                                <div class="text-center p-4"><img width="350" src="data:image/jpeg;base64,<?php echo base64_encode($produs->getImagine()); ?>" />
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="product mt-5">
                                            <div class="ml-2"> <span class="fw-light"><?php echo htmlspecialchars($produs->getSku()); ?></span> </div>
                                            <h5><?php echo htmlspecialchars($produs->getNume()); ?></h5>
                                            <div class="price d-flex flex-row align-items-center">
                                                <div class="ml-2"> <span class="fw-bold"><?php echo htmlspecialchars($produs->getPret()) . " RON"; ?></span> </div>
                                            </div>
                                        </div>
                                        <p class="about"><?php echo htmlspecialchars($produs->getDescriere()); ?></p>
                                        <?php if ($produs->getStocDisponibil() > 0) { ?>
                                            <div class="ml-2"> <span class="fw-bold" style="color:green;">In stoc</span> </div>
                                            <div class="cart mt-4 align-items-center"> <button type="submit" name="addToCart" class="btn fw-bold btn-danger text-uppercase mr-2 px-4">Add to cart</button></div>
                                        <?php  } else { ?>
                                            <div class="ml-2"> <span class="fw-bold" style="color:red;">Indisponibil</span> </div>
                                            <div class="cart mt-4 align-items-center"> <button type="submit" name="addToCart" class="btn fw-bold btn-danger text-uppercase mr-2 px-4 disabled">Add to cart</button></div>
                                        <?php  } ?>
                                    </div>
                        
                    </form>
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