<?php
require '../kernel/db_connect.php';
require '../models/user.php';
$users = findAllUsers();
require 'template/header.php'
?>
<body>
<div class="container">
    <div class="row">
        <table class="col-12">
            <h1>Gestion des abonnés</h1>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                    <th>Login</th>
                    <th>Email</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Admin ?</th>
                    <th>Date d'inscription</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user):?>
                <tr>
                    <td><?= $user['login']?></td>
                    <td><?= $user['email']?></td>
                    <td><?= strtoupper($user['login'])?></td>
                    <td><?= ucfirst($user['login'])?></td>
                    <td>
                        <?php if($user['is_admin']) :?>
                        <span class="badge badge-primary">admin</span></td>
                        <?php else :?>
                        <span class="badge badge-dark">user</span></td>
                        <?php endif ?>

                    <td>
                        <?php $date_creation = date_create($user['created_at']) ?>
                        <?= date_format($date_creation, 'd/m/Y H:i') ?>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php require 'template/footer.php'?>
</body>
</html>