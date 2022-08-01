<?php
include 'db_connect.php';

$conn = OpenCon();

$err_empty = $err_email = $err_email_empty = $err_email_not_found = $err_final = $err_parola = "";

if (isset($_POST['login'])){

    if ($_POST['email'] && $_POST['parola']) {
        $err_empty = "Toate campurile trebuie completate";
    }
    if (empty(trim($_POST['email']))){
        $err_email_empty = "Introduceti adresa de email";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err_email = "Format email invalid, ";
    }
    if (!empty(trim($_POST['email']))){
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $sql = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) == 0)
        {
            $err_email_not_found = "Nu exista aceasta adresa";

        }
    }
    if (empty(trim($_POST['parola']))){
        $err_parola = "Introduceti parola";
    }else{
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $parola = mysqli_real_escape_string($conn, $_POST["parola"]);
        $parola = md5($parola);

        $query = "SELECT * FROM user WHERE email = '$email' AND parola = '$parola'";
        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result) > 0)
        {
            header("location:index.php");
        }
        else
        {
            $err_final = "Email sau parola gresite, incercati din nou";
        }
    }

}

CloseCon($conn);

?>

<html>
<head>
    <title>Client</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<?php include 'includes/navbar.html'; ?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col-7 mx-auto mt-4">


    <h1 class="main-titles mt-5">Login</h1>
    <span class="text-danger"><?php echo $err_final; ?></span>
    <div class="mb-3">
        <label class="form-label">Email</label><span class="text-danger">*</span>
        <input type="email" class="form-control" name="email">
        <span class="text-danger"><?php echo $err_email; ?></span>
        <span class="text-danger"><?php echo $err_email_empty; ?></span>
        <span class="text-danger"><?php echo $err_email_not_found; ?></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Parola</label><span class="text-danger">*</span>
        <input type="password" name="parola" class="form-control" id="inputPassword3">
        <span class="text-danger"><?php echo $err_parola; ?></span>

    </div>

<div class="mb-3">

    <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


    </body>
    </html>