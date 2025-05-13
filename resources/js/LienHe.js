document.addEventListener('DOMContentLoaded', () => {
    const dateInput = document.getElementById('date');
    const timeSelect = document.getElementById('time');

    const bookingMeta = document.getElementById('booking-meta');

    const fullyBookedDates = bookingMeta.dataset.fullyBooked.split(',');
    const fixedSlots = bookingMeta.dataset.fixedSlots.split(',');
    const bookedSlotsByDate = JSON.parse(bookingMeta.dataset.bookedSlots);

    dateInput.addEventListener('input', () => {
        const selectedDate = dateInput.value;
        const today = new Date().toISOString().split('T')[0];
        const now = new Date();

        // reset
        [...timeSelect.options].forEach(opt => {
            if (!opt.value) return;
            opt.disabled = false;
            opt.style.color = '#000';
        });

        // Grey 
        const bookedTimes = bookedSlotsByDate[selectedDate] || [];

        [...timeSelect.options].forEach(opt => {
            const timeVal = opt.value;
            if (!timeVal) return;

            const fullDateTime = new Date(`${selectedDate}T${timeVal}`);
            const isPastToday = selectedDate === today && fullDateTime < now;
            const isBooked = bookedTimes.includes(timeVal);

            if (isPastToday || isBooked) {
                opt.disabled = true;
                opt.style.color = '#999';
            }
        });
    });

    const disableFullyBooked = () => {
        const today = new Date().toISOString().split('T')[0];
        const input = dateInput;
        const maxDays = 30; 

        const datalist = document.createElement('datalist');
        datalist.id = "availableDates";
        document.body.appendChild(datalist);

        let html = '';
        for (let i = 0; i < maxDays; i++) {
            const d = new Date();
            d.setDate(d.getDate() + i);
            const dStr = d.toISOString().split('T')[0];
            if (!fullyBookedDates.includes(dStr)) {
                html += `<option value="${dStr}">`;
            }
        }
        datalist.innerHTML = html;
        input.setAttribute('list', 'availableDates');
    };

    flatpickr("#date", {
        dateFormat: "Y-m-d",
        minDate: "today",
        disable: fullyBookedDates
    });

    disableFullyBooked();
});
