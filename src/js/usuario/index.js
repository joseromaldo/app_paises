
    // VARIABLES
    const btn = document.getElementById('btn');
    const usernameInput = document.getElementById('username');
    const nameInput = document.getElementById('name');
    const countrySelect = document.getElementById('country');
    const areaCodeInput = document.getElementById('area-code');
    const phoneInput = document.getElementById('phone');
    const emailInput = document.getElementById('email');
    const tabla = document.getElementById('tabla');
    const formulario = document.getElementById('formulario');

    // FUNCIONES
    const consultarUsuario = async (e) => {
        e.preventDefault();

        let username = usernameInput.value.trim();
        try {
            const consulta = await fetch(`https://api.github.com/users/${username}`, {
                method: 'GET'
            });
            const datos = await consulta.json();

            if (datos && datos.name) {
                nameInput.value = datos.name;
                console.log(`Nombre: ${datos.name}`);
            } else {
                alert('Usuario no encontrado');
            }
        } catch (error) {
            console.log(error);
        }
    };



    const cargarPaises = async () => {
        try {
            const consulta = await fetch('https://restcountries.com/v3.1/all', {
                method: 'GET'
            });
            const datos = await consulta.json();

            datos.forEach(dato => {
                if (dato.idd && dato.idd.root && dato.idd.suffixes) {
                    let dialCode = dato.idd.root + dato.idd.suffixes[0];
                    let agregarOption = document.createElement('option');
                    agregarOption.value = dialCode;
                    agregarOption.textContent = `${dato.name.common} (+${dialCode})`;
                    countrySelect.appendChild(agregarOption);
                }
            });
        } catch (error) {
            console.error('Error al obtener los datos de los países:', error);
        }
    };

    const actualizarCodigoArea = () => {
        const selectedCountry = countrySelect.options[countrySelect.selectedIndex];
        if (selectedCountry.value !== 'Seleccionar País') {
            areaCodeInput.value = selectedCountry.value;
        } else {
            areaCodeInput.value = '';
        }
    };

    const getUsuarios = async (alerta ='si') => {
        const nombre = formulario.name.value.trim();
        const telefono = formulario.phone.value.trim();
        const correo = formulario.email.value.trim();
        
      
        const url = `/app_paises/controllers/usuario.php?usuario_nombre=${nombre}&usuario_telefono=${telefono}&usuario_correo=${correo}`;
      
        const config = {
            method: 'GET'
        };
    
        try {
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log(data);
           
            tabla.tBodies[0].innerHTML = '';
            const fragment = document.createDocumentFragment();
            let contador = 1;
    
            if (respuesta.status === 200) {
                if(alerta =='si'){
                    Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        icon: "success",
                        title: 'Usuarios encontrados',
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    }).fire();
    
                }
    
                if (data.length > 0) {
                    data.forEach(usu => {
                        const tr = document.createElement('tr');
                        const celda1 = document.createElement('td');
                        const celda2 = document.createElement('td');
                        const celda3 = document.createElement('td');
                        const celda4 = document.createElement('td');
    
                        celda1.innerText = contador;
                        celda2.innerText = usu.USUARIO_NOMBRE;
                        celda3.innerText = usu.USUARIO_TELEFONO;
                        celda4.innerText = usu.USUARIO_CORREO;

    
    
                        tr.appendChild(celda1);
                        tr.appendChild(celda2);
                        tr.appendChild(celda3);
                        tr.appendChild(celda4);
                        fragment.appendChild(tr);
    
                        contador++;
                    });
                } else {
                    const tr = document.createElement('tr');
                    const td = document.createElement('td');
                    td.innerText = 'No hay usuarios disponibles';
                    td.colSpan = 4 ;
    
                    tr.appendChild(td);
                    fragment.appendChild(tr);
                }
            } else {
                console.log('Error al cargar ');
            }
    
            tabla.tBodies[0].appendChild(fragment);
        } catch (error) {
            console.log(error);
        }
    };
    
    
    
    const guardarUsu = async (e) => {
        e.preventDefault();
        btn.disabled = true;
    
        const url = '/app_paises/controllers/usuario.php';
        const formData = new FormData(formulario);
        formData.append('tipo', 1);
        formData.delete('usuario_id');
    
        const config = {
            method: 'POST',
            body: formData
        };
    
        try {
            console.log('Enviando datos:', ...formData.entries());
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();
            console.log('Respuesta recibida:', data);
            const { mensaje, codigo, detalle } = data;
            if (respuesta.ok && codigo === 1) {
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "success",
                    title: mensaje,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
    
                formulario.reset();
                getUsuarios('no'); // Corrección aquí
            } else {
                console.log('Error:', detalle);
                Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    icon: "error",
                    title: 'Error al guardar',
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                }).fire();
            }
        } catch (error) {
            console.log('Error de conexión:', error);
            Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                icon: "error",
                title: 'Error de conexión',
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire();
        }
        btn.disabled = false;
    };
    

    
    

    // EVENTOS
    usernameInput.addEventListener('blur', consultarUsuario);
    countrySelect.addEventListener('change', actualizarCodigoArea);
    document.addEventListener('DOMContentLoaded', cargarPaises);
    btn.addEventListener('click', guardarUsu);