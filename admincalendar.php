<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Calendar</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    margin: 20px auto;
    max-width: 1200px;
    background: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.calendar {
    width: 50%;
    border-right: 1px solid #ddd;
    padding: 20px;
}

.schedule {
    width: 50%;
    padding: 20px;
}

.calendar-header {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px 0;
    border-bottom: 2px solid #007BFF;
    background: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.calendar-header button {
    background: #007BFF;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.calendar-header button:hover {
    background: #0056b3;
}

.calendar-header select {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: white;
    cursor: pointer;
    margin: 0 10px;
}

.calendar-header select:focus {
    outline: none;
    border-color: #007BFF;
}

#calendarDays {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 1px;
    background: #ddd;
}

#calendarDays div {
    padding: 15px;
    text-align: center;
    cursor: pointer;
    border: 1px solid #ddd;
    background: white;
    transition: background 0.3s ease;
}

#calendarDays div:hover {
    background: #007BFF;
    color: white;
}

.schedule h2 {
    margin-top: 0;
    color: #007BFF;
}

.schedule button {
    background-color: #28a745;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

.schedule button:hover {
    background-color: #218838;
}

.modal {
    display: none; 
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
    padding-top: 60px;
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.close-btn {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-btn:hover,
.close-btn:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

#scheduleForm {
    display: flex;
    flex-direction: column;
}

#scheduleForm label {
    margin-top: 10px;
}

#scheduleForm input,
#scheduleForm textarea {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

#scheduleForm button {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

#scheduleForm button:hover {
    background-color: #0056b3;
}
.past-date {
    color: #aaa;
    background: #f9f9f9;
    cursor: not-allowed;
}

.past-date:hover {
    background: #f9f9f9;
}

.selectable {
    cursor: pointer;
}

.selectable:hover {
    background: #007BFF;
    color: white;
}

    </style>
</head>
<body>
    <div class="container">
        <div class="calendar">
            <div class="calendar-header">
                <button onclick="prevMonth()">&#60;</button>
                <select id="monthSelect" onchange="changeMonth()"></select>
                <select id="yearSelect" onchange="changeYear()"></select>
                <button onclick="nextMonth()">&#62;</button>
            </div>
            <div id="calendarDays" class="calendar-days"></div>
        </div>
        <div class="schedule">
            <h2>Schedule</h2>
            <div id="scheduleContent">Select a day to see the schedule.</div>
            <button id="addScheduleBtn">Add Schedule</button>
        </div>
    </div>

    <!-- Modal -->
    <div id="scheduleModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Add Schedule</h2>
            <form id="scheduleForm">
                <label for="scheduleDate">Date:</label>
                <input type="text" id="scheduleDate" name="scheduleDate" readonly>
                <label for="scheduleDetails">Details:</label>
                <textarea id="scheduleDetails" name="scheduleDetails" rows="4" required></textarea>
                <button type="submit">Add</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
 const calendarDays = document.getElementById('calendarDays');
const scheduleContent = document.getElementById('scheduleContent');
const addScheduleBtn = document.getElementById('addScheduleBtn');
const scheduleModal = document.getElementById('scheduleModal');
const closeModalBtn = document.querySelector('.close-btn');
const scheduleForm = document.getElementById('scheduleForm');
const scheduleDateInput = document.getElementById('scheduleDate');
const monthSelect = document.getElementById('monthSelect');
const yearSelect = document.getElementById('yearSelect');

const monthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

function renderCalendar(month, year) {
    calendarDays.innerHTML = '';
    const today = new Date();
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDay = new Date(year, month, 1).getDay();

    // Add blank days for the first week
    for (let i = 0; i < firstDay; i++) {
        calendarDays.innerHTML += '<div></div>';
    }

    // Add days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const date = new Date(year, month, day);
        const isPastDate = date < today;

        calendarDays.innerHTML += `<div class="${isPastDate ? 'past-date' : 'selectable'}" onclick="${isPastDate ? '' : `showSchedule('${year}-${month + 1}-${day}')`}">${day}</div>`;
    }

    monthSelect.value = month;
    yearSelect.value = year;
}

function showSchedule(date) {
    scheduleDateInput.value = date;
    scheduleContent.textContent = `Schedule for ${date}`;
}

function prevMonth() {
    if (currentMonth === 0) {
        currentMonth = 11;
        currentYear--;
    } else {
        currentMonth--;
    }
    renderCalendar(currentMonth, currentYear);
}

function nextMonth() {
    if (currentMonth === 11) {
        currentMonth = 0;
        currentYear++;
    } else {
        currentMonth++;
    }
    renderCalendar(currentMonth, currentYear);
}

function populateMonthYearSelectors() {
    for (let i = 0; i < monthNames.length; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = monthNames[i];
        monthSelect.appendChild(option);
    }

    for (let i = currentYear - 50; i <= currentYear + 50; i++) {
        const option = document.createElement('option');
        option.value = i;
        option.textContent = i;
        yearSelect.appendChild(option);
    }

    monthSelect.value = currentMonth;
    yearSelect.value = currentYear;
}

function changeMonth() {
    currentMonth = parseInt(monthSelect.value);
    renderCalendar(currentMonth, currentYear);
}

function changeYear() {
    currentYear = parseInt(yearSelect.value);
    renderCalendar(currentMonth, currentYear);
}

// Handle modal
addScheduleBtn.onclick = function() {
    scheduleModal.style.display = 'block';
}

closeModalBtn.onclick = function() {
    scheduleModal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target === scheduleModal) {
        scheduleModal.style.display = 'none';
    }
}

scheduleForm.onsubmit = function(event) {
    event.preventDefault();
    const details = document.getElementById('scheduleDetails').value;
    // Save the schedule (e.g., send it to a server or store it locally)
    scheduleContent.textContent = `Schedule for ${scheduleDateInput.value}: ${details}`;
    scheduleModal.style.display = 'none';
}

// Initialize the calendar and selectors
populateMonthYearSelectors();
renderCalendar(currentMonth, currentYear);


    </script>
</body>
</html>
