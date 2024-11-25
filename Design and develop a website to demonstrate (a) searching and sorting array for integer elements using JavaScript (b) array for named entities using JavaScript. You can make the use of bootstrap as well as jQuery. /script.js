// script.js
$(document).ready(function() {
    // Integer Array Functionality
    $('#sortIntegers').click(function() {
        const input = $('#integerInput').val();
        const integers = input.split(',').map(num => parseInt(num.trim())).filter(num => !isNaN(num));
        integers.sort((a, b) => a - b);
        $('#integerOutput').html('<strong>Sorted Integers:</strong> ' + integers.join(', '));
    });

    $('#searchInteger').click(function() {
        const input = $('#integerInput').val();
        const integers = input.split(',').map(num => parseInt(num.trim())).filter(num => !isNaN(num));
        const searchValue = parseInt($('#searchIntegerInput').val().trim());
        const found = integers.includes(searchValue);
        $('#integerOutput').append('<br><strong>Search Result:</strong> ' + (found ? 'Integer found!' : 'Integer not found.'));
    });

    // Named Entities Array Functionality
    $('#sortEntities').click(function() {
        const input = $('#entityInput').val();
        const entities = input.split(',').map(name => name.trim());
        entities.sort();
        $('#entityOutput').html('<strong>Sorted Entities:</strong> ' + entities.join(', '));
    });

    $('#searchEntity').click(function() {
        const input = $('#entityInput').val();
        const entities = input.split(',').map(name => name.trim());
        const searchValue = $('#searchEntityInput').val().trim();
        const found = entities.includes(searchValue);
        $('#entityOutput').append('<br><strong>Search Result:</strong> ' + (found ? 'Entity found!' : 'Entity not found.'));
    });
});
