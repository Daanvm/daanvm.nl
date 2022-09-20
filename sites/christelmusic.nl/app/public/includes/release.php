<?php
/**
 * @var ReleaseProject $releaseProject
 */

use ChristelMusic\Releases\ReleaseItemAlbum;use ChristelMusic\Releases\ReleaseProject;
use Webmozart\Assert\Assert;

require_once '../vendor/autoload.php';

Assert::isInstanceOf($releaseProject, ReleaseProject::class);

$pageName = $releaseProject->getTitle();
require './includes/header.php';

foreach($releaseProject->getReleaseItems() as $releaseItem):
    $isNotReleasedYet = $releaseItem->getReleaseDate() > new DateTimeImmutable();
?>
<div class="row mt-5">
    <div class="col-md-6 order-md-2">
        <p>
            <img src="<?=$releaseItem->getImageUrl()?>" class="img-fluid"/>
        </p>
        <?php if ($releaseItem instanceof ReleaseItemAlbum && !$isNotReleasedYet): ?>
            <p>
                <a class="btn btn-primary btn-<?=$releaseProject->getSlug()?>" href="/cd" role="button">Order the CD for €8.00</a>
            </p>
        <?php endif; ?>
    </div>

    <div class="col-md-6 order-md-1">
        <h2>
            <?php
            $releaseType = $releaseItem instanceof ReleaseItemAlbum ? "Album" : "Single";

            if ($isNotReleasedYet) {
                echo sprintf("Coming soon: %s %s", $releaseType, $releaseItem->getTitle());
            } else {
                echo sprintf("%s %s is available on all streaming platforms", $releaseType, $releaseItem->getTitle());
            }
            ?>
        </h2>

        <?php if ($releaseItem instanceof ReleaseItemAlbum): ?>
        <ol class="album-tracks">
            <?php foreach ($releaseItem->getTracks() as $trackTitle): ?>
            <li><?=$trackTitle?></li>
            <?php endforeach; ?>
        </ol>
        <?php endif; ?>

        <?php if ($isNotReleasedYet): ?>
            <?php if ($releaseItem->getPreSaveLink() !== null): ?>
            <p>
                <a class="btn btn-primary btn-<?=$releaseProject->getSlug()?>" href="<?=$releaseItem->getPreSaveLink()?>" target="_blank" role="button">Pre-save now!</a>
            </p>
            <?php endif; ?>
        <?php else: ?>
        <table class="get-track">
            <colgroup>
                <col/>
                <col style="width: 100px;"/>
            </colgroup>
            <tr>
                <td><i class="fab fa-spotify"></i> Spotify</td>
                <td><a class="btn btn-outline-secondary" target="_blank"
                       href="<?=$releaseItem->getStreamingInformation()->spotifyUrl?>">Listen</a>
                </td>
            </tr>
            <tr>
                <td><i class="fab fa-apple"></i> Apple Music</td>
                <td><a class="btn btn-outline-secondary" target="_blank"
                       href="<?=$releaseItem->getStreamingInformation()->appleMusicUrl?>">Listen</a>
                </td>
            </tr>
            <tr>
                <td><i class="fab fa-deezer"></i> Deezer</td>
                <td><a class="btn btn-outline-secondary" target="_blank"
                       href="<?=$releaseItem->getStreamingInformation()->deezerUrl?>">Listen</a></td>
            </tr>
            <?php if ($releaseItem->getStreamingInformation()->tidalUrl !== null): ?>
            <tr>
                <td><img class="icon" src="/assets/icons/brand-tidal.svg"/> Tidal</td>
                <td><a class="btn btn-outline-secondary" target="_blank"
                       href="<?=$releaseItem->getStreamingInformation()->tidalUrl?>">Listen</a></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><i class="fab fa-amazon"></i> Amazon</td>
                <td><a class="btn btn-outline-secondary" target="_blank"
                       href="<?=$releaseItem->getStreamingInformation()->amazonUrl?>">Listen</a></td>
            </tr>
        </table>
        <?php endif; ?>
    </div>
</div>

<hr />
<?php endforeach; ?>

<?php require './includes/footer.php'; ?>
