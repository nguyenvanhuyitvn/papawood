$(function () {
    $('.btn-add-attribute').on('click', function(){
            $('#name').keyup(function(){
                var name = $('#name').val();
                console.log(name);
                if(name.length  > 0) {
                    $('.btn-submit-attribute').removeClass('disabled');
                    $('.btn-submit-attribute').attr('disabled', false);
                }else{
                    $('.btn-submit-attribute').addClass('disabled');
                    $('.btn-submit-attribute').attr('disabled', true);
                }
            });
    });
    $('.btn-add-value').on('click', function(){
        $('#value_attribute').keyup(function(){
            var name = $('#value_attribute').val();
            console.log(name);
            if(name.length  > 0) {
                $('.btn-submit-value').removeClass('disabled');
                $('.btn-submit-value').attr('disabled', false);
            }else{
                $('.btn-submit-value').addClass('disabled');
                $('.btn-submit-value').attr('disabled', true);
            }
        });
    });

    $('.btn-attribute-edit').each(function(){
        $(this).click(function(){
            $('#attribute-name-edit').keyup(function(){
                var name = $('#attribute-name-edit').val();
                console.log(name);
                if(name.length  > 0) {
                    $('.btn-submit-edit-attribute').removeClass('disabled');
                    $('.btn-submit-edit-attribute').attr('disabled', false);
                }else{
                    $('.btn-submit-edit-attribute').addClass('disabled');
                    $('.btn-submit-edit-attribute').attr('disabled', true);
                }
            });
            var id = $(this).attr('data-id');
            var url = $('#form-edit-attribute').attr('action');
            $('#form-edit-attribute').attr('action', url);
            // console.log(url);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:  '/sela.vn/admin/attribute/edit/'+ id, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function(response){
                    $('#attribute-name-edit').val('');
                    var pathArray = url.split('/');
                    var idUrl = pathArray[pathArray.length - 1];
                    console.log(idUrl); 
                    console.log(response['name']);
                    $('#attribute-name-edit').val(response['name']);
                    url = url.replace(idUrl,  response['id'] );
                    $('#form-edit-attribute').attr('action', url);
                }
            });
           
        });
    });
    // Edit Attribute Value

    $(".btn-value-edit").each(function(){
        $(this).click(function(){
            $('#value-name-edit').keyup(function(){
                var name = $('#value-name-edit').val();
                console.log(name);
                if(name.length  > 0) {
                    $('.btn-submit-edit-value').removeClass('disabled');
                    $('.btn-submit-edit-value').attr('disabled', false);
                }else{
                    $('.btn-submit-edit-value').addClass('disabled');
                    $('.btn-submit-edit-value').attr('disabled', true);
                }
            });
            var id = $(this).attr('data-id');
            var urlEdit = $('#form-edit-value').attr('action');
            // $('#form-edit-value').attr('action', urlEdit);
            // console.log(urlEdit);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:  '/sela.vn/admin/value/edit/'+ id, //this is your uri
                type: 'GET', //this is your method
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $('#value-name-edit').val('');
                    $(".attribute-value").each(function(){
                        var idAttribute = parseInt($(this).val());
                        if(idAttribute == response['attribute_id']){
                            $(this).attr('selected', true);
                        }else{
                            $(this).attr('selected', false);
                        }
                        
                    });
                    var pathArray = urlEdit.split('/');
                    var idUrl = pathArray[pathArray.length - 1];
                    $('#value-name-edit').val(response['value']);
                    urlEdit = urlEdit.replace(idUrl,  response['id'] );
                    $('#form-edit-value').attr('action', urlEdit);

                    // Validate input
                    var nameCheck = $('#value-name-edit').val();
                    if(nameCheck.length  > 0) {
                        $('.btn-submit-edit-value').removeClass('disabled');
                        $('.btn-submit-edit-value').attr('disabled', false);
                    }else{
                        $('.btn-submit-edit-value').addClass('disabled');
                        $('.btn-submit-edit-value').attr('disabled', true);
                    }
                    // console.log($('#form-edit-value').attr('action', urlEdit)); 
                }
            });
        });
    });
});