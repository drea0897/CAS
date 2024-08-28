<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Booking</title>
    <link rel="stylesheet" href="css/navbar.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #54b5e9;
}

.container {
    display: grid;
    grid-template-columns: 1fr 2fr; /* Time slots and proceed button on the left, calendar on the right */
    gap: 20px;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

.main-content1 {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Align items to the left side */
}

#calendar {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 5px;
    /* Ensure calendar is positioned to the right side */
    justify-self: end;
}

.day {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 10px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
    font-size: 1.3em;
}

.day span {
    margin-bottom: 5px;
}

.slots {
    font-size: 0.7em;
    color: #666;
}

.available {
    background-color: #e0f7fa;
    cursor: pointer;
}

.unavailable {
    background-color: #ffcdd2;
    cursor: not-allowed;
}

.today {
    border: 2px solid #ffeb3b;
}

.selected {
    background-color: #ffecb3;
}

/* Time Slots Section Styles */
.time-slot {
    padding: 5px;
    border: 1px solid #ddd;
    margin: 5px 0;
    cursor: pointer;
    font-size: 0.9em;
        align-self: flex-end;
}

.time-slot.selected {
    background-color: #c5e1a5;
}

.time-slot.booked {
    background-color: #ffcdd2;
    text-decoration: line-through;
    cursor: not-allowed;
}

#selected-date {
    margin-bottom: 10px;
    font-size: 1.1em;
    font-weight: bold;
}

#time-slots {
    margin-top: 20px;
}

/* Button Styles */
#prev-month, #next-month {
    color: white;
    cursor: pointer;
    padding: 10px;
    border: none;
    background-color: rgba(21, 90, 119, 1);
}

#current-month {
    font-size: 1.2em;
    margin: 20px 0;
}

#proceed-button {
    padding: 10px 20px;
    border: none;
    background-color: rgba(21, 90, 119, 0.5); /* Default color for disabled state */
    color: white;
    cursor: not-allowed; /* Indicates the button is disabled */
    font-size: 1em;
    margin-top: 20px;
    /* Align button to the left */
    align-self: flex-end;
    transition: background-color 0.3s ease; /* Smooth transition for color change */
}

#proceed-button.enabled {
    background-color: rgba(21, 90, 119, 1); /* Color when enabled */
    cursor: pointer; /* Indicates the button is clickable */
}

#proceed-button:disabled {
    background-color: rgba(21, 90, 119, 0.5); /* Same as default color */
}

/* Day Titles Styles */
#day-titles {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}

#day-titles div {
    color: white;
    padding: 10px 0;
    background-color: rgba(21, 90, 119, 1);
    border: 1px solid #ddd;
}

/* Responsive Styles */
@media (max-width: 600px) {
    .container {
        grid-template-columns: 1fr; /* Stack calendar and time slots vertically on small screens */
    }

    #calendar {
        grid-template-columns: repeat(7, 1fr);
    }

    .day {
        padding: 8px;
        font-size: 0.8em;
    }

    .time-slot {
        font-size: 0.8em;
        padding: 4px;
        margin: 4px 0;
    }

    #current-month {
        font-size: 1em;
    }

    #proceed-button {
        font-size: 0.9em;
        padding: 8px 16px;
    }

    #prev-month, #next-month {
        padding: 8px;
    }
}


    </style>
</head>
<body>
    <?php 
    session_start();
    include 'navbar.php' ?>
<div class="main-content">
    <div class="container">
        <div class="main-content1">
            <div id="selected-date"></div>
            <div id="time-slots"></div>
            <button id="proceed-button" disabled>Proceed</button>
        </div>
        <div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <button id="prev-month">Previous</button>
                <span id="current-month"></span>
                <button id="next-month">Next</button>
            </div>
            <div id="day-titles"></div>
            <div id="calendar"></div>
        </div>
    </div>
