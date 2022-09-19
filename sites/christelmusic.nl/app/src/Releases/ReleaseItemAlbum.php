<?php

namespace ChristelMusic\Releases;

interface ReleaseItemAlbum extends ReleaseItem
{
    /**
     * @return string[]
     */
    public function getTracks(): array;
}