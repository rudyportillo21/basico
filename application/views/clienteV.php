
<body class="container" >
	<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#nueCliente">Nuevo Cliente</button>
	<table border="1" class="table table-dark table-hover">
		<thead>
			<tr>
				<td>N°</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Suscripcion</td>
				<td>Genero</td>
				<td>Eliminar</td>
				<td>Actualizar</td>
			</tr>
		</thead>
		<tbody id="tabla_cliente">
			<?php $n=1; foreach ($cliente as $va) { ?>
				<tr>
					<td><?= $n; ?></td>
					<td><?= $va->nombre ?></td>
					<td><?= $va->apellido ?></td>
					<td><?= $va->suscripcion ?></td>
					<td><?= $va->genero ?></td>
					<td><a href="<?= base_url('clienteC/eliminar/').$va->id_cliente ?>" onclick="return confirm('Esta seguro de eliminar este registro')"><button class="btn btn-danger">ELIMINAR</button></a></td>
					<td><a href="<?= base_url('clienteC/get_datos/').$va->id_cliente ?>"><button class="btn btn-primary">EDITAR</button></a></td>
					
				</tr>
			<?php }  ?>
		</tbody>
	</table>

	

	<div class="modal" tabindex="-1" role="dialog" id="nueCliente">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo Cliente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formCliente" action="<?= base_url('clienteC/ingresar') ?>" method="POST" onsubmit="return validar();" >
						<input type="hidden" name="id_cliente" id="id">
						<div>
							<label>Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del cliente" maxlength="30">
						</div>
						<div>
							<label>Apellido</label>
							<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido del cliente" maxlength="30">
						</div>
						<div>
							<label>Suscripcion</label>
							<select id="suscripcion" name="suscripcion" class="form-control">
								<option value="">Seleccione suscripcion</option>
								<?php foreach ($suscripcion as $va) { ?>
									<option value="<?= $va->id_suscripcion ?>"><?= $va->suscripcion ?></option>
								<?php }  ?>
							</select>
						</div>
						<div>
							<label>Genero</label>
							<select id="genero" name="genero" class="form-control">
								<option value="">Seleccione genero</option>
								<?php foreach ($genero as $va) { ?>
									<option value="<?= $va->id_genero ?>"><?= $va->genero ?></option>
								<?php }  ?>
							</select>
						</div>

					</div>
					<div class="modal-footer">
						<input type="submit" value="INGRESAR" name="INGRESAR" class="btn btn-primary">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php if(isset($msj)){
		if($msj=='eli'){
			header('refresh: 4; url=http://localhost/rudy_basico/clienteC/'); ?>
			<script>
				alertify.notify('Eliminado exitosamente','success',4,null);
			</script>
		<?php } if($msj=='add'){
			header('refresh: 4; url=http://localhost/rudy_basico/clienteC/'); ?>
			<script>
				alertify.notify('Ingresado exitosamente','success',4,null);
			</script>
		<?php }	if($msj=='edi'){
			header('refresh: 4; url=http://localhost/rudy_basico/clienteC/'); ?>
			<script>
				alertify.notify('Actualizado exitosamente','success',4,null);
			</script>
		<?php } if($msj==false){
			header('refresh: 4; url=http://localhost/rudy_basico/clienteC/'); ?>
			<script>
				alertify.notify('Error, Ocurrio un conflicto!!!','error',4,null);
			</script>
		<?php }	} ?>

		<script type="text/javascript">
			function validar(){
				var nombre = document.getElementById("nombre").value;
				var apellido = document.getElementById("apellido").value;
				var suscripcion = document.getElementById("suscripcion").selectedIndex;
				var genero = document.getElementById("genero").selectedIndex;

				if (nombre.length==0 || nombre.length>30) {
					document.getElementById("nombre").style.borderColor="red";
					document.getElementById("nombre").placeholder="Campo obligatorio";
					document.getElementById("nombre").style.boxShadow="0 0 5px red";
					return false;
				}else{
					document.getElementById("nombre").style.borderColor="green";
					document.getElementById("nombre").style.boxShadow="0 0 5px green";
				}

				if (apellido.length==0 || apellido.length>30) {
					document.getElementById("apellido").style.borderColor="red";
					document.getElementById("apellido").placeholder="Campo obligatorio";
					document.getElementById("apellido").style.boxShadow="0 0 5px red";
					return false;
				}else{
					document.getElementById("apellido").style.borderColor="green";
					document.getElementById("apellido").style.boxShadow="0 0 5px green";
				}

				if (suscripcion=='') {
					document.getElementById("suscripcion").style.borderColor="red";
					document.getElementById("suscripcion").style.boxShadow="0 0 5px red";
					return false;
				}else{
					document.getElementById("suscripcion").style.borderColor="green";
					document.getElementById("suscripcion").style.boxShadow="0 0 5px green";
				}

				if (genero=='') {
					document.getElementById("genero").style.borderColor="red";
					document.getElementById("genero").style.boxShadow="0 0 5px red";
					return false;
				}else{
					document.getElementById("genero").style.borderColor="green";
					document.getElementById("genero").style.boxShadow="0 0 5px green";
				}

				return true;
			}
		</script>