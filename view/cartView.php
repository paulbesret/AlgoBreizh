<?php $this->title = "Panier"; ?>

  <div class="row">
	<table id="cartTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
				<th></th>    
                <th>Article</th>    
                <th>Prix</th>
				<th>Quantité</th>
				<th></th>
            </tr>
        </thead>
        <tbody>
			<?php $position = 0; ?>
			<?php foreach ($products as $product):?>
			<tr>
				<td class="center"><img id="article_img_<?= $product->Id ?>" height="36" width="36" src="thumbnail/<?= $product ->Reference ?>.jpg"></td>
				<td><?= $product->Name; ?></td>
				<td><?= $product->Price; ?> €</td>
				<td>&times;1</td>
				<td class="center" style="width: 30%;">
					<a href="index.php?action=buyFromCart&productId=<?= $position; ?>" id="buyBtn" class="btn btn-sm btn-success">ACHETER CET ARTICLE</a> &nbsp; 
					<a href="index.php?action=removeFromCart&productId=<?= $position; ?>" id="deleteBtn" class="btn btn-sm btn-danger">SUPPRIMER</a>
				</td>
			</tr>
			<?php $position = $position + 1;?>
			<?php endforeach; ?>
        </tbody>
		<tr id="actionsBtn" class="center hidden">
			<td colspan="5" style="border:solid 1px white; background: white;">
				<br />
				<a href="index.php?action=buyAllFromCart" class="btn btn-sm btn-success">PASSER COMMANDE</a> &nbsp; 
				<a href="index.php?action=clearCart" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> VIDER LE PANIER</a>
			</td>
		</tr>
    </table>
  </div>

<script>
  $(document).ready(function() {
    //Paramètres du DataTable
	$("#cartTable").DataTable({
		"stateSave": true,
		"deferRender": false,
		"bFilter": false,
  		"bLengthChange": false,
		"responsive": true,
		"language": { 
			"url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/French.json'
		},
	  	"aoColumns": [
		   {"bSortable": false},
		   {"bSortable": true},
		   {"bSortable": false},
		   {"bSortable": false},
		   {"bSortable": false}
	  	],
		"processing": false,
	  	"serverSide": false,
	});
	setTimeout(function(){
	if ($(".dataTables_empty")[0]) {
	  $(".dataTables_empty").html("<p class=\"center\">Vous ne disposez d'aucun produit. Pour ajouter un produit à votre panier, consultez la <a href=\"index.php?action=products\"><span class=\"glyphicon glyphicon-shopping-cart\"></span> Boutique</a></p>");
	  $(".dataTables_info").addClass("hidden");
	  $(".pagination").addClass("hidden");
	} else {
	  $("#actionsBtn").removeClass("hidden");
	}}, 500);
  });
</script>