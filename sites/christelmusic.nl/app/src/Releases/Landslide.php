<?php

namespace ChristelMusic\Releases;

use ChristelMusic\LocalUrl;
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
                    // TODO - Update image
                    return new LocalUrl("/assets/images/jewelcase_landslide.jpg");
                }

                public function getTracks(): array
                {
                    return [
                        'Butterflies',
                        'On Your Own',
                        'Fairytale Forest Pt. 1',
                        'Nightly Ghost',
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
                    return null;
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
            },
        ];
    }
}