<?php

use ChristelMusic\SheetMusic;

require_once '../vendor/autoload.php';

$pageName = 'Sheet music';
require './includes/header.php';

$sheetMusics = [
    new SheetMusic('Watershed', 'Watershed.pdf'),
    new SheetMusic('A Glimpse of Hope', 'A Glimpse of Hope.pdf'),
    new SheetMusic('Memories', 'Memories.pdf'),
    new SheetMusic('Chased by Shadows', 'Chased by Shadows.pdf'),
    new SheetMusic('Mischievous Exploration', 'Mischievous Exploration.pdf'),
];
?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <h1>Sheet music</h1>
    </div>
</div>

<?php foreach($sheetMusics as $sheetMusic): ?>
    <div class="row row-sheetmusic mb-2">
        <div class="col-6 col-md-3 offset-md-3 border">
            <img src="data:image/png;base64,<?=$sheetMusic->getBase64encodedPngData()?>" width="100%" />
        </div>
        <div class="col-6 col-md-3">
            <p><b>Song name:</b> <?=$sheetMusic->songName?></p>
            <p><b>Number of pages:</b> <?=$sheetMusic->getNumberOfPages()?></p>
            <p><a class="btn btn-primary btn-watershed" target="_blank" href="<?=$sheetMusic->getPdfUrl()?>" role="button">Download <?=$sheetMusic->songName?> sheet music</a></p>
        </div>
    </div>
<?php endforeach;?>

<?php require './includes/footer.php'; ?>
