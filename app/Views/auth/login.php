<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/auth/auth.css') ?>">
</head>

<body>



    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h3 class="card-title text-center">Sign In</h3>
                <div class="card-text">
                    <?php $validation = \Config\Services::validation(); ?>


                    <?php if ($validation->getError('email_address')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"> <?= $error = $validation->getError('email_address'); ?></div>
                    <?php } ?>

                    <?php if ($validation->getError('password')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"> <?= $error = $validation->getError('password'); ?></div>
                    <?php } ?>

                    <?php $session = session(); ?>
                    <?php if ($session->has('message')) : ?>
                        <div class="alert alert-success"><?= $session->getFlashdata('message') ?></div>
                    <?php endif; ?>





                    <form action="<?php echo base_url('loginAuth') ?>" method="post">
                        <input type="hidden" value="<?= csrf_hash(); ?>" name="<?= csrf_token(); ?>" id="csrf">
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group">
                            <label for="email_address">Email address</label>
                            <input type="email" class="form-control form-control-sm" id="email_address" name="email_address" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>

                            <input type="password" class="form-control form-control-sm" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>

                        <div class="sign-up"><a href="#">Forgot password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>