(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });


    // Skills
    $('.skill').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, { offset: '80%' });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1
            },
            992: {
                items: 2
            }
        }
    });


    // Portfolio isotope and filter
    var portfolioIsotope = $('.portfolio-container').isotope({
        itemSelector: '.portfolio-item',
        layoutMode: 'fitRows'
    });
    $('#portfolio-flters li').on('click', function () {
        $("#portfolio-flters li").removeClass('active');
        $(this).addClass('active');

        portfolioIsotope.isotope({ filter: $(this).data('filter') });
    });


})(jQuery);


$(document).ready(function () {
    $("#portfolio-flters li").click(function () {
        var filterValue = $(this).attr("data-filter");
        var items = $(".portfolio-item" + filterValue);
        if (items.length == 0) {
            $("#coming-soon").show();
        } else {
            $("#coming-soon").hide();
            $(".portfolio-item").hide();
            items.show();
        }
    });

    // Set the number of items per page
    var itemsPerPage = 6;

    // Keep track of the total number of pages
    var totalPages = 0;

    // Keep track of the current page
    var currentPage = 1;

    // Show the first page of items
    showPage(currentPage);

    // Function to calculate the total number of pages
    function calculateTotalPages() {
        // Get all the items
        var items = $('.portfolio-item');

        // Calculate the total number of pages
        totalPages = Math.ceil(items.length / itemsPerPage);
    }

    // Function to show a specific page of items
    function showPage(page) {
        // Calculate the total number of pages
        calculateTotalPages();

        // Get all the items
        var items = $('.portfolio-item');

        // Hide all the items
        items.hide();

        // Get the items to show on the current page
        var itemsToShow = items.slice((page - 1) * itemsPerPage, page * itemsPerPage);

        // Show the items on the current page
        itemsToShow.show();

        // Update the current page
        currentPage = page;

        // Update the pagination buttons
        updatePaginationButtons();
    }

    // Function to update the pagination buttons
    function updatePaginationButtons() {
        // Get the previous button
        var prevButton = $('#prev-page');

        // Get the next button
        var nextButton = $('#next-page');

        // Disable the previous button if on the first page
        if (currentPage == 1) {
            prevButton.prop('disabled', true);
        } else {
            prevButton.prop('disabled', false);
        }

        // Disable the next button if on the last page
        if (currentPage == totalPages) {
            nextButton.prop('disabled', true);
        } else {
            nextButton.prop('disabled', false);
        }
    }

    // Handle the previous button click
    $('#prev-page').click(function () {
        showPage(currentPage - 1);
    });

    // Handle the next button click
    $('#next-page').click(function () {
        showPage(currentPage + 1);
    });

    // Handle the filter click
    $('.portfolio-flters li').click(function () {
        // Get the filter value
        var filterValue = $(this).attr('data-filter');
        // Remove the active class from all filters
        $('.portfolio-flters li').removeClass('active');

        // Add the active class to the clicked filter
        $(this).addClass('active');

        // Filter the items
        $('.portfolio-item').filter(filterValue).show();
        $('.portfolio-item').not(filterValue).hide();

        // Check if the filtered items have any results
        var filteredItems = $('.portfolio-item').filter(filterValue);
        if (filteredItems.length == 0) {
            $('#coming-soon').show();
        } else {
            $('#coming-soon').hide();
        }

        // Reset the current page to 1
        currentPage = 1;

        // Show the first page of filtered items
        showPage(currentPage);
    });

    // Get the search button
    var searchButton = $('#button-addon2');

    // Handle the search button click
    searchButton.click(function () {
        // Get the search input
        var searchInput = $('.form-control');

        // Get the search term
        var searchTerm = searchInput.val().toLowerCase();

        // Get all the items
        var items = $('.portfolio-item');

        // Hide all the items
        items.hide();

        // Loop through the items
        items.each(function () {
            // Get the current item
            var item = $(this);

            // Get the item name
            var itemName = item.find('p').text().toLowerCase();

            // Check if the item name contains the search term
            if (itemName.indexOf(searchTerm) != -1) {
                // Show the item
                item.show();
            }
        });

        // Reset the current page and total pages
        currentPage = 1;
        calculateTotalPages();

        // Update the pagination buttons
        updatePaginationButtons();
    });

});

