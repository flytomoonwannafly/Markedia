jQuery(document).ready(function ($) {
    $(document).on("click", ".upload_gallery_button", function (e) {
        e.preventDefault();
        var $button = $(this);
        // Create the media frame.
        var file_frame = wp.media.frames.file_frame = wp.media({
            title: 'Select or upload image',
            library: { // remove these to show all
                type: 'image' // specific mime
            },
            button: {
                text: 'Select'
            },
            multiple: true  // Set to true to allow multiple files to be selected
        });
        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            var attachments = file_frame.state().get('selection').toJSON();
            var imageUrls = [];

            $.each(attachments, function(index, attachment){
                imageUrls.push(attachment.url);
            });

            $button.siblings('input').val(imageUrls.join(','));
            $button.siblings('img').attr('src', imageUrls[0]).trigger('change');
            // trigger('change') activates the save button to save data
        });

        // Finally, open the modal
        file_frame.open();
    });
});