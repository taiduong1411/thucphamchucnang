$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function removeRow(id, url) {
    if (confirm('Bạn Có Muốn Xoá Không ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function(result) {
                if (result.error === false) {
                    location.reload();
                } else {
                    alert('Xoá Không Thành Công, Xin Vui Lòng Thử Lại');
                }
            }
        })
    }
}


// upload

$('#upload').change(function() {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function(results) {

        }







    });
});