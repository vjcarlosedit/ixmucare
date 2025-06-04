function openModal(id) {
    // Configura el contenido del modal según el platillo
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modal-img');
    const modalTitle = document.getElementById('modal-title');
    const modalPrice = document.getElementById('modal-price');

    // Datos del platillo
    const platillos = {
        platillo1: {
            img: 'platillo.jpg',
            title: 'Fuente de mariscos',
            price: '$1,700',
            description: 'Una deliciosa mezcla de mariscos frescos.'
        },
        platillo2: {
            img: 'platillo.jpg',
            title: 'Festín de camarones',
            price: '$1,100',
            description: 'Camarones preparados al estilo de la casa.'
        },
        platillo3: {
            img: 'platillo.jpg',
            title: 'Dedos de pescado tempura',
            price: '$195',
            description: 'Crujientes dedos de pescado con tempura ligera.'
        },
        // Agrega más platillos según sea necesario
    };

    // Asignar datos al modal
    modalImg.src = platillos[id].img;
    modalTitle.textContent = platillos[id].title;
    modalPrice.textContent = platillos[id].price;
    document.getElementById('modal-description').textContent = platillos[id].description;

    // Mostrar el modal
    modal.style.display = 'flex';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}

function addToCart(event, id) {
    // Evita que el clic en el botón active el evento del contenedor padre
    event.stopPropagation();

    // Aquí puedes implementar la lógica para agregar al carrito
    console.log(`Platillo ${id} agregado al carrito`);
    alert(`Platillo ${id} agregado al carrito`);
}
