var item = {};
function sendDetails(itemId,vendor, designer) {
    $(document).on('hide.bs.modal','.modal', function (e) {

        $('.carousel-inner').html("");
        $('.tags').html("");
        $('.tags2').html("");
        $('.designer').html("");

    });
    appController.getProduct(itemId,function (response, status){

        $('.modal-title').html(response.fields['Name'] + ' <span class="badge badge-primary custom-badge">'+response.fields['Type']+'</span>');
        for(let i=0 ; i < response.fields['Picture'].length; i++){
            $('.carousel-inner').append(
                `<div class="item ${i==0? "active": ''}">`+
                    `<img src="${response.fields['Picture'][i].url}"  />` +
                '</div>'
            );
            $('.carousel-indicators').html(`<li data-target="#myCarousel" data-slide-to="${i}" class="${i==0? "active": ''}"></li>`)
        }

        const renderDescription = () => {
            if(response.fields['Description'].length > 1300){
                return (response.fields['Description'].substring(0,1300)+ "...")
            }
            return response.fields['Description'];
        };
        $('.description').html(renderDescription());
        $('.vendor-name').html(vendor);
        $('.size').html(response.fields['Size (WxLxH)']);
        $('.stock').html(response.fields['Units In Store']);
        appController.getDesignerFromProduct(designer, function (res, status){
            console.log(res.fields)
            $('.designer').html(res.fields['Name']);
        });
        $('.price').html("$ "+response.fields['Unit Cost']);
        for(let i=0 ; i < response.fields['Settings'].length; i++){
            $('.tags').append(
            '<span class="badge badge-info">'+response.fields['Settings'][i]+'</span>'
            );
        }
        for(let i=0 ; i < response.fields['Materials and Finishes'].length; i++){
            $('.tags2').append(
                '<span class="badge badge-info">'+response.fields['Materials and Finishes'][i]+'</span>'
            );
        }
        item=response;
    });
    $('#myCarousel').carousel();
}
function convertToPDF() {
    appController.sendEmail(item.id,function (response,status) {
        console.log(response ,":", status);
        if(status === 'error') {
            alert("Something went wrong, try again");
        }else{
            $("#productDetails").modal('hide');
        }
    })
}
