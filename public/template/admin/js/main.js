$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url){
    if(confirm('Bạn có muốn xóa hay không?')){
        $.ajax(
            {
                type:'DELETE',
                dataType:'JSON',
                data:{id},
                url:url,
                success:function(result){
                    if(result.error===false){
                        alert(result.message);
                        location.reload();
                    }
                    else{
                        alert('Xóa không thành công');
                    }
                }
            }
        )
    }
}

//Upload file
$('#upload').change(function(){
    const form = new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType:false,
        type:'GET',
        dataType:'JSON',
        data:form,
        url:'/admin/upload/services',
        success:function(result){
            if(result.error===false){
                $('#image_show').html('<a href="'+result.url+'"target="_blank"><img src="'+result.url+'" width=100px></a>');
                $('#file').val(result.url);
            }
            else{
                alert('Update File lỗi');
            }
        } 
    });
});