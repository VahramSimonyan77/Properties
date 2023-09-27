jQuery(document).ready(function($) {
    $('#filter-button').on('click', function() {
        var numberOfFloors = $('#number-of-floors').val();
        var buildingType = $('#building-type').val();

        $.ajax({
            url: ajax_object.ajaxurl, // Access 'ajaxurl' variable
            type: 'POST',
            data: {
                action: 'filter_houses',
                number_of_floors: numberOfFloors,
                building_type: buildingType
            },
            success: function(response) {
                $('#house-list').html(response);
            }
        });
    });
});
