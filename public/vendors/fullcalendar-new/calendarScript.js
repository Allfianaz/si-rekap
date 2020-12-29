// document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//         initialView: 'dayGridMonth',
//         dateClick: function() {
//             window.location.href = '/admin/dashboard';
//             return false;
//         }
//     });
//     calendar.render();
// });

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        selectable: true,
        dateClick: function(info) {
            alert('Date: ' + info.dateStr);
        },
        events: [{
            start: '2020-10-02',
            url: '/admin/dashboard'
        }]
    });
    calendar.render();
});