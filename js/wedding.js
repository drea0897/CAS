document.addEventListener("DOMContentLoaded", function() {
    const calendarElement = document.getElementById("calendar");
    const timeSlotSection = document.getElementById("time-slot-section");
    const brideGroomSection = document.getElementById("bride-groom-section");
    const selectedDateElement = document.getElementById("selected-date");
    const timeSlotsElement = document.getElementById("time-slots");
    const backToCalendarButton = document.getElementById("back-to-calendar");
    const backToTimeSlotButton = document.getElementById("back-to-time-slot");
    const nextToBrideGroomButton = document.getElementById("next-to-bride-groom");
    const nextToTimeSlotButton = document.getElementById("next-to-time-slot");
    const submitAppointmentButton = document.getElementById("submit-appointment");

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    const availableSlots = {
        "default": ["10:00 AM", "11:00 AM", "12:00 PM", "1:00 PM", "2:00 PM", "3:00 PM"]
    };

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month).getDay();
        const daysInMonth = 32 - new Date(year, month, 32).getDate();
        calendarElement.innerHTML = "";

        const header = createCalendarHeader(month, year);
        const calendarGrid = document.createElement("div");
        calendarGrid.className = "calendar-grid";

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement("div");
            calendarGrid.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const dayElement = document.createElement("div");
            dayElement.className = "day";
            dayElement.innerText = day;
            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                dayElement.classList.add("today");
            }
            dayElement.addEventListener("click", function() {
                selectedDateElement.innerText = `Selected Date: ${date}`;
                calendarElement.style.display = "none";
                timeSlotSection.style.display = "block";
                renderTimeSlots(date);
            });
            calendarGrid.appendChild(dayElement);
        }

        calendarElement.appendChild(header);
        calendarElement.appendChild(calendarGrid);

        // Show the "Next" button in Step 1
        nextToTimeSlotButton.style.display = "inline-block";
    }

    function createCalendarHeader(month, year) {
        const header = document.createElement("div");
        header.className = "calendar-header";

        const prevButton = document.createElement("button");
        prevButton.innerHTML = "<i class='fas fa-chevron-left'></i>";
        prevButton.addEventListener("click", function() {
            if (month === 0) {
                month = 11;
                year -= 1;
            } else {
                month -= 1;
            }
            renderCalendar(month, year);
        });

        const nextButton = document.createElement("button");
        nextButton.innerHTML = "<i class='fas fa-chevron-right'></i>";
        nextButton.addEventListener("click", function() {
            if (month === 11) {
                month = 0;
                year += 1;
            } else {
                month += 1;
            }
            renderCalendar(month, year);
        });

        const monthYear = document.createElement("span");
        monthYear.innerText = `${month + 1}/${year}`;

        header.appendChild(prevButton);
        header.appendChild(monthYear);
        header.appendChild(nextButton);

        return header;
    }

    function renderTimeSlots(date) {
        timeSlotsElement.innerHTML = "";
        const slots = availableSlots[date] || availableSlots["default"];
        slots.forEach(slot => {
            const slotElement = document.createElement("button");
            slotElement.className = "list-group-item list-group-item-action";
            slotElement.innerText = slot;
            slotElement.addEventListener("click", function() {
                document.querySelectorAll('.list-group-item').forEach(item => item.classList.remove('active'));
                slotElement.classList.add('active');
                nextToBrideGroomButton.style.display = "inline-block";
            });
            timeSlotsElement.appendChild(slotElement);
        });
    }

    backToCalendarButton.addEventListener("click", function() {
        timeSlotSection.style.display = "none";
        calendarElement.style.display = "block";
    });

    backToTimeSlotButton.addEventListener("click", function() {
        brideGroomSection.style.display = "none";
        timeSlotSection.style.display = "block";
    });

    nextToTimeSlotButton.addEventListener("click", function() {
        calendarElement.style.display = "none";
        timeSlotSection.style.display = "block";
        renderTimeSlots(selectedDateElement.innerText.replace('Selected Date: ', ''));
    });

    nextToBrideGroomButton.addEventListener("click", function() {
        timeSlotSection.style.display = "none";
        brideGroomSection.style.display = "block";
    });

    submitAppointmentButton.addEventListener("click", function(event) {
        event.preventDefault();
        alert("Marriage appointment information submitted!");
    });

    renderCalendar(currentMonth, currentYear);
});
