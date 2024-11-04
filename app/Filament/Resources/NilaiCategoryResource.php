<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiCategoryResource\Pages;
use App\Filament\Resources\NilaiCategoryResource\RelationManagers;
use App\Models\NilaiCategory;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class NilaiCategoryResource extends Resource
{
    protected static ?string $model = NilaiCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Kategori Nilai';
  
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->readOnly()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('slug'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNilaiCategories::route('/'),
        ];
    }
}
