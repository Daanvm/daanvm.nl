<?php

namespace ChristelMusic\Releases;

use ChristelMusic\LocalUrl;

interface ReleaseProject
{
    public function getTitle(): string;
    public function getSlug(): string;
    public function getHeaderImageUrl(): LocalUrl;
    public function getProjectImageUrl(): LocalUrl;


    /**
     * @return ReleaseItem[]
     */
    public function getReleaseItems(): array;
}