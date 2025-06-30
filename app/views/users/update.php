<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h5 class="mb-0">Update Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= URL_ROOT ?>/users/updateProfile" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type ='text' name = "name"  value="<?= $user->name ?>" class="form-control">
                                <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['name'])) : ?>
                                    <?= $_SESSION['form_errors']['name'] ?>
                                <?php endif ?>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">User Name</label>
                                <input type ='text' name = "username" value="<?=$user->username?>" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['username'])) : ?>
                                    <?= $_SESSION['form_errors']['username'] ?>
                                <?php endif ?>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['current_password'])) : ?>
                                    <?= $_SESSION['form_errors']['current_password'] ?>
                                <?php endif ?>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control" >
                                 <div class="form-text text-danger">
                                <?php if (isset($_SESSION['form_errors']['passnew_passwordword'])) : ?>
                                    <?= $_SESSION['form_errors']['new_password'] ?>
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

                            <button type="submit" class="btn btn-primary w-100">Update</button>
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