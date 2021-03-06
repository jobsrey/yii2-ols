<?php
$this->registerJs($this->render('_filterSearch.js'),\yii\web\View::POS_END);
$this->registerCss($this->render('_filterSearch.css'));
?>

<div class="col-xs-6 col-sm-12">
	<div id="accordion" class="panel panel-primary behclick-panel">
		<div class="panel-heading">
			<h3 class="panel-title">Search Filter Car</h3>
		</div>
		<div class="panel-body" >
			<div class="panel-heading " >
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse0">
						<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Price
					</a>
				</h4>
			</div>
			<div id="collapse0" class="panel-collapse collapse in" >
				<ul class="list-group">
					<li class="list-group-item">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								0 - 1000$
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox" >
							<label>
								<input type="checkbox" value="">
								1000$ - 2000$
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox"  >
							<label>
								<input type="checkbox" value="">
								2000$ - 6000$
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox"  >
							<label>
								<input type="checkbox" value="">
								More Than 6000$
							</label>
						</div>
					</li>
				</ul>
			</div>

			<div class="panel-heading " >
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse1">
						<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Brand
					</a>
				</h4>
			</div>
			<div id="collapse1" class="panel-collapse collapse in" >
				<ul class="list-group">
					<li class="list-group-item">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								citroen
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox" >
							<label>
								<input type="checkbox" value="">
								benz
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox"  >
							<label>
								<input type="checkbox" value="">
								bmw
							</label>
						</div>
					</li>
				</ul>
			</div>
			<div class="panel-heading" >
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse3"><i class="indicator fa fa-caret-down" aria-hidden="true"></i> Color</a>
				</h4>
			</div>
			<div id="collapse3" class="panel-collapse collapse in">
				<ul class="list-group">
					<li class="list-group-item">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								red
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox" >
							<label>
								<input type="checkbox" value="">
								blue
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox"  >
							<label>
								<input type="checkbox" value="">
								green
							</label>
						</div>
					</li>
				</ul>
			</div>
			<div class="panel-heading" >
				<h4 class="panel-title">
					<a data-toggle="collapse" href="#collapse2"><i class="indicator fa fa-caret-right" aria-hidden="true"></i> Collapsible list group</a>
				</h4>
			</div>
			<div id="collapse2" class="panel-collapse collapse">
				<ul class="list-group">
					<li class="list-group-item">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								7
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox" >
							<label>
								<input type="checkbox" value="">
								8
							</label>
						</div>
					</li>
					<li class="list-group-item">
						<div class="checkbox">
							<label>
								<input type="checkbox" value="">
								9
							</label>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>