<div class="modal fade" id="productDetails" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-custom-size ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title"></h2>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="pictures-carousel col-sm-6">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">

                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">

                                </div>

                                <!-- Left and right controls -->
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4>Description</h4>
                            <p class="description"></p>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <h4 tags>Settings</h4>
                                    <div class="tags"></div>
                                </div>
                                <div class="col-sm-6">
                                    <h4 tags>Materials and Finishes</h4>
                                    <div class="tags2"></div>
                                </div>
                            </div>
                            </div>

                        </div>

                    </div>
                </div>
            <div class="row custom-margin ">
                <div class="col-sm-12 ">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Price</th>
                            <th scope="col">Vendor</th>
                            <th scope="col">Designer</th>
                            <th scope="col">Size</th>
                            <th scope="col">Units in Store</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="price"> </td>
                                <td class="vendor-name"> </td>
                                <td class="designer"> </td>
                                <td class="size"> </td>
                                <td class="stock"> </td>
                            </tr>
                        </tbody>
                    </table>

            </div>
            </div>

            <span class="not-logged" style="color: darkred; padding-left: 5px">Please log in to email the product details.</span>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme mail-button btn-block" onclick="convertToPDF()" disabled="true"><i class="far fa-envelope"> </i> Send Details</button>
            </div>
        </div>

    </div>
</div>
