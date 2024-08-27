// LocalStorage guarda y gestiona los materiales del inventario directamente en el navegador, permitiendo su persistencia.
// Al agregar un material desde el formulario, se almacena en LocalStorage y la tabla se actualiza automáticamente. 
//Además, se pueden editar o eliminar materiales, reflejando los cambios tanto en el almacenamiento como en la interfaz.


const materialForm = document.getElementById('materialForm');
const materialesTable = document.getElementById('materialesTable');

// Array para almacenar los materiales
let materiales = JSON.parse(localStorage.getItem('materiales')) || [];

// Función para mostrar los materiales en la tabla
function mostrarMateriales() {
    materialesTable.innerHTML = '';

    materiales.forEach((material, index) => {
        materialesTable.innerHTML += `
            <tr>
                <td>${material.nombre}</td>
                <td>${material.cantidad}</td>
                <td>${material.unidad}</td>
                <td>
                    <button onclick="editarMaterial(${index})">Editar</button>
                    <button onclick="eliminarMaterial(${index})">Eliminar</button>
                </td>
            </tr>
        `;
    });
}

// Función para agregar un nuevo material
materialForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const cantidad = document.getElementById('cantidad').value;
    const unidad = document.getElementById('unidad').value;

    const nuevoMaterial = {
        nombre,
        cantidad,
        unidad
    };

    materiales.push(nuevoMaterial);
    localStorage.setItem('materiales', JSON.stringify(materiales));

    mostrarMateriales();

    materialForm.reset();
});

// Función para eliminar un material
function eliminarMaterial(index) {
    materiales.splice(index, 1);
    localStorage.setItem('materiales', JSON.stringify(materiales));
    mostrarMateriales();
}

// Función para editar un material
function editarMaterial(index) {
    const material = materiales[index];

    document.getElementById('nombre').value = material.nombre;
    document.getElementById('cantidad').value = material.cantidad;
    document.getElementById('unidad').value = material.unidad;

    eliminarMaterial(index);
}

// Mostrar los materiales al cargar la página
mostrarMateriales();
