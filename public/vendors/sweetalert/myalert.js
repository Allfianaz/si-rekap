const swal = $('.swal').data('swal');

if (swal) {
    Swal.fire({
        title: 'Successfully',
        text: swal,
        icon: 'success'
    });
}

$(document).on('click', '.btn-delete', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});

$(document).on('click', '.log-out', function(e) {

    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Are you sure?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Log out'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    })
});