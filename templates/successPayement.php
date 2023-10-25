<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <main>
        <h1>RentalCarsFes</h1>
        <table align="left">
            <tr>
                <th bgcolor="">elamranioussama01@gmail.com</th>
            </tr>
            <tr>
                <th  bgcolor="">0695024167</th
            </tr>
            <tr>
                <th bgcolor="">Fes</th>
            </tr>
        </table>
                    
        <!-- <img src="..public/imgs/img_site/logo.png" alt="logo"> -->
        <h1 align="center">Information personnel</h1>
            <table frame="box" rules="all" align="center">
                <thead>
                    <tr>
                        <th >Cin</th>
                        <th >Nom</th>
                        <th >Prenom</th>
                        <th >Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$rentalCarInfo['cin']?></td>
                        <td><?=$rentalCarInfo['last_name']?></td>
                        <td><?=$rentalCarInfo['first_name']?></td>
                        <td><?=$rentalCarInfo['email']?></td>
                    </tr>
                </tbody>
            </table>

            <h1 align="center">Information sur locasion</h1>
            <table frame="box" rules="all" align="center">
                <thead>
                    <tr>
                        <th >#id voiture</th>
                        <th>Marque</th>
                        <th>Modele</th>
                        <th>L'adresse du livraison</th>
                        <th>Date debut du livraison</th>
                        <th>Date fin du retour</th>
                        <th>Prix/jour</th>
                        <th>Prix payer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$rentalCarInfo['id']?></td>
                        <td><?=$rentalCarInfo['marque']?></td>
                        <td><?=$rentalCarInfo['modele']?></td>
                        <td><?=$rentalCarInfo['city']?></td>
                        <td><?=$rentalCarInfo['check_in']?></td>
                        <td><?=$rentalCarInfo['check_out']?></td>
                        <td><?=$rentalCarInfo['daily_price']?></td>
                        <td><?=$rentalCarInfo['price']?></td>
                    </tr>
                </tbody>
            </table>
            
        </main>
    </body>
</html>