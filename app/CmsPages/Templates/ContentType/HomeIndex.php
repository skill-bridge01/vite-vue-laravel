<?php

namespace App\CmsPages\Templates\ContentType;

use Filament\Forms;
use SolutionForest\FilamentCms\CmsPages\Contracts\CmsPageTemplate;
use SolutionForest\FilamentCms\CmsPages\Templates\IndexContentTypeTemplate as BaseTemplate;

class HomeIndex extends BaseTemplate implements CmsPageTemplate
{
    public static function schema(): array
    {
        return [];
    }

    public static function title(): string
    {
        return 'HomeIndex';
    }

    public static function getIndexPageKey()
    {
        return '1';
    }
}
