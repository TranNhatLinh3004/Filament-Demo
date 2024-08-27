<?php

namespace App\Filament\Resources\Blog;

use App\Filament\Resources\Blog\CategoryResource\Pages;
use App\Filament\Resources\Blog\CategoryResource\RelationManagers;
use App\Models\Blog\Category;
use Filament\Forms;
use Filament\Forms\Components\TextInput as ComponentsTextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Support\Str;
use Filament\Tables\Filters\Filter;
// use Filament\Tables\Columns\TextColumn;
// use Filament\Tables\Columns\TextInput;
use Filament\Navigation\MenuItem;
use Filament\Panel;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;
    protected static ?string $slug = 'blog/categories';
    
    protected static ?string $navigationGroup = 'Blog';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';

 

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255)
                ->live(onBlur:true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),  

                Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->disabled()
                ->dehydrated(),
            
                Forms\Components\MarkdownEditor::make('description')
                ->columnSpan('full'),    
                Forms\Components\Toggle::make('visible')
                ->label('Visible to customers.')
                ->default(true),    
            ]);
    }

    public function panel(Panel $panel): Panel
    {
        return $panel->breadcrumbs(false);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->headerActions([
            // // ...
            // Tables\Actions\Action::make('Import')
            // ])
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->sortable()->searchable()
                ,
                // Tables\Columns\TextColumn::make('description'),
                Tables\Columns\IconColumn::make('visible')
                    ->boolean()
                    ->label('Visibility'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Last updated')
                    ->dateTime(),
            ])
            ->filters([
                // Filter::make('search')
                // ->query(function (Builder $query, $data) {
                //     $query->where('name', 'like', '%' . $data['search'] . '%');
                // })
                // ->form([
                //     ComponentsTextInput::make('search')->label('Search Category')
                // ]),
            ])
            ->actions([
               Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('description'),
                IconEntry::make('is_visible')
                    ->label('Visibility'),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ])
            ->columns(1)
            ->inlineLabel();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageCategories::route('/'),
        ];
    }
    // public static function getBreadcrumbs(): array
    // {
    // return [ ];
    // }
}
