// $(document).ready(function(){
//     $('.modal-footer').on('click', '.btn-simpan', function(){
//         $.ajax({
//             type: 'POST',
//             url: 'api/menu/ajax/save',
//             data: {
//                 '_token': $('input[name=_token]').val(),
//                 'role_id': $('input[name=role_id]').val(),
//                 'name': $('input[name=name]').val(),
//                 'icon': $('input[name=icon]').val(),
//                 'link': $('input[name=link]').val(),
//                 'desc': $('input[name=desc]').val()
//             },
//             success: function(data){
//                 console.log('data tersimpan');
//             }
//         });
//     });
// });

$(document).ready(function(){
    $('.modal-footer').on('click', '.btn-simpan',function(){
        $('#formSimpanMenu').submit(function(e){
            e.preventDefault();
            let role_id = $('#role_id').val();
            let name = $('#name').val();
            let icon = $('#icon').val();
            let link = $('#link').val();
            let desc = $('#desc').val();
            let _token = $('input[name=_token]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/menu/ajax/save",
                type: "POST",
                data: {
                    role_id:role_id,
                    name:name,
                    icon:icon,
                    link:link,
                    desc:desc,
                    _token:_token
                },
                success: function(response){
                    if(response)
                    {
                        $('#menuTable tbody').append(
                            '<tr>'
                                + '<td>' + response.role_id +'</td>'
                                + '<td>' + response.name + '</td>'
                                + '<td>' + response.icon + '</td>'
                                + '<td>' + response.link + '</td>'
                                + '<td>' + response.desc + '</td>' +
                            '</tr>'
                        );

                        $('#formSimpanMenu')[0].reset();

                        $('#addMenuModal').modal('hide');
                    }
                }
            });
        });
    });
});
