<?php

namespace ChristelMusic\Releases;

use ChristelMusic\LocalUrl;

interface ReleaseProject
{
    public function getTitle(): string;
    public function getSlug(): string;
    public function getHeaderImageUrl(): LocalUrl;

    /**
     * @return ReleaseItem[]
     */
    public function getReleaseItems(): array;
}