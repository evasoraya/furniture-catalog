populateDropdownVendors();
populateDropdownDesigner();


document.getElementById("dropdown-vendors").addEventListener("change", function(){
    vendorsFilter($(this).val())

});
document.getElementById("dropdown-designer").addEventListener("change", function(){
    designerFilter($(this).val())

});
document.getElementById("dropdown-category").addEventListener("change", function(){
    categoryFilter($(this).val())

});
document.getElementById("price-range").addEventListener("change", function(){
    priceRange($(this).val())
    $('.range-value').html($(this).val())

});

function  onStock() {
    if($('#stock').is(":checked")){
        $('.p-content').html("<small class=\"text-muted\"><h3>Finding products to show ...</h3></small>");
        appController.getonStock(function (response, status) {
            $('.p-content').html("");
            response.forEach(appendProduct);
        });
    }else{
        $('.p-content').html(

           '<small class="text-muted"><h3>Finding products to show ...</h3></small>'

            );
        allproducts.forEach(appendProduct);
    }

}
function vendorsFilter(vendor) {
    appController.getVendorFromProduct(vendor,function (response,status) {

        $('.p-content').html("");

        response.fields['Furniture'].forEach(gettingFurniture)
    });
}
function gettingFurniture(item) {
    appController.getProduct(item,function (response,status) {
        console.log(response);
        appendProduct(response);
    });
}
function populateDropdownVendors() {
    appController.getAllVendors(function (response,status) {
        response.forEach(appendOption);
    });
}
function populateDropdownDesigner() {
    appController.getAllDesigners(function (response,status) {

        response.forEach(appendOptionDesigner);
    });
}
function appendOption(item) {
    $('.dropdown-vendors').append(
        '<option value='+item.id+'>' + item.fields['Name'] +'</option>'
    );
}
function appendOptionDesigner(item) {
    $('.dropdown-designer').append(
        '<option value='+item.id+'>' + item.fields['Name'] +'</option>'
    );

}
function designerFilter(designer) {
    appController.getDesignerFromProduct(designer,function (response,status) {
        $('.p-content').html("");
        response.fields['Furniture'].forEach(gettingFurniture)
    });
}
function categoryFilter(type) {

    appController.getByType(type,function (response,status) {
        $('.p-content').html("");

        response.forEach(appendProduct)
    });
}
function priceRange(max) {
    console.log(max);
    appController.getByPriceRange(max,function (response,status) {

        $('.p-content').html("");
        response.forEach(appendProduct)
    });
}
