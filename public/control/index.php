<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Resonance E comerce</title>
    <script src="../lib/jquery/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">


    <link rel="stylesheet" href="../css/products.css" type="text/css">


</head>

<body>
    <div class="container-fluid">
        <?php include 'navbar.php'; ?>

        <div class="col=sm-12">
            <div class="col-sm-9">

                <div class="container products col-sm-12">

                    <div class="p-content">

                        <small class="text-muted"><h3>Finding products to show ...</h3></small>

                    </div>
                </div>
            </div>
            <div class="filters col-sm-2">
                <h3 class="text-muted">Filters Section</h3>
                <hr/>
                <div class="form-group ">
                    <div class="stock-div">
                        <p style="padding-right: 10px;font-style: italic;"> Only show products on Stock </p>
                        <input name="stock" id="stock" onChange="onStock()"  type="checkbox"/>
                    </div>
                </div>
                <div class="form-group ">
                    <h5>Filter by designer</h5>
                    <select class="form-control dropdown-designer" id="dropdown-designer">
                        <option value="">Select a Designer</option>
                    </select>
                </div>

                <div class="form-group ">
                    <h5>Filter by vendor</h5>
                    <select class="form-control dropdown-vendors" id="dropdown-vendors">
                        <option value="">Select a Vendor</option>
                    </select>
                </div>


                <div class="form-group ">
                    <h5>Filter by category</h5>
                    <select class="form-control dropdown-category" id="dropdown-category">
                        <option value="">Select a Category</option>
                        <option value="Chairs">Chair</option>
                        <option value="Rugs">Rug</option>
                        <option value="Bookshelves">Bookshelves</option>
                        <option value="Tables">Tables</option>
                        <option value="Lighting">Lighting</option>
                        <option value="Tables">Tables</option>
                        <option value="Sofas">Sofas</option>

                    </select>
                </div>

                <div class="form-group ">
                    <h5>Filter by price</h5>
                    <div class="form-control" style="display: flex">
                        <input class="rangeInput" type="range" id="price-range"  min="0" max="" > <span class="range-value"> </span>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <?php include 'detailsModal.php'; ?>

</body>
<script type="text/javascript" src="../js/api.js"></script>
<script type="text/javascript" src="../js/products.js"></script>
<script type="text/javascript" src="../js/filters.js"></script>
<script type="text/javascript" src="/js/bootstrap-carousel.js"></script>
<script type="text/javascript" src="../js/details.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
