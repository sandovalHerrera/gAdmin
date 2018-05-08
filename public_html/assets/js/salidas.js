jQuery(function() {
	jQuery('#agg').click(function() {
		var producto = jQuery('#ddlPro option:selected').text();
		var categoria= jQuery('#ddlCat option:selected').text();
		var cantidad = jQuery('#txtCant').val();
		var lista = '<tr><td>' + producto + '</td> <td>' + categoria + '</td> <td>' + cantidad + '</td> </tr>';
		jQuery('#lista').append(lista);
	})
})