<?php

namespace App\CmsPages\Templates\ContentType;

use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use SolutionForest\FilamentCms\CmsPages\Contracts\CmsPageTemplate;
use SolutionForest\FilamentCms\CmsPages\Templates\ContentTypeTemplate as BaseTemplate;

class Footer extends BaseTemplate implements CmsPageTemplate
{
    public static function schema(): array
    {
        return [
            RichEditor::make('about')->label("About Us"),
            Forms\Components\Card::make()
                ->schema([
                Forms\Components\TextInput::make('address')
                        ->label('Address'),
            ]),
            RichEditor::make('service')->label("Our Services")
        ];
    }

    public static function title(): string
    {
        return 'Footer';
    }
}
