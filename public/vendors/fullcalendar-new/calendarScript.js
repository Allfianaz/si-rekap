document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        dateClick: function() {
            window.location.href = '/admin/dashboard';
            return false;
        }
    });
    calendar.render();
});