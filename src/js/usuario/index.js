
// VARIABLES
const btn = document.getElementById('btn')
// const select = document.getElementById('select')
//FUNCIONES
const consultarUsuario = async (e) => {
    e.preventDefault();

    let nameUsuario = document.getElementById('nameUsuario').value.trim();
    try {
        const consulta = await fetch(`https://api.github.com/users/${nameUsuario}`, {
            method: 'GET'
        });
        const datos = await consulta.json();
        
        
        if (datos && datos.login) {
            console.log(`Username: ${datos.login}`);
         
        } else {
            alert('Usuario no encontrado');
        }
    } catch (error) {
        console.log(error);
    }
}


const consultarPais = async () => {
    try {
        const consulta = await fetch('https://restcountries.com/v3.1/all', {
            method: 'GET'
        });
        const datos = await consulta.json();
        console.log(datos);
        
        const select = document.getElementById('select');
        
        datos.forEach(dato => {
            if (dato.idd && dato.idd.root && dato.idd.suffixes) {
                let dialCode = dato.idd.root + dato.idd.suffixes[0];
                let agregarOption = document.createElement('option');
                agregarOption.value = dialCode;
                agregarOption.textContent = `${dato.name.common} (+${dialCode})`;
                select.appendChild(agregarOption);
            }
        });
    } catch (error) {
        console.error('Error al obtener los datos de los países:', error);
    }
};


//EVENTOS
btn.addEventListener('click', consultarUsuario)
select.addEventListener('click', consultarPais)


// // IMPORTACION DE LIBRERIAS 
// // DECLARACION DE VARIABLES Y CONSTANTES
// const formulario = document.querySelector('form');
// const send = document.getElementById('send');
// const info = document.getElementById('info');
// const head = document.getElementById('head');

// info.style.display = 'none'

// // DECLARACION DE FUNCIONES
// const consultarPais = async (e) => {
//      e.preventDefault();

//     head.style.display = 'none';

//     let name = document.getElementById('name').value.trim()
    
//     if(name == ''){
//         alert('Ingrese un nombre')
//         return;
//     }
//     send.disabled = true;
//     try {
//         const consulta = await fetch(`https://restcountries.com/v3.1/name/${name}`, {
//             method: 'GET'
//         })

//         if (consulta.status == 200){
//             const datos = await consulta.json();
//             console.log(datos);
//             document.getElementById('nombrePais').textContent = `Country name: ${datos[0].name.common}`;
//             document.getElementById('capitalPais').textContent = `Capital City: ${datos[0].capital}`;
//             document.getElementById('continentePais').textContent = `Continent: ${datos[0].region}`;
//             document.getElementById('imgPais').src = datos[0].coatOfArms.png;

//             info.style.display = '';

//         } else {
//             alert('Ingrese correctamente el nombre del país')
//         }

//     } catch (error) {
//         console.log(error);
//     }
// }





// // MANEJO DE EVENTOS
// formulario.addEventListener('submit', consultarPais)
