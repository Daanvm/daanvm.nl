<?php

use ChristelMusic\FormData;

require_once '../vendor/autoload.php';

if (!empty($_POST['submit'])) {
    $data = FormData::fromPost($_POST);

    if ($data->isValid()) {
        // Send email.
        $message = "
Hoi Christel!<br />
<br />
Er is een nieuwe bestelling geplaatst voor je CD:<br />
<br />        
Name: " . htmlentities($data->name) . "<br />
Email: " . htmlentities($data->email) . "<br />
Address: " . htmlentities($data->address) . "<br />
Postal Code: " . htmlentities($data->postalCode) . "<br />
City: " . htmlentities($data->city) . "<br />
Country: " . htmlentities($data->country) . "<br />
Quantity: " . htmlentities($data->quantity) . "<br />
<br />        
Groetjes,<br />
Je websitebouwer<br />
";

        $payload = [
            'value1' /* name */ => $data->name,
            'value2' /* message */ => $message,
            'value3' /* unused */ => null,
        ];

        $ifttt_key = getenv('IFTTT_KEY');

        $ch = curl_init('https://maker.ifttt.com/trigger/watershed_ordered/with/key/' . $ifttt_key);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        $result = curl_exec($ch);
        curl_close($ch);

        if ($result) {
            // Redirect to success message.
            header('Location: /thanks');
            exit;
        } else {
            echo "There was an error.";
            exit;
        }
    }
} else {
    $data = FormData::empty();
}

$page_name = 'Order album Watershed';
require './includes/header.php';

?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Order now: Watershed</h1>
        <p>€8,00 (+ shipping costs)</p>
        <p>
            <img src="/assets/images/jewelcase_watershed.jpg" class="img-fluid"/>
        </p>
        <form method="post" action="/cd">
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?=$data->getHtmlClass('name')?>" id="name" name="name" value="<?=htmlentities($data->name)?>" />
                    <?=$data->getHtmlFeedback('name')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control <?=$data->getHtmlClass('email')?>" id="email" name="email" value="<?=htmlentities($data->email)?>" />
                    <?=$data->getHtmlFeedback('email')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?=$data->getHtmlClass('address')?>" id="address" name="address" value="<?=htmlentities($data->address)?>" />
                    <?=$data->getHtmlFeedback('address')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="postalCode" class="col-sm-3 col-form-label">Postal code</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?=$data->getHtmlClass('postalCode')?>" id="postalCode" name="postalCode" value="<?=htmlentities($data->postalCode)?>" />
                    <?=$data->getHtmlFeedback('postalCode')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="city" class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control <?=$data->getHtmlClass('city')?>" id="city" name="city" value="<?=htmlentities($data->city)?>" />
                    <?=$data->getHtmlFeedback('city')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="country" class="col-sm-3 col-form-label">Country</label>
                <div class="col-sm-9">
                    <select class="form-control <?=$data->getHtmlClass('country')?>" id="country" name="country">
                        <?php
                        $countries = require('./includes/countries.php');
                        $countries['NL'] = 'The Netherlands'; // Add 'The' prefix.

                        foreach ($countries as $country) {
                            printf(
                                '<option value="%s" %s>%s</option>' . PHP_EOL,
                                $country,
                                $data->country == $country ? 'selected' : '',
                                $country
                            );
                        }
                        ?>
                    </select>
                    <?=$data->getHtmlFeedback('country')?>
                </div>
            </div>
            <div class="form-group row">
                <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <select class="form-control <?=$data->getHtmlClass('quantity')?>" id="quantity" name="quantity">
                        <option value="1"<?=$data->quantity == 1 ? 'selected' : ''?>>1 CD - €8.00 + shipping costs</option>
                        <option value="2"<?=$data->quantity == 2 ? 'selected' : ''?>>2 CDs - €16.00 + shipping costs</option>
                        <option value="3"<?=$data->quantity == 3 ? 'selected' : ''?>>3 CDs - €24.00 + shipping costs</option>
                    </select>
                    <?=$data->getHtmlFeedback('quantity')?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 mt-3">
                    <p>Thank you for your order! I will send you a payment link by email later.</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-watershed">Order now</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require './includes/footer.php'; ?>
