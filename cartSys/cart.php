<?php
session_start();
include 'db_connect.php';
require_once 'classes/Produs.php';
require_once 'classes/CartItem.php';
require_once 'classes/Cart1.php';
require_once 'classes/User.php';

$conn = OpenCon();

$query = "SELECT cart_item.cantitate, cart_item.id, produs.imagine, produs.nume, produs.pret, produs.id
          FROM cart_item
          INNER JOIN produs ON cart_item.product_id = produs.id";

$result = mysqli_query($conn, $query);


if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  delete_produs($id, $conn);
  header("Location: cart.php");
}

if(isset($_POST['update_id'])){
  $id = $_POST['update_id'];
  $cantitate = $_POST['qty'];
  update_cantitate($id, $cantitate, $conn);
}



CloseCon($conn);

function delete_produs ($id, $conn){
  $delete_sql = "DELETE FROM cart_item WHERE product_id = '$id'";
  $conn->query($delete_sql);
}

function update_cantitate($id, $cantitate, $conn){
  //update cantitate
  $update_sql = "UPDATE cart_item SET cantitate = '$cantitate' WHERE product_id = $id";
  $conn->query($update_sql);
}

?>

<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php include 'includes/navbar.php'; ?>


<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-2">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
        </div>

        <?php while($row = mysqli_fetch_array($result)){ ?>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="data:image/jpeg;base64,<?php echo base64_encode( $row['imagine'] ); ?>"
                  class="img-fluid rounded-3" alt="Cotton T-shirt">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?php echo $row['nume'];?></p>
              </div>


              <!-- update cantitate -->
              <form class="col-md-1 col-lg-1 col-xl-2 d-flex">
              <small id="emailHelp" class="form-text text-muted m-1">Buc.</small>
                  <input type="number" name="qty" value="<?php echo $row['cantitate'];?>" min="1" max="5">
                  <button type="submit" class="btn btn-success btn-sm m-1" name="update_id" value="<?php echo $row['id'];?>">Update</button>
              </form>


              
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?php echo $row['pret']*$row['cantitate'] . " RON";?></h5>
              </div>

              <!-- delete product -->
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="cart.php?delete=<?php echo $row['id'];?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>


            </div>
          </div>
        </div>
<?php } ?>

        <!-- discount code appli -->
        <div class="card mb-4">
          <div class="card-body p-4 d-flex flex-row">
            <div class="form-outline flex-fill">
              <input type="text" id="form1" class="form-control form-control-lg" />
              <label class="form-label" for="form1">Discound code</label>
            </div>
            <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
          </div>
        </div>

        <!-- pay button -->
        <div class="card">
          <div class="card-body">
            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>