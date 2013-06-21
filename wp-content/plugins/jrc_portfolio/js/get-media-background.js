jQuery(document).ready(function($) {
    var postThumbnailSrc, postId, postTitle, button;
    var scope = '.quote-bg';
    var media_item_class = 'media-item';
    var media_item_name = 'bg-id';
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
            replace_media_item(false);
            add_media_values();
            change_text('get-media', 'Remove title image', 'get-media', 'delete-media');
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
                            <input type="hidden" name="' + media_item_name + '" class="media-id" value="" />\n\
                            <img src="" class="image-preview img-polaroid" />\n\
                            <span class="delete-media">X</span>\n\
                            </div>');
   }
   
   function replace_media_item($x)
   {
       if($x) {
            var x = '<span class="delete-media">X</span>';
       } else {
           var x = '';
       }
       $(scope + ' .media-items').html('<div class="'+media_item_class+'">\n\
                            <input type="hidden" name="' + media_item_name + '" class="media-id" value="" />\n\
                            <img src="" class="image-preview img-polaroid" />\n\
                            '+x+'\n\
                            </div>');
   }
   
   function add_media_values()
   { 
       var $inserted_media_item = $(scope + ' .media-items .'+media_item_class).last();
       $inserted_media_item.find('.media-id').val(postId);
       $inserted_media_item.find('.image-preview').attr('src', postThumbnailSrc);
   }
   
   function add_delete_handler($class)
   {
       $(scope + ' .'+$class).addClass('delete-media');
   }
   
   function change_text($class, $text, $oldClass, $newClass) 
   {
       $(scope + ' .'+$class).text($text).removeClass($oldClass).addClass($newClass);
   }
   
   
   $(scope + ' .media').on('click', '.delete-media', function() {
       $(this).closest('.media').find('.media-item').remove();
       change_text('delete-media', 'Set background image', 'delete-media', 'get-media');
   });
});