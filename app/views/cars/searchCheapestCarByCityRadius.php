<?php require_once dirname(__FILE__).'/../partials/header.php' ?>
	<br>
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-sm-6 col-md-6">
					<h5>Search By City Radius</h5>
				</div>
			</div>
			<div class="panel-body">
                <form class="form-horizontal" method="post" action="/geografico/car/getCheapestCarByCityRadiusAndModel">
                    <div class="form-group">
                        <label for="city" class="col-sm-2 col-md-2 control-label">City</label>
                        <div class="col-md-10">
                            <select name="city" id="city" class="form-control">
                                <?php foreach ($data["cities"] as $city) { ?>
                                    <option value="<?=str_replace(" ","_",$city->getName())?>"><?=$city->getName()?></option>
                                <?php } ?>
                            </select>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="radius" class="col-sm-2 col-md-2 control-label">Radius</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control" id="radius" placeholder="type radius" name="radius" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-search" aria-hidden="true"></i> Search
                            </button>                                   
                        </div>
                    </div>                    
                    
                </form>                
            </div>
		</div>
	</div>

<?php require_once dirname(__FILE__).'/../partials/footer.php' ?>