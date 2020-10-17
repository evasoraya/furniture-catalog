let username="";
let allproducts={};


    appController.getLoggedUser('x=x', function (response, status) {


        if (!response.login){
            $('#login-logout-button').html(
                '<a hidden href="./login.php">Login</a>'
            )
        }else{
            username = response.user.records[0].fields['First Name'] +" " +response.user.records[0].fields['Last Name'];
            $('.not-logged').remove();
            $('.mail-button').prop('disabled',false);
            $('#login-logout-button').html(
                '<a hidden href="./login.php" onclick="logout()">Logout</a>'
            )
            $('#logged-user').html(
                "<span><i class='fas fa-user'></i>  Hello, "+ appController.prettify(username) +"</span>"
            )
        }

    });
    appController.getAllProducts(function (response, status) {
        allproducts =response;

        $('.p-content').html("");
        response.forEach(appendProduct);

    });


    appController.getMaxValue(function (response,status) {
        $('.rangeInput').prop('max', response)
        $('.range-value').html(response)

    });

    function appendProduct(item) {
        const renderStock = () =>{
            return(
                item.fields['Units In Store'] > 0 ?
                    '<i class="fas fa-check " style="color: green"></i>' :
                    '<i class="fas fa-times " style="color: red"></i>'
            )
        };
        const renderDescription = () => {
            if(item.fields['Description'].length > 100){
                return (item.fields['Description'].substring(0,100)+ "...")
            }
            return item.fields['Description'];
        };
        const sendDesigner = () => {
           return(
               item.fields['Designer']? item.fields['Designer'][0] : ""
           )
        };

        $('.p-content').append(
            '<div class="row card-row">'+
            '<div class="card col-sm-12">'+
                '<div class="col-sm-2 col-custom-padding" >'+
                `<img src="${item.fields['Picture'][0].url}" width="100px" height="100px" style="object-fit: cover"/>`+
                '</div>'+
                '<div class="col-sm-4">'+
                    '<div class="row">' +
                        '<div class="col-sm-12">'+
                            '<div class="col-sm-9 "><h5 class="product-name" value='+item.id+'>' + item.fields['Name'] +'</h5></div>'+
                            '<div class="col-sm-3 product-price"><h5>$'+ item.fields['Unit Cost'] +'</h5></div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="row">' +
                        '<div class="col-sm-12">'+
                            '<div class="col-sm-9 product-vendor">'+
                                '<h6 class="title">Vendor</h6>'+

                                '<div class="vendor"><h6 style="font-style: italic">'+ item.fields['Vendor'][1]['joinedVendor']['fields']['Name'] +'</h6></div>'+
                            '</div>'+
                            '<div class="col-sm-3 product-stock custom-padding">' +
                                '<h6 class="title">In Stock?</h6>'+
                                renderStock() +
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-5">'+
                    '<h6 class="title">Description</h6>'+
                    '<p>'+ renderDescription()+ '</p>'+
                '</div>'+
                '<div class="col-sm-1 mail-option">'+
                    '<a data-toggle="modal" data-target="#productDetails" onclick="sendDetails(\'' + item.id  + '\',\'' + item.fields['Vendor'][1]['joinedVendor']['fields']['Name']  + '\',\'' + sendDesigner()  + '\')"><i class="fas fa-chevron-right fa-2x" style="color: #5f5f5f;"></i></a>'+
                '</div>'+
            '</div>'
        )
    }
    function logout() {
    appController.doLogout(function (response, status) {
        console.log(response,":", status);
    });
}

