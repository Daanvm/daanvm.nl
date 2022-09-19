<?php

namespace ChristelMusic\Releases;

use ChristelMusic\LocalUrl;
use DateTimeImmutable;

interface ReleaseItem
{
    public function getTitle(): string;
    public function getReleaseDate(): DateTimeImmutable;
    public function getImageUrl(): LocalUrl;
    public function getPreSaveLink(): ?string;
    public function getStreamingInformation(): ReleaseStreamingInformation;
}