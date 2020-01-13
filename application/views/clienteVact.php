<body class="container col-md-5">
	<?php foreach ($datos as $val) { ?>

		<form id="formCliente" action="<?= base_url('clienteC/actualizar') ?>" method="POST" style="margin-top: 10%;" onsubmit="return validar();">
			<input type="hidden" name="id_cliente" id="id" value="<?= $val->id_cliente ?>" >
			<div align="center">
				<label style="font-weight: 900; color: black; font-size: 200%; font-family: arial;">ACTUALIZE EL CLIENTE</label>
			</div>
			<div>
				<label>Nombre</label>
				<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del cliente" maxlength="30" value="<?= $val->nombre ?>">
			</div>
			<div>
				<label>Apellido</label>
				<input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese apellido del cliente" maxlength="30" value="<?= $val->apellido ?>">
			</div>
			<div>
				<label>Suscripcion</label>
				<select id="suscripcion" name="suscripcion" class="form-control">
					<option value="">Seleccione suscripcion</option>
					<?php foreach ($suscripcion as $va) { ?>
						<option value="<?= $va->id_suscripcion ?>" <?php if($va->id_suscripcion==$val->id_suscripcion){echo "Selected";} ?>><?= $va->suscripcion ?></option>
					<?php }  ?>
				</select>
			</div>
			<div>
				<label>Genero</label>
				<select id="genero" name="genero" class="form-control">
					<option value="">Seleccione genero</option>
					<?php foreach ($genero as $va) { ?>
						<option value="<?= $va->id_genero ?>" <?php if($va->id_genero==$val->id_genero){echo "Selected";} ?>><?= $va->genero ?></option>
					<?php }  ?>
				</select>
			</div>

		</div>
		<input type="submit" value="ACTUALIZAR" name="ACTUALIZAR" class="btn btn-primary">
	</form>
<?php } ?>

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