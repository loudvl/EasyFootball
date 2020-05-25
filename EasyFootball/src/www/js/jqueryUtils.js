function loadProfilePic()
{
        var file = $('#profilePic')[0].files[0];
        var reader = new FileReader();
        reader.addEventListener("load", function () {
        $('#profilePicView').attr('src',reader.result);
        }, false);
        if (file) {
        reader.readAsDataURL(file);
        }
}

function uploadProfilePic()
{
        var form = $('#profilePicForm');
        var formdata = false;
        if (window.FormData){
            formdata = new FormData(form[0]);
        }
        $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "../scripts/uploadProfilePic.php",
                data: formdata,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
    
                    loadProfilePic();
    
                }
        });
}