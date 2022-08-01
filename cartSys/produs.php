<?php
include 'db_connect.php';
require_once 'classes/Produs.php';

$product_id = $_GET['id'];

$conn = OpenCon();

$query = "SELECT * FROM produs WHERE id='$product_id'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result)) {
    $nume = $row['nume'];
    $descriere = $row['descriere'];
    $sku = $row['pn'];
    $pret = $row['pret'];
    $imagine = $row['imagine'];
}

$produs = new Produs($nume, $descriere, $sku, $pret, $imagine);


CloseCon($conn);

?>


<html>
<head>
    <title>Client</title>
<!--    <link rel="stylesheet" href="style.css">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php include 'includes/navbar.html'; ?>

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

                            <div class="cart mt-4 align-items-center"> <button class="btn fw-bold btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</body>
</html>