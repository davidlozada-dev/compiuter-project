(function () {
	'use strict';
	window.addEventListener(
		'load',
		function () {
			document.getElementById('formulario1')?.addEventListener(
				'submit',
				(e) => {
					let cedula2 = document.getElementById('cedula2')?.value;

					// Validacion de cedula2
					if (cedula2 != undefined) {
						if (cedula2.length == 0) {
							mensaje1(e, 'cedulaDiv2', 'cedula2', 'Ingrese la cédula');
						} else if (cedula2.length > 8) {
							mensaje1(e, 'cedulaDiv2', 'cedula2', 'Ingrese una cédula válida');
						} else if (numericoValidar(cedula2) === false) {
							mensaje1(e, 'cedulaDiv2', 'cedula2', 'Solo caracteres numericos');
						} else {
							resetearError1('cedulaDiv2', 'cedula2');
						}
					}
				},
				false
			);

			document.getElementById('formulario')?.addEventListener(
				'submit',
				(e) => {
					let alfanumerico = document.getElementById('alfanumerico')?.value;
					let nombre = document.getElementById('nombre')?.value;
					let apellido = document.getElementById('apellido')?.value;
					let cedula = document.getElementById('cedula')?.value;
					let telefono = document.getElementById('telefono')?.value;
					let direccion = document.getElementById('direccion')?.value;
					let equipo = document.getElementById('equipo')?.value;
					let fallaCliente = document.getElementById('fallaCliente')?.value;
					let fallaInicial = document.getElementById('fallaInicial')?.value;
					let fechaSalida = document.getElementById('fechaSalida')?.value;
					let contrasena = document.getElementById('contrasena')?.value;
					let repetirContrasena = document.getElementById('repetirContrasena')?.value;
					let correo = document.getElementById('correo')?.value;
					let cargo = document.getElementById('cargo')?.value;
					let categoria = document.getElementById('categoria')?.value;
					let marca = document.getElementById('marca')?.value;
					let descripcion = document.getElementById('descripcion')?.value;
					let solucion = document.getElementById('solucion')?.value;
					let diagnosticos = document.getElementById('diagnosticos')?.value;
					let precio = document.getElementById('precio')?.value;
					let divisa = document.getElementById('divisa')?.value;

					// Validacion de alfanumerico
					if (alfanumerico != undefined) {
						if (alfanumerico.length == 0) {
							mensaje(e, 'alfanumericoDiv', 'alfanumerico', 'Rellene este campo');
						} else if (alfanumerico.length > 50) {
							mensaje(e, 'alfanumericoDiv', 'alfanumerico', 'Es muy largo');
						} else if (alfanumericoValidar(alfanumerico) === false) {
							mensaje(e, 'alfanumericoDiv', 'alfanumerico', 'Solo caracteres alfanumericos');
						} else {
							resetearError('alfanumericoDiv', 'alfanumerico');
						}
					}

					// Validacion de nombre
					if (nombre != undefined) {
						if (nombre.length == 0) {
							mensaje(e, 'nombreDiv', 'nombre', 'Ingrese su nombre');
						} else if (nombre.length > 50) {
							mensaje(e, 'nombreDiv', 'nombre', 'El nombre es muy largo');
						} else if (nombreValidar(nombre) === false) {
							mensaje(e, 'nombreDiv', 'nombre', 'Solo caracteres alfabeticos');
						} else {
							resetearError('nombreDiv', 'nombre');
						}
					}

					// Validacion de apellido
					if (apellido != undefined) {
						if (apellido.length == 0) {
							mensaje(e, 'apellidoDiv', 'apellido', 'Ingrese su apellido');
						} else if (apellido.length > 50) {
							mensaje(e, 'apellidoDiv', 'apellido', 'El apellido es muy largo');
						} else if (nombreValidar(apellido) === false) {
							mensaje(e, 'apellidoDiv', 'apellido', 'Solo caracteres alfabeticos');
						} else {
							resetearError('apellidoDiv', 'apellido');
						}
					}

					// Validacion de cedula
					if (cedula != undefined) {
						if (cedula.length == 0) {
							mensaje(e, 'cedulaDiv', 'cedula', 'Ingrese la cédula');
						} else if (cedula.length > 8) {
							mensaje(e, 'cedulaDiv', 'cedula', 'Ingrese una cédula válida');
						} else if (numericoValidar(cedula) === false) {
							mensaje(e, 'cedulaDiv', 'cedula', 'Solo caracteres numericos');
						} else {
							resetearError('cedulaDiv', 'cedula');
						}
					}

					// Validacion de telefono
					if (telefono != undefined) {
						if (telefono.length == 0) {
							mensaje(e, 'telefonoDiv', 'telefono', 'Ingrese el teléfono');
						} else if (telefono.length !== 11) {
							mensaje(e, 'telefonoDiv', 'telefono', 'Ingrese un teléfono válido');
						} else if (numericoValidar(telefono) === false) {
							mensaje(e, 'telefonoDiv', 'telefono', 'Solo caracteres numericos');
						} else {
							resetearError('telefonoDiv', 'telefono');
						}
					}

					// Validacion de direccion
					if (direccion != undefined) {
						if (direccion.length > 100) {
							mensaje(e, 'direccionDiv', 'direccion', 'La direccion es muy larga');
						} else {
							resetearError('direccionDiv', 'direccion');
						}
					}

					// Validacion de equipo
					if (equipo != undefined) {
						if (equipo.length == 0) {
							mensaje(e, 'equipoDiv', 'equipo', 'Seleccione un equipo');
						} else {
							resetearError('equipoDiv', 'equipo');
						}
					}

					// Validacion de fallaCliente
					if (fallaCliente != undefined) {
						if (fallaCliente.length == 0) {
							mensaje(e, 'fallaClienteDiv', 'fallaCliente', 'Ingrese la falla del cliente');
						} else {
							resetearError('fallaClienteDiv', 'fallaCliente');
						}
					}

					// Validacion de fallaInicial
					if (fallaInicial != undefined) {
						if (fallaInicial.length == 0) {
							mensaje(e, 'fallaInicialDiv', 'fallaInicial', 'Ingrese la falla inicial');
						} else {
							resetearError('fallaInicialDiv', 'fallaInicial');
						}
					}

					// Validacion de fechaSalida
					if (fechaSalida != undefined) {
						if (fechaSalida.length == 0) {
							mensaje(e, 'fechaSalidaDiv', 'fechaSalida', 'Ingrese la fecha de salida');
						} else {
							resetearError('fechaSalidaDiv', 'fechaSalida');
						}
					}

					// Validacion de contraseña
					if (contrasena != undefined) {
						if (contrasena.length == 0) {
							mensaje(e, 'contrasenaDiv', 'contrasena', 'Ingrese la contraseña');
						} else if (contrasena.length > 20) {
							mensaje(e, 'contrasenaDiv', 'contrasena', 'La contraseña es muy larga');
						} else if (contrasenaValidar(contrasena) === false) {
							mensaje(e, 'contrasenaDiv', 'contrasena', 'Ingrese una contraseña válida según las reglas');
						} else {
							resetearError('contrasenaDiv', 'contrasena');
						}
					}

					// Validacion de repita contraseña
					if (repetirContrasena != undefined) {
						if (repetirContrasena.length == 0) {
							mensaje(e, 'repetirContrasenaDiv', 'repetirContrasena', 'Repita la contraseña');
						} else if (contrasena === repetirContrasena) {
							resetearError('repetirContrasenaDiv', 'repetirContrasena');
						} else {
							mensaje(e, 'repetirContrasenaDiv', 'repetirContrasena', 'Las contraseñas deben ser iguales');
						}
					}

					// Validacion de correo
					if (correo != undefined) {
						if (correo.length == 0) {
							mensaje(e, 'correoDiv', 'correo', 'Ingrese un correo');
						} else if (correo.length >= 100) {
							mensaje(e, 'correoDiv', 'correo', 'El correo es muy largo');
						} else if (correoValidar(correo) === false) {
							mensaje(e, 'correoDiv', 'correo', 'Ingrese un correo válido');
						} else {
							resetearError('correoDiv', 'correo');
						}
					}

					// Validacion de cargo
					if (cargo != undefined) {
						if (cargo.length == 0) {
							mensaje(e, 'cargoDiv', 'cargo', 'Seleccione un cargo');
						} else {
							resetearError('cargoDiv', 'cargo');
						}
					}

					// Validacion de categoria
					if (categoria != undefined) {
						if (categoria.length == 0) {
							mensaje(e, 'categoriaDiv', 'categoria', 'Seleccione una categoria');
						} else {
							resetearError('categoriaDiv', 'categoria');
						}
					}

					// Validacion de marca
					if (marca != undefined) {
						if (marca.length == 0) {
							mensaje(e, 'marcaDiv', 'marca', 'Ingrese una marca');
						} else if (marca.length > 30) {
							mensaje(e, 'marcaDiv', 'marca', 'El nombre de la marca es muy largo');
						} else {
							resetearError('marcaDiv', 'marca');
						}
					}

					// Validacion de descripcion
					if (descripcion != undefined) {
						if (descripcion.length > 100) {
							mensaje(e, 'descripcionDiv', 'descripcion', 'La descripción es muy larga');
						} else {
							resetearError('descripcionDiv', 'descripcion');
						}
					}

					// Validacion de solucion
					if (solucion != undefined) {
						if (solucion.length == 0) {
							mensaje(e, 'solucionDiv', 'solucion', 'Ingrese una solución');
						} else if (solucion.length > 100) {
							mensaje(e, 'solucionDiv', 'solucion', 'La descripción es muy larga');
						} else {
							resetearError('solucionDiv', 'solucion');
						}
					}

					// Validacion de diagnosticos
					if (diagnosticos != undefined) {
						if (diagnosticos.length == 0) {
							mensaje(e, 'diagnosticosDiv', 'diagnosticos', 'Seleccione un diagnostico');
						} else {
							resetearError('diagnosticosDiv', 'diagnosticos');
						}
					}

					// Validacion de precio
					if (precio != undefined) {
						if (precio.length == 0) {
							mensaje(e, 'precioDiv', 'precio', 'Ingrese el precio');
						} else if (numericoValidar(precio) === false) {
							mensaje(e, 'precioDiv', 'precio', 'Solo caracteres numericos');
						} else {
							resetearError('precioDiv', 'precio');
						}
					}

					// Validacion de divisa
					if (divisa != undefined) {
						if (divisa.length == 0) {
							mensaje(e, 'divisaDiv', 'divisa', 'Seleccione una divisa');
						} else {
							resetearError('divisaDiv', 'divisa');
						}
					}
				},
				false
			);
		},
		false
	);
})();

