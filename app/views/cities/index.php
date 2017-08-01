<?php require_once dirname(__FILE__).'/../partials/header.php' ?>

    <div class="container">
        <div class="col-md-10 center-component">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>List of Cities</h1>
                    </div>
                <table class="table table-bordered">
                    <tr>
                        <th>City</th>
                        <th>Coordenates</th>
                    </tr>
                    <?php foreach ($data["cities"] as $city) { ?>
                        <tr>
                            <td>
                                <a href="/geografico/cities/listCars/<?=str_replace(" ","_",$city->getName())?>">
                                    <?=$city->getName()?>
                                </a>
                            </td>
                            <td><?=$city->getGeom() ?></td>
                        </tr>
                    <?php } ?>            
                </table>
            </div>            
        </div>
    </div>
    
<?php require_once dirname(__FILE__).'/../partials/footer.php' ?>