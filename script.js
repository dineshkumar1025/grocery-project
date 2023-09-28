// script.js
document.addEventListener("DOMContentLoaded", function () {
    // Get all the "Remove" buttons
    var removeButtons = document.querySelectorAll(".remove-button");

    // Attach a click event listener to each "Remove" button
    removeButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            // Display a confirmation dialog
            var confirmation = confirm("Are you sure you want to remove this item?");
            if (!confirmation) {
                // Prevent the default form submission if the user cancels
                event.preventDefault();
            }
        });
    });
});
