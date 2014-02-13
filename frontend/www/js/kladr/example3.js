(function($){
    $(function() {
        var container = $('#example3');
        
        // Автодополнение населённых пунктов
        container.find( '[name="location"]' ).kladr({
            token: '52f8923f31608f874200001c',
            key: '6c67fa5cfe10037605c4242228f01c65d6a82d81',
            type: $.kladr.type.city,
            select: function( obj ) {
                // Изменения родительского объекта для автодополнения улиц
                container.find( '[name="street"]' ).kladr('parentId', obj.id);
                container.find( '#pindex' ).text(searchContext);
            }
        });

        // Автодополнение улиц
        container.find( '[name="street"]' ).kladr({
            token: '52f8923f31608f874200001c',
            key: '6c67fa5cfe10037605c4242228f01c65d6a82d81',
            type: $.kladr.type.street,
            parentType: $.kladr.type.city
        });
    });
})(jQuery);