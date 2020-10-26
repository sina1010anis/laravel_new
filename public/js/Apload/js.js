$(document).ready(function () {
    $("#form").on('submit' , function (e) {
        e.preventDefault();
        var Data=new FormData(this);
        Data.append('title' , $("#title").val());
        $.ajax({
            url:'/Upload/Photo/Users',
            data:Data,
            type:"POST",
            cache:false,
            contentType:false,
            processData: false
        }).done(function (msg) {
            alert(msg);
        })
    });

});
