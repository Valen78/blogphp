(function($){
    $(function(){
        $('#delete').on('shown.bs.modal',function(e){
            $(this).find('form').attr('action','/post/'+ $(e.relatedTarget).attr('data-id'));
        });
    });
})(jQuery);