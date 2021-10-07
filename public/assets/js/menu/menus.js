$(document).ready(function(){
    $('.modal-footer').on('click', '.btn-simpan', function(){
        $.ajax({
            type: 'POST',
            url: 'menu/save',
            data: {
                '_token': $('input[name=_token]').val(),
                'role': $('input[name=role]').val(),
                'name': $('input[name=name]').val(),
                'icon': $('input[name=icon]').val(),
                'link': $('input[name=link]').val(),
                'desc': $('input[name=desc]').val()
            },
            success: function(data){
                alert('data tersimpan');
            }
        });
    });
});
