<?php  $this->title = "Commande N°:".str_pad($Order->id(), 8, '0', STR_PAD_LEFT).' Client: '.$Order->customer()->firstName().' '.$Order->customer()->lastName(); ?>
  <div class="row">
	<table id="orderContentTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th></th>    
				<th>Article</th>    
				<th>Prix (unitaire)</th>
				<th>Quantité</th>
			</tr>
		</thead>
		<tbody>
			
			<?php $totalPrice = 0; ?>
			<?php foreach ($Order->content() as $product): ?>
			<tr>
				<td class="center"><img id="article_img_<?= $product->reference(); ?>" height="36" width="36" src="thumbnail/<?= $product->reference() ?>.jpg"></td>
				<td><?= $product->name() ?></td>
				<td><?= $product->price() ?> €</td>
				<td>x<?= $product->quantity() ?> </td>
			</tr>
			<?php $totalPrice += $product->price()*$product->quantity(); ?>
			<?php endforeach; ?>
		</tbody>
		<tr id="actionsBtn" class="center ">
			<td colspan="5" id="table-footer">
				<br />
				<p style="font-size: 16px;">Prix total: <b style="color: red;"><?= $totalPrice ?> €</b></p>
				<br />
				</td>
		</tr>
	</table>
  </div>

<script>
  $(document).ready(function() {
    //Paramètres du DataTable
	$("#cartTable").DataTable({
		"stateSave": true,
		"ordering": false,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"bPaginate": true,
		"iDisplayLength": 5,
		"language": { 
			"url": 'style/french.cart.json'
		},
	  	"aoColumns": [
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true},
		   {"bSortable": true}
	  	],
		"processing": true,
	  	"serverSide": false,
	});
  });