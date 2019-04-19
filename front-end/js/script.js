$(function () {
    $('#tCAd').submit(function (e){
        e.preventDefault();
        $('#error').empty();
        var data = $('#tCAd').serialize();
        console.log(data);
       
         $.ajax({
            type: 'POST',
            url: 'traitement/tCAdmin.php',
            data: data,
            dataType: 'json',
            success:function (results) {
                if (results.isSuccess) {
                    alert(results.message);
                     document.location.href = 'pages/qr.php?id='+json.id;

                } else {
                    alert(results.gError);
                }
            }
         });
    });
    
})