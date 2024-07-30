<?php

namespace App\CmsPages\Templates\ContentType;

use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use SolutionForest\FilamentCms\CmsPages\Contracts\CmsPageTemplate;
use SolutionForest\FilamentCms\CmsPages\Templates\ContentTypeTemplate as BaseTemplate;

class Contact extends BaseTemplate implements CmsPageTemplate
{
    public static function schema(): array
    {
        return [
            Forms\Components\Card::make()
                ->schema([
                Forms\Components\TextInput::make('email')
                        ->label('Email'),
                Forms\Components\TextInput::make('phone')
                        ->label('Phone Number'),
                Forms\Components\TextInput::make('time')
                        ->label('Working Hours'),
            ]),
            // RichEditor::make('content')->label("Content")
        ];
    }

    public static function title(): string
    {
        return 'Contact';
    }
}
