<?php
use App\HTML\Form;
$form = new Form();
?>
<?php if($success): ?>
<div class="toast position-absolute end-0 bg-success" data-bs-autohide="false" style="z-index: 10000;">
    <div class="toast-body text-white">
        <span>Nouveaux changements ont bien été appliqué</span> 
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div>
</div>
<?php  endif;?>

<main class="container-fluid my-3">
    <section class="row">
        <section class="col-12 col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
                <h3 class="h4 text-uppercase">Ajouter une nouvelle voiture</h3>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('id','#id','', 'text');?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('marque','Marque','', 'text');?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('modele','modele','', 'text');?>
                            <!-- <?//=$form->input('modele','Modele',$car->getModele(), 'text');?> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('daily_price','Prix/Jour','', 'text');?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3 form-floating">
                            <?=$form->input('available','Disponibilité','', 'number');?>
                            <small class="form-text">1 S'il est disponible 0 si non</small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <?=$form->input('car_picture','La photo du voiture','', 'file');?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 form-floating">
                            <!-- <input type="text" name="fnumber" id="fnumber" class="form-control" placeholder="Le type du carburant">
                            <label for="fnumber">Le type du carburant</label> -->
                        </div>
                    </div>       
                    <div class="col-12">
                        <div class="mb-3 form-floating">
                            <!-- <input type="number" name="fnumber" id="fnumber" class="form-control" placeholder="Année du modele">
                            <label for="fnumber">Année du modele</label> -->
                        </div>
                    </div>
                    <div><button class="col-12 btn btn-primary text-uppercase" type="submit">Ajouter</button></div>
                </div>
            </form>
        </section>
    </section>
</main>