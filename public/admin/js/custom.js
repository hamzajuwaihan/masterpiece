$('#file-input').change(function () {
    // Get the selected file
    var file = this.files[0];

    // Create a URL for the file
    var url = URL.createObjectURL(file);

    // Set the src attribute of the image element to the URL
    $('#image').attr('src', url);
    console.log(url);
});