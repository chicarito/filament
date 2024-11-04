<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;
    protected static ?string $navigationGroup = 'List';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Daftar Murid';
    protected static ?string $label = 'Murid';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('nis')
                            ->unique(ignoreRecord: true)
                            ->nullable()->numeric(),
                        TextInput::make('name')
                            ->label('Nama Murid')
                            ->required()
                            ->autocomplete(false),
                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options([
                                'Laki-laki' => 'Laki-laki',
                                'Perempuan' => 'Perempuan',
                            ])->required(),
                        DatePicker::make('birthday')
                            ->label('Tanggal Lahir'),
                        Select::make('religion')
                            ->label('Agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Katholik' => 'Katholik',
                                'Protestan' => 'Protestan',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Khonghucu' => 'Khonghucu',
                            ])
                            ->required(),
                        TextInput::make('contact')
                            ->label('Nomor Telepon')
                            ->numeric()
                            ->autocomplete(false),
                        FileUpload::make('profile')
                            ->directory('profile_murid')
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis'),
                TextColumn::make('name'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
