
$(function () {
    $('#loginForm').submit(function (e) {
        appController.doLogin($(this).serialize(), function (response, status) {
            console.log('Response:', response);
            console.log('Status:', status);

            if(status === 'success') {
                if(response.login)
                    document.location = './index.php';
                else
                    alert(response.msg);
            }
        });

        e.preventDefault();
    });
});
