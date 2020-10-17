var server = window.location.hostname + ':' + window.location.port;
var area = "index.php/api";

/* USE EXAMPLE
*
* appController.requestDataExample('param1=1&param2=2', function(response, textStatus) {
*       // TODO Stuff with the Response
* });
*
* appController.noDataExample(function(response, textStatus) {
*       // TODO Stuff with the Response
* });
*
*/


appController = {
    noDataExample : function(callback) {
        appController.doAjaxCall("https://" + server  + "/" + area + "linkToRequest", "METHOD_TO_REQUEST", callback, '');
    },
    requestDataExample : function(requestData, callback) {
        appController.doAjaxCall("https://" + server  + "/" + area + "linkToRequest", "METHOD_TO_REQUEST", callback, requestData);
    },
    doLogin : function(requestData, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/do/login", "POST", callback, requestData);
    },
    createUser : function(requestData, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/users/create", "POST", callback, requestData);
    },
    getLoggedUser : function(requestData, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/user/logged", "GET", callback, requestData);
    },
    doLogout : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/do/logout", "GET", callback, '');
    },
    getAllProducts : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/products", "GET", callback, '');
    },
    getAllVendors : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/vendors", "GET", callback, '');
    },
    getAllDesigners : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/designers", "GET", callback, '');
    },
    getProduct : function(productId, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/product/" + productId, "GET", callback, '');
    },
    getVendorFromProduct : function(vendorId, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/vendor/" + vendorId, "GET", callback, '');
    },
    getDesignerFromProduct : function(designerId, callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/designer/" + designerId, "GET", callback, '');
    },
    getonStock : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/onStock", "GET", callback, '');
    },
    getByType : function(type,callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/type/"+type, "GET", callback, '');
    },
    getByPriceRange : function(max,callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/price/"+max, "GET", callback, '');
    },
    sendEmail : function(itemId,callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/sendEmail/"+itemId, "GET", callback, '');
    },
    getMaxValue : function(callback) {
        appController.doAjaxCall("http://" + server  + "/" + area + "/get/max", "GET", callback, '');
    },
    prettify : function (str) {
        if(str === null || str === undefined)
            return '';

        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    },
    /**AJAX CALL**/
    doAjaxCall : function(requestUrl, requestType, callback, requestData) {
        $.ajax({
            url : requestUrl, // The link we are accessing.
            async : true,
            crossDomain : true,
            type : requestType, // The type of request.
            dataType : "JSON", // The type of data that is getting returned.
            data : requestData,
            error : function(obj, textStatus, errorThrown) {
                //console.log(obj, textStatus);
                //appController.filterData(obj, textStatus);
                callback(obj, textStatus);
            },
            success : function(data, textStatus) {
                //console.log(data, textStatus);
                //appController.filterData(data, textStatus);
                callback(data, textStatus);
            }
        });
    },

    /**FILTER AJAX DATA**/
    filterAjaxData : function(data, textStatus) {
        //console.log(data, textStatus);
        if (textStatus === "success") {//Ajax call successful
            if (data.success === 1) {//Correct parameters
                return 1;
            } else {//INcorrect parameters
                return 0;
            }
        } else {//Ajax call UNsuccessful
            return "error";
        }
    }
};

