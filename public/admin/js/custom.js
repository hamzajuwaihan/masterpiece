$('#file-input').change(function () {
    // Get the selected file
    var file = this.files[0];

    // Create a URL for the file
    var url = URL.createObjectURL(file);

    // Set the src attribute of the image element to the URL
    $('#image').attr('src', url);
    console.log(url);
});


// $('.draggable tbody').sortable({
//     stop: function (event, ui) {
//         // Update the position cells in the table
//         $('.draggable tbody tr').each(function (index, row) {
//             $(row).find('.position').text(index + 1);
//         });

//         // Make an AJAX request to the server to update the position in the database
//         const rowId = ui.item.data('id');
//         const newPosition = ui.item.index();

//         $.ajax({
//             type: 'POST',
//             url: '/update-position',
//             data: {
//                 material_id: rowId,
//                 position: newPosition,
//                 _token: $('input[name="_token"]').val()
//             },
//             success: function (response) {
//                 console.log(response);
//             },
//             error: function (error) {
//                 console.log(error);
//             }
//         });
//     }
// });

$('.draggable tbody').sortable({
    stop: function (event, ui) {
        // Update the position cells in the table
        $('.draggable tbody tr').each(function (index, row) {
            $(row).find('.position').text(index + 1);
        });

        // Make an AJAX request for each row to update its position in the database
        $('.draggable tbody tr').each(function (index, row) {
            const rowId = $(row).data('id');
            const newPosition = $(row).index();

            $.ajax({
                type: 'POST',
                url: '/update-position',
                data: {
                    material_id: rowId,
                    position: newPosition,
                    _token: $('input[name="_token"]').val()
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    }
});

$(document).ready(function () {
    var numFields = 1; // start with one field

    $('#add-instructor').click(function () {
        numFields++; // increment the field count
        // create a new input field and remove button and add them to the DOM
        $('#instructors-container').append('<div class="d-flex"><label>Instructor name:</label><br><input type="text" list="instructor-names" name="instructors[]" class="form-control mb-3 me-2" placeholder="Type to search..." /><button type="button" class="remove-button btn btn-outline-primary" style="height: 38px; width: 80px;">Remove</button></div>');
    });

    // listen for clicks on the remove button
    $('#instructors-container').on('click', '.remove-button', function () {
        $(this).closest('div').remove(); // remove the parent element that contains the label, input, and button
    });

    // add a remove instructor button


    // listen for clicks on the remove instructor button
    $('#instructors-container').on('click', '#remove-instructor', function () {
        if (numFields > 1) { // only remove an instructor if there are more than one
            numFields--; // decrement the field count
            $('#instructors-container div').last().remove(); // remove the last input field and remove button
        }
    });
});




