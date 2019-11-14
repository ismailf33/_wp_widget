//for more details
//https://github.com/smartcatdev/WP-Media-Uploader

(function($){
    $(document).ready(function(){
        $('button#author_image').on("click" , function( e ){
            e.preventDefault();

            var imageUploader = wp.media({
                'title' : 'Upload author Image',
                'button' : {
                    'text' : 'Set the Image'
                },
                'multiple' : true
            });
            imageUploader.open(); 
            imageUploader.on("select" , function(){
                var image = imageUploader.state().get("selection").first().toJSON();
                var link = image.url;  
                $("input.image_er_link").val( link );
                $(".image-show img").attr('src' , link );
            })
        });
    });
}(jQuery))

