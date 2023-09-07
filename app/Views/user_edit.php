<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php $validation = \Config\Services::validation(); ?>

    <?php if ($validation->getError('name')) { ?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('name'); ?>
        </div>
    <?php } ?>

    <?php if ($validation->getError('email')) { ?>
        <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('email'); ?>
        </div>
    <?php } ?>

    <form action="<?= base_url('/update') ?>" method="post">

        <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">

        <input type="text" name="name" id="name" value="<?php echo $user_obj['name']?>">
        <input type="text" name="email" id="email" value="<?php echo $user_obj['email']?>">
        <input type="submit" value="Updae">
    </form>



</body>

</html>