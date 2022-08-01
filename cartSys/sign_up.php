<?php
include 'db_connect.php';

$conn = OpenCon();

$err_empty = $err_nume = $err_prenume = $err_email = $err_email_exists = $err_parola = $err_telefon = '';

if (isset($_POST['register'])) {

    if (empty($_POST['nume'] && $_POST['prenume'] && $_POST['email'] && $_POST['parola'] && $_POST['telefon'])) {
        $err_empty = "Toate campurile trebuie completate";
    }
    if (preg_match('~[0-9]+~', $_POST['nume']) || empty($_POST['nume'])) {
        $err_nume = "Numele trebuie sa contina doar litere & nu poate fi gol";
    }
    if (preg_match('~[0-9]+~', $_POST['prenume']) || empty($_POST['prenume'])) {
        $err_prenume = "Prenumele trebuie sa contina doar litere & nu poate fi gol";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $err_email = "Format email invalid";
    }
    if (empty($_POST['parola'])) {
        $err_parola = "Va rugam sa introduceti o parola";
    }
    if (!preg_match("/^[0-9]{10}+$/", $_POST['telefon'])) {
        $err_telefon = "Numar telefon invalid";
    } else {
        $err_empty = $err_nume = $err_prenume = $err_email = $err_email_exists = $err_parola = $err_telefon = '';

        $nume = validate_fields($_POST['nume']);
        $prenume = validate_fields($_POST['prenume']);
        $email = validate_fields($_POST['email']);
        $parola = validate_fields(md5($_POST['parola']));
        $telefon = validate_fields($_POST['telefon']);

        $sql = "SELECT * FROM user WHERE email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            $err_email_exists = "Sorry... email already taken";
        } else {

            $stmt = $conn->prepare("INSERT INTO user (nume, prenume, email, parola, telefon) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nume, $prenume, $email, $parola, $telefon);
            $stmt->execute();
            CloseCon($conn);
        }

    }

}

function validate_fields($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<html>
<head>
    <title>Client</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include 'includes/navbar.html'; ?>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="col-7 mx-auto mt-4">


    <h1 class="main-titles mt-5">Register</h1>
    <span class="text-danger"><?php echo $err_empty; ?></span>
    <div class="mb-3">
        <label class="form-label">Nume</label><span class="text-danger">*</span>
        <input type="text" class="form-control" name="nume">
        <span class="text-danger"><?php echo $err_nume; ?></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Prenume</label><span class="text-danger">*</span>
        <input type="text" class="form-control" name="prenume">
        <span class="text-danger"><?php echo $err_prenume; ?></span>
    </div>
    <label class="form-label">Email</label><span class="text-danger">*</span>
    <input type="email" class="form-control" name="email">
    <span class="text-danger"><?php echo $err_email; ?></span>
    <span class="text-danger"><?php echo $err_email_exists; ?></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Parola</label><span class="text-danger">*</span>
        <input type="password" name="parola" class="form-control" id="inputPassword3">
        <span class="text-danger"><?php echo $err_parola; ?></span>
    </div>
    <div class="mb-3">
        <label class="form-label">Telefon</label><span class="text-danger">*</span>
        <input type="number" class="form-control" name="telefon">
        <span class="text-danger"><?php echo $err_telefon; ?></span>
    </div>
    <div class="mb-3">

        <button type="submit" name="register" class="btn btn-primary">Register</button>
</form>

<div class="mx-auto col-7 text-success">
    <?php
    if (isset($_POST['register']) && empty($err_empty)) {
        echo "<h2>Client added: </h2>";
        echo "Nume: $nume <br>";
        echo "Prenume: $prenume <br>";
        echo "Email: $email <br>";
        echo "Telefon: $telefon <br>";
    }
    ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
        integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
        crossorigin="anonymous"></script>


</body>
</html>