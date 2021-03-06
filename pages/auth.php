<?php

$error = false;

if(isAuthorizedUser()) {
    header("Location: /profile.php", true, 301);
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(loginUser($email, $password)) {
    header("Location: /profile.php", true, 301);
    exit;
} elseif(isset($_POST['email'])) {
    $error = 'Неверная почта или пароль';
}

?>
<h1>Авторизация</h1>
<div class="row mb-3">
    <div class="col-md-4 offset-4">
        <form method="post" action="/auth.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email; ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if($error) { ?>
            <div class="alert alert-danger mt-3" role="alert"><?php echo $error; ?></div>
        <?php } ?>
    </div>
</div>