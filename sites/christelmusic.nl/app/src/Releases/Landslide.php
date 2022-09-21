<?php

namespace ChristelMusic\Releases;

use ChristelMusic\LocalUrl;
use ChristelMusic\SheetMusic;
use DateTimeImmutable;
use DateTimeZone;

class Landslide implements ReleaseProject
{
    public function getTitle(): string
    {
        return "Landslide";
    }

    public function getSlug(): string
    {
        return "landslide";
    }

    public function getHeaderImageUrl(): LocalUrl
    {
        return new LocalUrl("/assets/images/header_landslide.jpg");
    }

    public function getProjectImageUrl(): LocalUrl
    {
        return new LocalUrl("/assets/images/project_landslide.jpg");
    }

    public function getOgImageUrl(): LocalUrl
    {
        return new LocalUrl("/assets/images/landslide.jpg");
    }

    /**
     * @return ReleaseItem[]
     */
    public function getReleaseItems(): array
    {
        return [
            new class implements ReleaseItemAlbum {
                public function getTitle(): string
                {
                    return "Landslide";
                }

                public function getReleaseDate(): DateTimeImmutable
                {
                    return new DateTimeImmutable("2022-10-07 00:00:00", new DateTimeZone("Europe/Amsterdam"));
                }

                public function getImageUrl(): LocalUrl
                {
                    return new LocalUrl("/assets/images/jewelcase_landslide.jpg");
                }

                public function getTracks(): array
                {
                    return [
                        'Butterflies',
                        'On Your Own',
                        'Fairytale Forest Pt. 1',
                        'Nightly Ghosts',
                        'The Unknown',
                        'Supremacy',
                        'Fairytale Forest Pt. 2',
                        'You Found Me',
                        'Summer Stroll',
                        'Fairytale Forest Pt. 3',
                    ];
                }

                public function getPreSaveLink(): ?string
                {
                    return 'https://ditto.fm/landslide-christel';
                }

                public function getStreamingInformation(): ReleaseStreamingInformation
                {
                    return new ReleaseStreamingInformation(
                        '',
                        '',
                        '',
                        null,
                        '',
                    );
                }

                /**
                 * @return SheetMusic[]
                 */
                public function getSheetMusics(): array
                {
                    return [
                        new SheetMusic('Butterflies', 'landslide/01 Butterflies.pdf'),
                        new SheetMusic('On Your Own', 'landslide/02 On_Your_Own.pdf'),
                        new SheetMusic('Fairytale Forest Pt. 1', 'landslide/03 Fairytale_Forest_Pt._1.pdf'),
                        new SheetMusic('Nightly Ghosts', 'landslide/04 Nightly_Ghosts.pdf'),
                        new SheetMusic('The Unknown', 'landslide/05 The_Unknown.pdf'),
                        new SheetMusic('Supremacy', 'landslide/06 Supremacy.pdf'),
                        new SheetMusic('Fairytale Forest Pt. 2', 'landslide/07 Fairytale_Forest_Pt._2.pdf'),
                        new SheetMusic('You Found Me', 'landslide/08 You_Found_Me.pdf'),
                        new SheetMusic('Summer Stroll', 'landslide/09 Summer_Stroll.pdf'),
                        new SheetMusic('Fairytale Forest Pt. 3', 'landslide/10 Fairytale_Forest_Pt._3.pdf'),
                    ];
                }
            },
            new class implements ReleaseItemSingle {
                public function getTitle(): string
                {
                    return "Supremacy";
                }

                public function getReleaseDate(): DateTimeImmutable
                {
                    return new DateTimeImmutable("2022-09-09 00:00:00", new DateTimeZone("Europe/Amsterdam"));
                }

                public function getImageUrl(): LocalUrl
                {
                    return new LocalUrl("/assets/images/supremacy.jpg");
                }

                public function getPreSaveLink(): ?string
                {
                    return 'https://ditto.fm/supremacy-christel';
                }

                public function getStreamingInformation(): ReleaseStreamingInformation
                {
                    return new ReleaseStreamingInformation(
                        'https://open.spotify.com/track/0ozKYqOXbeGPSo6oNlehmz',
                        'https://music.apple.com/nl/album/supremacy-single/1638051087',
                        'https://deezer.page.link/B8SCsYHN19zefw7Z6',
                        null,
                        'https://music.amazon.com/albums/B0B8MVP2SW',
                    );
                }

                /**
                 * @return SheetMusic[]
                 */
                public function getSheetMusics(): array
                {
                    return [];
                }
            },
            new class implements ReleaseItemSingle {
                public function getTitle(): string
                {
                    return "Summer stroll";
                }

                public function getReleaseDate(): DateTimeImmutable
                {
                    return new DateTimeImmutable("2022-08-12 00:00:00", new DateTimeZone("Europe/Amsterdam"));
                }

                public function getImageUrl(): LocalUrl
                {
                    return new LocalUrl("/assets/images/summer_stroll.jpg");
                }

                public function getPreSaveLink(): ?string
                {
                    return 'https://ditto.fm/supremacy-christel';
                }

                public function getStreamingInformation(): ReleaseStreamingInformation
                {
                    return new ReleaseStreamingInformation(
                        'https://open.spotify.com/track/0n9RsgRoPBWbtVs84s5aQF',
                        'https://music.apple.com/nl/album/summer-stroll-single/1638050773',
                        'https://deezer.page.link/R9WmedLRmHCuQFd67',
                        null,
                        'https://music.amazon.com/albums/B0B8MVM9WR',
                    );
                }

                /**
                 * @return SheetMusic[]
                 */
                public function getSheetMusics(): array
                {
                    return [];
                }
            },
        ];
    }
}