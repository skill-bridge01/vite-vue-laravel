<?php

namespace App\Filament\Resources\ContentType;

use App\Filament\Resources\ContentType\HomeResource\Pages;
use App\CmsPages\Templates\ContentType\Home as Template;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use SolutionForest\FilamentCms\Enums\PageType;
use SolutionForest\FilamentCms\Filament\Resources\ContentTypePageBaseResource as BaseResource;

class HomeResource extends BaseResource
{
    use \Filament\Resources\Concerns\Translatable;

    protected static ?int $navigationSort = null;

    protected static $parentPageKey = '1';

    protected static string $subSlug = 'cms-home';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return 'Home';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomes::route('/'),
            'edit' => Pages\EditHome::route('/{record:id}/edit'),
            'create' => Pages\CreateHome::route('/create'),
        ];
    }

    public static function table(Table $table): Table
    {
        return parent::table($table)
            // avoid edit docs
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
                // TextColumn::make('live?'),
                TextColumn::make('created_at')->dateTime()
                     ->sortable(),
                TextColumn::make('updated_at')->dateTime()
                     ->sortable(),
                ]);
            // ->filters([
            //                 //
            // ]);
    }

    public static function getTemplate(): string
    {
        return Template::class;
    }
}
