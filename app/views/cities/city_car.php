<?php require_once dirname(__FILE__).'/../partials/header.php' ?>

    <div class="container">
        <div class="col-md-10 center-component">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>List of Cars</h1>
                    </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Car</th>
                        <th>Price</th>
                    </tr>
                    <?php foreach ($data["cars"] as $car) { ?>
                        <tr>
                            <td><?=$car->getCar()?></td>
                            <td><?=$car->getPrice() ?></td>
                        </tr>
                    <?php } ?>            
                </table>
            </div>            
        </div>
    </div>
    
<?php require_once dirname(__FILE__).'/../partials/footer.php' ?>