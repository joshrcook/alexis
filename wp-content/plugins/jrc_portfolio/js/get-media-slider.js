jQuery(document).ready(function($) {
    var postThumbnailSrc, postId, postTitle, button;
    var scope = '.slider';
    
    var media_item_class = 'media-item';
    // add a click handler to the media upload buttons
   $(scope + ' .media').on('click', '.get-media', function() {
      // get the button object
      button = $(this); 
      
      // show the media upload thickbox
      tb_show('Upload Media', 'media-upload.php?referer=file-upload&type=file&TB_iframe=true', false);
      
      // after the thickbox has loaded
        $('#TB_iframeContent').load(function() {
            
            // attach a click handler to the 'Insert Into Post' button
            $('#TB_iframeContent').contents().find('#media-items').on('click', 'td.savesend input', function() {
                
                // get the source of the thumbnail
                postThumbnailSrc = $(this).closest('table').find('thead img.thumbnail').attr('src');
                // get the id of the post
                postId = $(this).attr('id').replace('send[', '').replace(']', '');
                // get the title of the file
                postTitle = $(this).closest('tbody').find('tr.post_title td.field input').attr('value');
            });
         
        });
        
    // when the editor is closed, remove the thickbox
    window.send_to_editor = function(html){
            add_media_item();
            // create_media_id_input();
            add_media_values()
            // set the hidden input field to the media post id
            var sortableHandle = button.closest('.sortable-handle');
            var previewSrc = sortableHandle.find('img.image-preview').attr('src');
            // sortableHandle.find('img.image-preview').attr('src', postThumbnailSrc);
            // sortableHandle.find('input.media-id').val(postId);
            tb_remove();
    };
    return false;
      
   });
   
   function add_media_item()
   {
       $(scope + ' .media-items').append('<div class="'+media_item_class+'">\n\
                            <input type="hidden" name="media-id[]" class="media-id" value="" />\n\
                            <img src="" class="image-preview img-polaroid" />\n\
                            <span class="delete-media">X</span>\n\
                            </div>');
   }
   
   function add_media_values()
   { 
       var $inserted_media_item = $(scope + ' .media-items .'+media_item_class).last();
       $inserted_media_item.find('.media-id').val(postId);
       $inserted_media_item.find('.image-preview').attr('src', postThumbnailSrc);
   }
   
   
   $(scope + ' .media-items').on('click', '.delete-media', function() {
       $(this).closest('.media-item').remove();
   });
});