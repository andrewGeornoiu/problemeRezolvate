<?php
ob_start();
session_start();
include 'db_connect.php';
require_once 'classes/Produs.php';


$conn = OpenCon();

// $query = "SELECT * FROM produs ORDER BY id ASC LIMIT 5;";

$query = "SELECT stoc.cantitate_stoc, produs.id, produs.nume, produs.descriere, produs.imagine, produs.pret
          FROM stoc
          INNER JOIN produs ON stoc.product_id = produs.id ORDER BY produs.id ASC LIMIT 5";

$result = mysqli_query($conn, $query);


CloseCon($conn);

?>

<html>
<head>
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php include 'includes/navbar.php'; ?>

<?php while($row = mysqli_fetch_array($result)){ ?>
<div class="container py-5">    
    <div class="row">  

        <div class="col-lg-12">  
            <div class="card-deck">
                    <div class="card">
                        <img class="card-img-top" style="width: 226px ;" src="data:image/jpeg;base64,<?php echo base64_encode( $row['imagine'] ); ?>" alt="Card image cap">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nume'];?></h5>
                        <p class="card-text"><?php 
                                    $row['descriere'] = substr($row['descriere'],0,125);
                                    echo $row['descriere'] . " ...";
                                    ?></p>
                        <p class="card-text"><a href="produs.php?id=<?php echo $row['id'];?>" target="_blank">Mai multe informatii</a></p>
                        <p class="card-text"><small class="fw-bold"><?php echo $row['pret'] . " RON";?></small></p>
                        
                        <?php if($row['cantitate_stoc'] > 0){ ?>
                                <div class="ml-2"> <span class="fw-bold" style="color:green;">In stoc</span> </div>
                                <div class="cart mt-4 align-items-center"> <a class="btn fw-bold btn-danger text-uppercase mr-2 px-4" href="#">Add to cart</a></div>
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
<?php  } ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


</body>
</html>