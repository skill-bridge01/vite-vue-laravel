<?php

namespace App\CmsPages\Templates\ContentType;

use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use SolutionForest\FilamentCms\CmsPages\Contracts\CmsPageTemplate;
use SolutionForest\FilamentCms\CmsPages\Templates\ContentTypeTemplate as BaseTemplate;

class Home extends BaseTemplate implements CmsPageTemplate
{
    public static function schema(): array
    {
        return [
            RichEditor::make('header')->label("Header"),
            RichEditor::make('article')->label("Article"),
            RichEditor::make('about')->label("About")
            // Forms\Components\Card::make()
            //     ->schema([
            //     // Forms\Components\Textarea::make('header')
            //     //     ->label('Header'),
            //     Forms\Components\Textarea::make('article')
            //         ->label('Article'),
            //     Forms\Components\Textarea::make('about')
            //         ->label('About'),
            //     ]),
        ];
    }

    public static function title(): string
    {
        return 'Home';
    }
}