function pausa(e) {
	e.preventDefault();
	e.stopPropagation();
}

function nombreValidar(texto) {
	const nombreExpresion = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
	return nombreExpresion.test(texto);
}

function correoValidar(texto) {
	const correoExpresion = /[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}/;
	return correoExpresion.test(texto);
}

function contrasenaValidar(texto) {
	const claveExpresion =
		/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z])(?=.*[.*/#$%&Â¡!_\-,@:;?Â¿])(?=.*[a-zA-Z.*/#$%&Â¡!_\-,@:;?Â¿]).{8,20}$/;
	return claveExpresion.test(texto);
}

function alfanumericoValidar(texto) {
	const alfanumericoExpresion =
		/^[a-zA-ZÀ-ÿ\u00f1\u00d10-9]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d10-9]*)*[a-zA-ZÀ-ÿ\u00f1\u00d10-9]+$/;
	return alfanumericoExpresion.test(texto);
}

function numericoValidar(texto) {
	const numericoExpresion = /[0-9]/;
	return numericoExpresion.test(texto);
}

function mensaje(e, elem1, elem2, mensaje) {
	const caja = formulario.querySelector(`#${elem1}`);
	const input = formulario.querySelector(`#${elem2}`);
	caja.style.display = 'block';
	input.className += ' is-invalid';
	pausa(e);
	return (caja.innerHTML = mensaje);
}

function resetearError(elem1, elem2) {
	const resetCaja = formulario.querySelector(`#${elem1}`);
	const resetInput = formulario.querySelector(`#${elem2}`);
	resetCaja.style.display = '';
	resetInput.className = 'form-control is-valid';
}

function mensaje1(e, elem1, elem2, mensaje) {
	const caja1 = formulario1.querySelector(`#${elem1}`);
	const input1 = formulario1.querySelector(`#${elem2}`);
	caja1.style.display = 'block';
	input1.className += ' is-invalid';
	pausa(e);
	return (caja1.innerHTML = mensaje);
}

function resetearError1(elem1, elem2) {
	const resetCaja1 = formulario1.querySelector(`#${elem1}`);
	const resetInput1 = formulario1.querySelector(`#${elem2}`);
	resetCaja1.style.display = '';
	resetInput1.className = 'form-control is-valid';
}
