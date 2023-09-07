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

    <form action="<?= base_url('/store') ?>" method="post">

        <input type="text" name="name" id="name">
        <input type="text" name="email" id="email">
        <input type="submit" value="Submit">
    </form>


    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php if ($users) { ?>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <a href="<?php echo base_url('delete/'.$user['id'])?>">D</a>||
                        <a href="<?php echo base_url('edit/'.$user['id'])?>">E</a>||
                     
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } ?>
    </table>



</body>

</html>