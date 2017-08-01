<?php require_once dirname(__FILE__).'/../partials/header.php' ?>
	<br>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-sm-6 col-md-6">
					<h5><b>Cidade: </b> <?=$data["city"] ?></h5>
				</div>
				<div class="col-sm-6 col-md-6">
					<h5>
						<b>Raio: </b> <?=$data["radius"] ?>
					</h5>
				</div>
			</div>
			<table class="table">
				<tr>
					<th>Carro</th>
					<th>Preço</th>
					<th>Cidade</th>
					<th>Distância</th>
				</tr>
				<?php foreach ($data["cars"] as $car): ?>
					<tr>
						<td><?=$car->getCar()?></td>
						<td>R$<?=number_format($car->getPrice(),2,",",".")?></td>
						<td><?=$car->getCity()?></td>
						<td><?=number_format($car->getDistance(),2)?> KMs</td>
					</tr>
				<?php endforeach ?>
			</table>
			<div class="panel-footer text-center">
				&copy; All Rights Reserveds
			</div>
		</div>
	</div>
<?php require_once dirname(__FILE__).'/../partials/footer.php' ?>