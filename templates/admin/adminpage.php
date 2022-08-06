<?php

use App\Router;

$title = "Administration";
?>

<h1>Admin</h1>
<?php if(isset($_GET['delete'])):?>
    <div class="succes">
        L' enregistrement a bien été supprimer
    </div>
<?php endif;?>
<table class="table-admin-cars">
    <thead>
        <th>ID</th>
        <th>Photo</th>
        <th>
            <a href="<?= $router->url('admin_post_new')?>"> <button>Nouveau Voiture</button></a>
        </th>
    </thead>
    <tbody>
        <?php foreach($cars as $car):?>
            <?php
                // dd($car);
            ?>
        <tr>
        <td>
            <a href="<?=$router->url('admin_post_edit', ['id' => $car->getId()]) ?>">
                <?=$car->getId()?>
            </a>
        </td>
            <td>
                <img src="/imgs/cars_picture/<?= $car->getCar_picture();?>" alt="<?= $car->getModele()?>">
            </td>
            <td>
                <a href="<?=$router->url('admin_post_edit', ['id' => $car->getId()]) ?>">
                    <button>Editer</button>
                </a>
                <form action="<?=$router->url('admin_post_delete', ['id' => $car->getId()]) ?>" method="POST" onsubmit="return confirm('Vouler vous vraiment effectuer cette action')">
                    <button type='submit'>Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
