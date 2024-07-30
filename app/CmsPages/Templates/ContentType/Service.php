<?php

namespace App\CmsPages\Templates\ContentType;

use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use SolutionForest\FilamentCms\CmsPages\Contracts\CmsPageTemplate;
use SolutionForest\FilamentCms\CmsPages\Templates\ContentTypeTemplate as BaseTemplate;

class Service extends BaseTemplate implements CmsPageTemplate
{
    public static function schema(): array
    {
        return [
            RichEditor::make('content')->label("Content")
        ];
    }

    public static function title(): string
    {
        return 'Service';
    }
}
