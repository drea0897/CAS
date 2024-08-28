document.addEventListener("DOMContentLoaded", function () {
    const calendarDays = document.getElementById("calendarDays");
    const monthYear = document.getElementById("monthYear");
    const prevMonth = document.getElementById("prevMonth");
    const nextMonth = document.getElementById("nextMonth");

    let currentDate = new Date();

    function renderCalendar() {
        calendarDays.innerHTML = "";
        monthYear.textContent = currentDate.toLocaleDateString("en-US", { month: "long", year: "numeric" });

        const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
        const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
        
        // Add empty divs to align the first day of the month
        let day = firstDay.getDay();
        for (let i = 0; i < day; i++) {
            const emptyDiv = document.createElement("div");
            emptyDiv.className = "calendar-empty";
            calendarDays.appendChild(emptyDiv);
        }

        for (let i = 1; i <= lastDay.getDate(); i++) {
            const dayDiv = document.createElement("div");
            dayDiv.textContent = i;
            dayDiv.className = "calendar-day";
            calendarDays.appendChild(dayDiv);
        }
    }

    prevMonth.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonth.addEventListener("click", function () {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
});
