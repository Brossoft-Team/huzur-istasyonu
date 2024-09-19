<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make("name")
                    ->label("İsim")
                    ->required(),
                TextInput::make("ingredient")
                ->label("İçerikler")
                ->required(),
                Forms\Components\Select::make("category_id")
                    ->label("Kategori")
                    ->options(\App\Models\MenuCategory::all()->pluck('name', 'id'))
                    ->required(),
                TextInput::make("price")
                    ->label("Fiyat")
                    ->numeric()
                    ->minValue(1)
                    ->required(),
                FileUpload::make('image')
                    ->label("Resim")
                    ->image()
                    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
               ImageColumn::make('image')
                   ->label('Resim'),
               TextColumn::make('name')
                    ->label('İsim')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('ingredient')
                    ->label('İçerikler')
                    ->limit(40)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->getStateUsing(fn($record) => $record->price . ' ₺')
                    ->label('Fiyat')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
