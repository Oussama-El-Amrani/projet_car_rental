<main class="container-fluid my-3">
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center  mb-4">
                <h6 class="mb-0 text-capitalize">Information sur les voitures louer</h6>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th >Cin</th>
                            <th >Nom</th>
                            <th >Prenom</th>
                            <th >N° téléphone</th>
                            <th >Email</th>
                            <th>L'adresse du client</th>
                            <th >#id voiture</th>
                            <th>Date debut de location</th>
                            <th>Date fin de location</th>
                            <th>Monatnt payer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($rentalCarsInfo as $rentalCarInfo):?>
                        <?php //dd($rentalCarInfo);?>
                        <tr>
                            <td><?=$rentalCarInfo['cin']?></td>
                            <td><?=$rentalCarInfo['last_name']?></td>
                            <td><?=$rentalCarInfo['first_name']?></td>
                            <td><?=$rentalCarInfo['phone_num']?></td>
                            <td><?=$rentalCarInfo['email']?></td>
                            <td><?=$rentalCarInfo['city']?></td>
                            <td>
                                <a class="btn btn-info" href="<?=$router->url('admin_post_edit', ['id' => $rentalCarInfo['id']]) ?>">
                                    <?=$rentalCarInfo['id']?>
                                </a>
                            </td>
                            <td><?=$rentalCarInfo['check_in']?></td>
                            <td><?=$rentalCarInfo['check_out']?></td>
                            <td><?=$rentalCarInfo['price']?> Dhs</td>
                        </tr>
                        <?php endforeach;?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>