<?php
    $page_name = 'Order album Watershed';
    require './includes/header.php';
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Order now: Watershed</h1>
        <p>
            <img src="/assets/images/jewelcase_watershed.jpg" class="img-fluid"/>
        </p>
        <form method="post" action="/cd">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" />
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" />
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" />
                </div>
            </div>
            <div class="form-group row">
                <label for="postalcode" class="col-sm-3 col-form-label">Postal code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="postalcode" />
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="city" />
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                    <select class="form-control" id="country">
                        <option value="The Netherlands" selected="selected">The Netherlands</option>
                        <?php
                        $countries = require('./includes/countries.php');
                        unset($countries['NL']);

                        foreach ($countries as $country) {
                            printf('<option value="%s">%s</option>'.PHP_EOL, $country, $country);
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <select class="form-control" id="quantity">
                        <option value="1">1 CD - €8.00 + shipping costs</option>
                        <option value="2">2 CDs - €16.00 + shipping costs</option>
                        <option value="3">3 CDs - €24.00 + shipping costs</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <p>Thank you for your order! I will send you a payment link by email later.</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Order now</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require './includes/footer.php'; ?>
