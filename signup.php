<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    include 'connection.php';

    // Cek apakah username sudah digunakan
    $result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
    $cek = mysqli_num_rows($result);

    if ($cek > 0) {
        $error = "Username sudah digunakan";
    } else {
        // Enkripsi password sebelum disimpan di database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data pengguna ke database
        $insert = mysqli_query($con, "INSERT INTO user (username, password) VALUES ('$username', '$hashedPassword')");

        if ($insert) {
            $success = "Pendaftaran berhasil";
        } else {
            $error = "Terjadi kesalahan saat mendaftarkan pengguna";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registrasi</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <?php if (isset($success)) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $success; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header bg-transparent mb-0">
                        <h5 class="text-center">Registrasi <span class="font-weight-bold text-success">User</span></h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" name="register" value="Daftar" class="btn btn-success btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>