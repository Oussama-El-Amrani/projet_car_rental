<?php
use App\Router;
$title = "Administration";
?>
<?php if(isset($_GET['delete'])):?>
<div class="toast position-absolute end-0 bg-danger" data-bs-autohide="false" style="z-index: 10000;">
    <div class="toast-body text-white justify-c">
        <span>L' enregistrement a bien été supprimer</span> 
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
</div>
<?php endif;?>

<main class="container-fluid my-3">
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Nos voiture</h6>
                <a class="btn btn-info text-white" href="<?= $router->url('admin_post_new')?>">Nouvelle voiture</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Marque</th>
                            <th>Modele</th>
                            <th>prix/jour</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cars as $car):?>
                        <tr>
                            <td>
                                <a href="<?=$router->url('admin_post_edit', ['id' => $car->getId()]) ?>"> <?=$car->getId()?></a>
                            </td>
                            <td><?=$car->getMarque()?></td>
                            <td><?=$car->getModele()?></td>
                            <td><?=$car->getDaily_price()?> Dhs</td>
                            <td>
                                <?php
                                $statut = $car->getAvailable() ?'Disponible' : 'Non Disponible';
                                echo $statut;
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success mx-3 mx-lg-0" href="<?=$router->url('admin_post_edit', ['id' => $car->getId()]) ?>">Modifier</a>
                                <form class="btn" action="<?=$router->url('admin_post_delete', ['id' => $car->getId()]) ?>" method="POST" onsubmit="return confirm('Vouler vous vraiment effectuer cette action')">
                                    <button class="btn btn-sm btn-danger" type='submit'>Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>