</div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendar = document.getElementById('calendar');
            const selectedDateElement = document.getElementById('selected-date');
            const timeSlotsContainer = document.getElementById('time-slots');
            const prevMonthButton = document.getElementById('prev-month');
            const nextMonthButton = document.getElementById('next-month');
            const currentMonthElement = document.getElementById('current-month');
            const proceedButton = document.getElementById('proceed-button');
            const dayTitlesContainer = document.getElementById('day-titles');
            const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            
            let today = new Date();
            let currentMonth = today.getMonth(); // 0-indexed
            let currentYear = today.getFullYear();
            let selectedTimeSlot = null; // To keep track of the currently selected time slot
            let selectedDateKey = null; // To keep track of the currently selected date
    
            const availableDates = {
                '2024-11': {
                    5: 6,
                    10: 6,
                    20: 6,
                    22: 6
                },
                '2024-12': {
                    3: 6,
                    15: 6,
                    18: 6,
                    25: 6
                }
            };
    
            // Define holidays (dates not available)
            const holidays = {
                '2024-11-05': true,
                '2024-11-10': true,
                '2024-11-20': true,
                '2024-11-22': true,
                '2024-12-03': true,
                '2024-12-15': true,
                '2024-12-18': true,
                '2024-12-25': true
            };
    
            const timeSlots = {
                '2024-11-5': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: false },
                    { time: '13:00 - 14:30', available: true },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: false },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-11-10': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: false },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: false }
                ],
                '2024-11-20': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: true },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-11-22': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: false },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-12-3': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: true },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-12-15': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: false },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-12-18': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: true },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ],
                '2024-12-25': [
                    { time: '08:30 - 10:00', available: true },
                    { time: '10:00 - 11:30', available: true },
                    { time: '13:00 - 14:30', available: true },
                    { time: '15:00 - 16:30', available: true },
                    { time: '17:00 - 18:30', available: true },
                    { time: '19:00 - 20:30', available: true }
                ]
            };
    
            function populateDayTitles() {
                dayTitlesContainer.innerHTML = '';
                daysOfWeek.forEach(day => {
                    const dayElement = document.createElement('div');
                    dayElement.textContent = day;
                    dayTitlesContainer.appendChild(dayElement);
                });
            }
    
            function populateCalendar() {
                calendar.innerHTML = '';
                const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
    
                for (let i = 0; i < firstDayOfMonth; i++) {
                    const emptyCell = document.createElement('div');
                    emptyCell.classList.add('day');
                    calendar.appendChild(emptyCell);
                }
    
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('day');
                    dayElement.innerHTML = `<span>${day}</span>`;
    
                    const dateKey = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                    const monthKey = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}`;
                    const dayKey = day.toString();
    
                    const slots = timeSlots[dateKey] || [];
                    const availableSlots = slots.filter(slot => slot.available).length;
    
                    const isTodayOrPast = new Date(dateKey) < today;
    
                    if (isTodayOrPast) {
                        dayElement.classList.add('unavailable');
                        dayElement.innerHTML += `<span class="slots">(Unavailable)</span>`;
                    } else if (availableDates[monthKey] && availableDates[monthKey][dayKey] !== undefined) {
                        if (availableSlots > 0) {
                            dayElement.classList.add('available');
                            dayElement.innerHTML += `<span class="slots">(${availableSlots}View Details)</span>`;
                            dayElement.addEventListener('click', () => handleDayClick(dateKey));
                        } else {
                            dayElement.classList.add('unavailable');
                            dayElement.innerHTML += `<span class="slots">(Full)</span>`;
                        }
                    } else {
                        dayElement.classList.add('unavailable');
                        dayElement.innerHTML += `<span class="slots">(No Appointment)</span>`;
                    }
    
                    calendar.appendChild(dayElement);
                }
    
                const todayDateKey = `${today.getFullYear()}-${(today.getMonth() + 1).toString().padStart(2, '0')}-${today.getDate().toString().padStart(2, '0')}`;
                const todayDayElement = calendar.querySelector(`[data-date="${todayDateKey}"]`);
                if (todayDayElement) {
                    todayDayElement.classList.add('today');
                }
    
                updateCalendarDayAvailability(selectedDateKey);
            }
    
            function handleDayClick(dateKey) {
                if (new Date(dateKey) < today) return;
    
                selectedDateKey = dateKey;
                selectedDateElement.textContent = `Selected Date: ${dateKey}`;
                timeSlotsContainer.innerHTML = '';
    
                const slots = timeSlots[dateKey] || [];
                slots.forEach(slot => {
                    const slotElement = document.createElement('div');
                    slotElement.classList.add('time-slot');
                    slotElement.textContent = slot.time;
                    if (!slot.available) {
                        slotElement.classList.add('booked');
                        slotElement.addEventListener('click', (event) => event.stopPropagation());
                    } else {
                        slotElement.addEventListener('click', () => handleSlotClick(slotElement));
                    }
                    timeSlotsContainer.appendChild(slotElement);
                });
    
                updateCalendarDayAvailability(dateKey);
            }
    
            function handleSlotClick(slotElement) {
                if (selectedTimeSlot) {
                    selectedTimeSlot.classList.remove('selected');
                }
    
                if (!slotElement.classList.contains('booked')) {
                    slotElement.classList.add('selected');
                    selectedTimeSlot = slotElement;
                    proceedButton.disabled = false;
                    proceedButton.classList.add('enabled');
                } else {
                    selectedTimeSlot = null;
                    proceedButton.disabled = true;
                    proceedButton.classList.remove('enabled');
                }
            }
    
            function updateCalendarDayAvailability(selectedDateKey) {
                const allDayElements = calendar.querySelectorAll('.day');
                allDayElements.forEach(dayElement => {
                    const dayNumber = dayElement.querySelector('span')?.textContent;
                    if (dayNumber) {
                        const dateKey = `${currentYear}-${(currentMonth + 1).toString().padStart(2, '0')}-${dayNumber.toString().padStart(2, '0')}`;
                        if (dateKey === selectedDateKey) {
                            dayElement.classList.add('selected');
                        } else {
                            dayElement.classList.remove('selected');
                        }
                    }
                });
            }
    
            function updateMonthDisplay() {
                currentMonthElement.textContent = `${new Date(currentYear, currentMonth).toLocaleString('default', { month: 'long' })} ${currentYear}`;
            }
    
            function changeMonth(offset) {
                currentMonth += offset;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear -= 1;
                } else if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear += 1;
                }
                selectedDateElement.textContent = '';
                timeSlotsContainer.innerHTML = '';
                selectedTimeSlot = null;
                proceedButton.disabled = true;
                proceedButton.classList.remove('enabled');
                updateMonthDisplay();
                populateCalendar();
            }
    
            prevMonthButton.addEventListener('click', () => changeMonth(-1));
            nextMonthButton.addEventListener('click', () => changeMonth(1));
    
            today = new Date();
            currentMonth = today.getMonth();
            currentYear = today.getFullYear();
            selectedDateKey = `${today.getFullYear()}-${(today.getMonth() + 1).toString().padStart(2, '0')}-${today.getDate().toString().padStart(2, '0')}`;
    
            updateMonthDisplay();
            populateCalendar();
            populateDayTitles();
    
            proceedButton.addEventListener('click', () => {
                if (selectedDateKey && selectedTimeSlot) {
                    const selectedTime = selectedTimeSlot.textContent;
                    sessionStorage.setItem('selectedDate', selectedDateKey);
                    sessionStorage.setItem('selectedTime', selectedTime);
                    window.location.href = 'confirmation.php';
                }
            });
        });
    </script>
    
    <script src="js/navbar.js"></script>
</body>
</html>
