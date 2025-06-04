document.addEventListener('DOMContentLoaded', function () {
    // Inicialización del selector de fecha con Flatpickr
    flatpickr("#date", {
        dateFormat: "d/m/Y",
        minDate: "today",
        locale: {
            firstDayOfWeek: 1,
            weekdays: {
                shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                longhand: [
                    'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado',
                ],
            },
            months: {
                shorthand: [
                    'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                    'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic',
                ],
                longhand: [
                    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre',
                ],
            },
        },
    });

    // Referencias de elementos
    const mainTimeSelect = document.getElementById('main-time');
    const minuteButtonsContainer = document.getElementById('minute-buttons');
    const notifyButton = document.getElementById('notify-button');

    // Generar las horas principales
    function generateMainHours() {
        const startHour = 10; // Hora inicial (10 a.m.)
        const endHour = 19; // Hora final (7 p.m.)
        for (let hour = startHour; hour <= endHour; hour++) {
            const option = document.createElement('option');
            const formattedHour = hour > 12 ? `${hour - 12}:00 p.m.` : `${hour}:00 a.m.`;
            option.value = hour; // Valor en formato 24 horas
            option.textContent = formattedHour; // Texto en formato AM/PM
            mainTimeSelect.appendChild(option);
        }
    }

    // Generar intervalos de 20 minutos
    function generateMinuteIntervals(hour) {
        minuteButtonsContainer.innerHTML = ''; // Limpiar botones previos
        const intervals = ['00', '20', '40']; // Intervalos de 20 minutos
        intervals.forEach((minute) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'hour-button';
            button.textContent = formatTime(hour, minute); // Formato AM/PM
            button.value = `${hour}:${minute}`; // Valor en formato 24 horas
            button.addEventListener('click', () => handleHourSelection(button));
            minuteButtonsContainer.appendChild(button);
        });
    }

    // Formatear hora en AM/PM
    function formatTime(hour, minute) {
        const formattedHour = hour > 12 ? hour - 12 : hour;
        const meridiem = hour >= 12 ? 'p.m.' : 'a.m.';
        return `${formattedHour}:${minute} ${meridiem}`;
    }

    // Manejar la selección de una hora
    function handleHourSelection(button) {
        document.querySelectorAll('.hour-button').forEach(btn => btn.classList.remove('selected'));
        button.classList.add('selected');

        // Habilitar el botón "Notificarme"
        notifyButton.disabled = false;
        notifyButton.classList.add('enabled');
    }

    // Inicializar las horas principales
    generateMainHours();

    // Evento al seleccionar una hora principal
    mainTimeSelect.addEventListener('change', function () {
        const selectedHour = parseInt(mainTimeSelect.value); // Extraer la hora seleccionada
        generateMinuteIntervals(selectedHour);
    });

    // Generar intervalos para la hora inicial por defecto
    generateMinuteIntervals(10); // La primera hora por defecto es 10:00
});



