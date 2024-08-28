<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Big Calendar</title>
    <link rel="stylesheet" href="css/calendar.css">
</head>
<body>

<div class="calendar">
    <div class="calendar-header">
        <button id="prevMonth" class="nav-button">❮</button>
        <div id="monthYear" class="month-year"></div>
        <button id="nextMonth" class="nav-button">❯</button>
    </div>
    <div class="calendar-body">
        <div class="calendar-weekday">Sun</div>
        <div class="calendar-weekday">Mon</div>
        <div class="calendar-weekday">Tue</div>
        <div class="calendar-weekday">Wed</div>
        <div class="calendar-weekday">Thu</div>
        <div class="calendar-weekday">Fri</div>
        <div class="calendar-weekday">Sat</div>
        <div id="calendarDays" class="calendar-days"></div>
    </div>
</div>

<script src="js/calendar.js"></script>
</body>
</html>
