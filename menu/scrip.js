function openModal(id) {
    // Configura el contenido del modal según el platillo
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modal-img');
    const modalTitle = document.getElementById('modal-title');
    const modalPrice = document.getElementById('modal-price');

    // Datos del platillo
    const platillos = {
        novedades1: {
            img: 'assets/images/menu/novedades/Langosta-mantequilla.jpg',
            title: 'Langosta a la mantequilla',
            price: '$550',
            description: 'Langosta fresca bañada en mantequilla.'
        },
        novedades2: {
            img: 'assets/images/menu/novedades/Chilpachole-jaiba.jpg',
            title: 'Chilpachole de jaiba',
            price: '$240',
            description: 'Sopa veracruzana de jaiba y especias.'
        },
        novedades3: {
            img: 'assets/images/menu/novedades/Camarones Teriyaki.jpg',
            title: 'Camarones Teriyaki',
            price: '$330',
            description: 'Camarones glaseados en salsa teriyaki.'
        },

        adicional1: {
            img: 'assets/images/menu/adicionales/Aguacate.jpg',
            title: 'Aguacate',
            price: '$50',
            description: 'Aguacate fresco listo para acompañar.'
        },
        adicional2: {
            img: 'assets/images/menu/adicionales/Guacamole.jpg',
            title: 'Guacamole',
            price: '$70',
            description: 'Guacamole cremoso con ingredientes frescos.'
        },
        adicional3: {
            img: 'assets/images/menu/adicionales/Ensaladavariada.jpg',
            title: 'Ensalada variada',
            price: '$60',
            description: 'Ensalada mixta con vegetales de estación.'
        },
        adicional4: {
            img: 'assets/images/menu/adicionales/Verdurascocidas.jpeg',
            title: 'Verduras cocidas',
            price: '$60',
            description: 'Vegetales cocidos al vapor, frescos y sanos.'
        },
        adicional5: {
            img: 'assets/images/menu/adicionales/Papasfritas.jpg',
            title: 'Papas fritas',
            price: '$60',
            description: 'Papas crujientes doradas al punto perfecto.'
        },

        entrada1: {
            img: 'assets/images/menu/entradas/Fuentedemariscos.jpg',
            title: 'Fuente de mariscos',
            price: '$1,700',
            description: 'Gran variedad de mariscos frescos.'
        },
        entrada2: {
            img: 'assets/images/menu/entradas/Festíndecamarones.jpg',
            title: 'Festín de camarones',
            price: '$1,100',
            description: 'Camarones seleccionados, frescos y deliciosos.'
        },
        entrada3: {
            img: 'assets/images/menu/entradas/dedos-de-pescado-tempura.webp',
            title: 'Dedos de pescado',
            price: '$195',
            description: 'Crujientes dedos de pescado en tempura.'
        },
        entrada4: {
            img: 'assets/images/menu/entradas/Tostonesdeplátano.jpg',
            title: 'Tostones de plátano',
            price: '$55',
            description: 'Plátano frito acompañado de salsas.'
        },
        entrada5: {
            img: 'assets/images/menu/entradas/Frijolesrefritos.jpeg',
            title: 'Frijoles refritos',
            price: '$45',
            description: 'Frijoles refritos con un toque casero.'
        },
        entrada6: {
            img: 'assets/images/menu/entradas/Chicharrónypulpo.jpg',
            title: 'Chicharrón y pulpo',
            price: '$140',
            description: 'Crujiente chicharrón con pulpo fresco.'
        },
        entrada7: {
            img: 'assets/images/menu/entradas/Guacamolemexicano.jpg',
            title: 'Guacamole mexicano',
            price: '$60',
            description: 'Guacamole fresco con ingredientes mexicanos.'
        },
        entrada8: {
            img: 'assets/images/menu/entradas/Pandecazón.jpeg',
            title: 'Pan de cazón',
            price: '$170',
            description: 'Tortillas rellenas de cazón con salsa.'
        },
        entrada9: {
            img: 'assets/images/menu/entradas/Plátanorellenodecamarón.jpg',
            title: 'Plátano relleno de camarón',
            price: '$195',
            description: 'Plátano frito relleno de camarón fresco.'
        },
        entrada10: {
            img: 'assets/images/menu/entradas/Plátanorellenodemariscos.jpeg',
            title: 'Plátano relleno de mariscos',
            price: '$195',
            description: 'Plátano relleno con una mezcla de mariscos.'
        },
        
        brocheta1: {
            img: 'assets/images/menu/brochetas/brochetas_de_camaron_asadas.jpg',
            title: 'Brochetas de camarón asadas',
            price: '$195',
            description: 'Camarones asados en brochetas deliciosas.'
        },
        brocheta2: {
            img: 'assets/images/menu/brochetas/Brochetasdemarytierra.jpg',
            title: 'Brochetas de mar y tierra',
            price: '$195',
            description: 'Brochetas con camarón, carne y vegetales.'
        },
        brocheta3: {
            img: 'assets/images/menu/brochetas/Brochetasderesalasbrasas.jpg',
            title: 'Brochetas de res a las brasas',
            price: '$200',
            description: 'Carne de res asada al punto perfecto.'
        },
        
        camarones1: {
            img: 'assets/images/menu/camarones/Camaronesalchiltepín.jpg',
            title: 'Camarones al chiltepín',
            price: '$195',
            description: 'Camarones preparados con chile chiltepín.'
        },
        camarones2: {
            img: 'assets/images/menu/camarones/Camarones diabla.jpg',
            title: 'Camarones a la diabla',
            price: '$195',
            description: 'Camarones en salsa picante estilo diabla.'
        },
        camarones3: {
            img: 'assets/images/menu/camarones/Camaronesalamantequilla.jpg',
            title: 'Camarones a la mantequilla',
            price: '$195',
            description: 'Camarones salteados con mantequilla.'
        },
        camarones4: {
            img: 'assets/images/menu/camarones/Camaronesalajo.jpg',
            title: 'Camarones al ajo',
            price: '$195',
            description: 'Camarones cocinados con ajo fresco.'
        },
        camarones5: {
            img: 'assets/images/menu/camarones/Camaronesalajillo.jpg',
            title: 'Camarones al ajillo',
            price: '$195',
            description: 'Camarones al ajillo con un toque picante.'
        },
        camarones6: {
            img: 'assets/images/menu/camarones/Camaronesempanizados.jpg',
            title: 'Camarones empanizados',
            price: '$195',
            description: 'Camarones crujientes con empanizado dorado.'
        },
        camarones7: {
            img: 'assets/images/menu/camarones/Camaronesalcoco.jpg',
            title: 'Camarones al coco',
            price: '$195',
            description: 'Camarones cubiertos con coco rallado.'
        },
        camarones8: {
            img: 'assets/images/menu/camarones/Camaronesacapulco.jpg',
            title: 'Camarones acapulco',
            price: '$195',
            description: 'Camarones preparados estilo Acapulco.'
        },
        camarones9: {
            img: 'assets/images/menu/camarones/Camaronesensabanados.jpg',
            title: 'Camarones ensabanados',
            price: '$195',
            description: 'Camarones envueltos en jamón y queso.'
        },
        camarones10: {
            img: 'assets/images/menu/camarones/Camaronesphiladelphia.jpg',
            title: 'Camarones philadelphia',
            price: '$195',
            description: 'Camarones rellenos de queso philadelphia.'
        },

        ceviche1: {
            img: 'assets/images/menu/ceviches/Ceviche-de-Pescado.jpg',
            title: 'Ceviche de pescado',
            price: '$200',
            description: 'Pescado fresco marinado en limón y especias.'
        },
        ceviche2: {
            img: 'assets/images/menu/ceviches/Cevichede_camarón_pescado.avif',
            title: 'Ceviche de camarón c/pescado',
            price: '$200',
            description: 'Mezcla de camarón y pescado en limón.'
        },
        ceviche3: {
            img: 'assets/images/menu/ceviches/Ceviche_de_camarón.jpg',
            title: 'Ceviche de camarón',
            price: '$200',
            description: 'Camarones frescos marinados en jugo de limón.'
        },
        ceviche4: {
            img: 'assets/images/menu/ceviches/Ceviche_mixto.jpg',
            title: 'Ceviche mixto',
            price: '$210',
            description: 'Delicioso ceviche de pescado y mariscos.'
        },

        cerveza1: {
            img: 'assets/images/menu/cerveza/corona_media.jpg',
            title: 'Corona Media',
            price: '$45',
            description: 'Cerveza ligera y refrescante de tradición.'
        },
        cerveza2: {
            img: 'assets/images/menu/cerveza/corona_light.jpg',
            title: 'Corona Light',
            price: '$45',
            description: 'Versión ligera de la clásica Corona.'
        },
        cerveza3: {
            img: 'assets/images/menu/cerveza/modelo_cristal.jpg',
            title: 'Modelo Cristal',
            price: '$50',
            description: 'Cerveza cristalina de sabor balanceado.'
        },
        cerveza4: {
            img: 'assets/images/menu/cerveza/victoria_media.webp',
            title: 'Victoria Media',
            price: '$45',
            description: 'Cerveza ámbar con notas maltosas únicas.'
        },
        cerveza5: {
            img: 'assets/images/menu/cerveza/bohemia-clara.jpg',
            title: 'Bohemia Clara',
            price: '$50',
            description: 'Cerveza premium clara con sabores intensos.'
        },
        cerveza6: {
            img: 'assets/images/menu/cerveza/bohemia_oscura.png',
            title: 'Bohemia Oscura',
            price: '$50',
            description: 'Cerveza oscura con toques de caramelo.'
        },
        cerveza7: {
            img: 'assets/images/menu/cerveza/Stella artois.png',
            title: 'Stella Artois',
            price: '$50',
            description: 'Cerveza belga de cuerpo suave y delicado.'
        },
        cerveza8: {
            img: 'assets/images/menu/cerveza/heineken.jpg',
            title: 'Heineken',
            price: '$50',
            description: 'Cerveza lager de renombre mundial.'
        },
        
        vino1: {
            img: 'assets/images/menu/vinos/AstiCapetta(espumoso).jpg',
            title: 'Asti Capetta (espumoso)',
            price: '$700',
            description: 'Vino espumoso con notas dulces y frutales.'
        },
        vino2: {
            img: 'assets/images/menu/vinos/Merlot(Conchaytoro).jpg',
            title: 'Merlot (Concha y Toro)',
            price: '$700',
            description: 'Vino tinto suave con toques de frutas rojas.'
        },
        vino3: {
            img: 'assets/images/menu/vinos/vino_tinto_casillero_del_diablo_concha_y_toro.jpg',
            title: 'Tinto Casillero del Diablo',
            price: '$700',
            description: 'Vino robusto con notas de frutos negros.'
        },
        vino4: {
            img: 'assets/images/menu/vinos/Chambrulé.jpg',
            title: 'Chambrulé',
            price: '$700',
            description: 'Delicado vino con acentos florales y dulces.'
        },
        vino5: {
            img: 'assets/images/menu/vinos/rocca_del_fork_mascato_dulce.jpg',
            title: 'Rocca del Fork',
            price: '$600',
            description: 'Vino dulce con aromas de miel y frutas.'
        },
        vino6: {
            img: 'assets/images/menu/vinos/estefanya_vino.jpg',
            title: 'Estefanya',
            price: '$600',
            description: 'Vino fresco y ligero con toques cítricos.'
        },

        jarra1: {
            img: 'assets/images/menu/jarras/horchata.webp',
            title: 'Horchata',
            price: '$110',
            description: 'Refrescante bebida de arroz con canela.'
        },
        jarra2: {
            img: 'assets/images/menu/jarras/jamaica.webp',
            title: 'Jamaica',
            price: '$110',
            description: 'Bebida de flor de jamaica natural.'
        },
        jarra3: {
            img: 'assets/images/menu/jarras/limon.jpg',
            title: 'Limonada',
            price: '$100',
            description: 'Limonada fresca con un toque de azúcar.'
        }        

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
