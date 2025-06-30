<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Register</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= URL_ROOT ?>/users/store" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type ='text' name = "name" class="form-control">
                                <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['name'])) : ?>
                                    <?= $_SESSION['form_errors']['name'] ?>
                                <?php endif ?>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type ='text' name = "username" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['username'])) : ?>
                                    <?= $_SESSION['form_errors']['username'] ?>
                                <?php endif ?>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['password'])) : ?>
                                    <?= $_SESSION['form_errors']['password'] ?>
                                <?php endif ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['confirm_password'])) : ?>
                                    <?= $_SESSION['form_errors']['confirm_password'] ?>
                                <?php endif ?>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Register</button>
                             <?php if (isset($_SESSION['form_errors'])) : ?>
                            <?php unset($_SESSION['form_errors']) ?>
                        <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</body>

</html>