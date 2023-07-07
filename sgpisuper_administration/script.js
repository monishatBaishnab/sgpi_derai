$(document).ready(function () {
    $('#table').DataTable();
});

let nav_btn = document.querySelector('#nav_btn');
nav_btn.addEventListener('click', function () {
    document.querySelector('body').classList.toggle('active');
})
document.addEventListener('DOMContentLoaded', function () {
    var links = document.querySelectorAll(".delete");
    for (i = 0; i < links.length; i++) {
        links[i].addEventListener('click', function (e) {
            if (!confirm("You sure to delete it?")) {
                e.preventDefault();
            }
        });
    }
});