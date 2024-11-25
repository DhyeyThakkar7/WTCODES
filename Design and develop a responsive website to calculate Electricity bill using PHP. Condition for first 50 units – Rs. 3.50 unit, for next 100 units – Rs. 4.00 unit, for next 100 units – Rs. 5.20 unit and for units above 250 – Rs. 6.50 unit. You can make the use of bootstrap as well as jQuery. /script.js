$(document).ready(function() {
    $('#billForm').on('submit', function(event) {
        var units = $('#units').val();
        
        if (units < 0) {
            event.preventDefault(); // Prevent form submission
            alert("Please enter a valid number of units (0 or more).");
        }
    });
});
