document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('modal-mesa');
    const selectMesaButton = document.getElementById('select-mesa-btn');
    const closeModal = document.querySelector('.close-button');
    const modalContent = document.querySelector('.modal-content');
    const mesaButtons = document.querySelectorAll('.mesa-button');

    // Abrir modal al hacer clic en el botón "Seleccionar Mesa"
    selectMesaButton.addEventListener('click', (event) => {
        event.preventDefault(); // Detiene cualquier comportamiento predeterminado
        event.stopPropagation(); // Evita que el evento se propague
        modal.style.display = 'flex'; // Muestra el modal
    });

    // Cerrar modal al hacer clic en la "X"
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Cerrar modal al hacer clic fuera del contenido
    modal.addEventListener('click', (event) => {
        if (!modalContent.contains(event.target)) {
            modal.style.display = 'none';
        }
    });

    // Seleccionar una mesa
    mesaButtons.forEach(button => {
        button.addEventListener('click', () => {
            alert(`Mesa seleccionada: ${button.textContent.trim()}`);
            modal.style.display = 'none'; // Cierra el modal
        });
    });
});
