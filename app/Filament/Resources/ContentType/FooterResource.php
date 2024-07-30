<?php

namespace App\Filament\Resources\ContentType;

use App\Filament\Resources\ContentType\FooterResource\Pages;
use App\CmsPages\Templates\ContentType\Footer as Template;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use SolutionForest\FilamentCms\Enums\PageType;
use SolutionForest\FilamentCms\Filament\Resources\ContentTypePageBaseResource as BaseResource;

class FooterResource extends BaseResource
{
    use \Filament\Resources\Concerns\Translatable;

    protected static ?int $navigationSort = null;

    protected static $parentPageKey = '9';

    protected static string $subSlug = 'cms-footer';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Footer';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFooters::route('/'),
            'edit' => Pages\EditFooter::route('/{record:id}/edit'),
            'create' => Pages\CreateFooter::route('/create'),
        ];
    }

    public static function table(Table $table): Table
    {
        return parent::table($table)
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'gray',
                        'reviewing' => 'warning',
                        'published' => 'success',
                        'rejected' => 'danger',
                    }),
                TextColumn::make('created_at')->dateTime()
                     ->sortable(),
                TextColumn::make('updated_at')->dateTime()
                     ->sortable(),
                ]);
    }

    public static function getTemplate(): string
    {
        return Template::class;
    }
}
