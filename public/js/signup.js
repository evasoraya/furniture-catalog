$('#signupForm').submit(function (e) {
    appController.createUser($(this).serialize(), function (response, status) {
        console.log('Response:', response);
        console.log('Status:', status);

        if(status === 'success') {
            alert('User has been successfully created');
            document.location = 'login.php';
        } else
            alert('There was an error, user failed to create');

    });

    e.preventDefault();
});
