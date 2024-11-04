<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Filament\Resources\TeacherResource\RelationManagers\ClassroomRelationManager;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;
    protected static ?string $navigationGroup = 'List';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Daftar Guru';
    protected static ?string $label = 'Daftar Guru';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nip')->unique(ignoreRecord: true)->numeric()->autocomplete(false),
                        TextInput::make('name')->label('Nama Guru')->required()->autocomplete(false),
                        Textarea::make('address')->label('Alamat'),
                        FileUpload::make('profile')->required()->directory('profile_guru'),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nip'),
                TextColumn::make('name')->label('Nama Guru'),
                TextColumn::make('address')->label('Alamat'),
                ImageColumn::make('profile'),
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

    public static function getRelations(): array
    {
        return [
            ClassroomRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
