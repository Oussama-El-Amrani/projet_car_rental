<h1>Voiture Reserver</h1>
<table class="table-admin-cars">
    <thead>
        <th>modele</th>
        <th>date de debut de reservation</th>
        <th>date de fin</th>
        <th>prix par jour</th>
        <th>prix total</th>
        <th>Supprimer</th>
    </thead>
    <tbody>
        <?php foreach($cars as $car):?>
            <?php //dd($car);?>
            <tr>
                <td><?=$car['modele']?></td>
                <td><?=$car['check_in']?></td>
                <td><?=$car['check_out']?></td>
                <td><?=$car['daily_price']?>dh</td>
                <td><?=$car['price']?>dh</td>
                <td>
                    <form action="<?=$router->url('delete_reservation', ['id' => $car['id']]) ?>" method="POST" onsubmit="return confirm('Vouler vous vraiment effectuer cette action')">
                        <button class="btn" type='submit'>Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;?>    
</table>
<a href="<?=$router->url('paymentPayPal')?>" class="btn">
    Payer
</a>