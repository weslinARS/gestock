<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Symfony\Contracts\Service\Attribute\Required;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               TextInput::make('name')->label('nombre')->required(true),
               TextInput::make('last_name')->label('apellido')->required(true),
               TextInput::make('email')->label('correo')->email()->required(condition: true),
               TextInput::make('password')->label('contraseña')->password()->required(true),
               Forms\Components\Select::make('role')->optionsLimit(1)->options([
                "admin" => "Administrador",
                "seller" => "Vendedor",
               ])->label('rol')->required(true),
               TextInput::make('phone_number')->label('telefono')->placeholder('Ejemplo: 1234567890'),
               DatePicker::make('day_of_birth')->label('fecha de nacimiento')->required(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('profile.name')->label('nombre')->searchable(),
                TextColumn::make('profile.last_name')->label('apellido'),
                TextColumn::make('profile.email')->label('correo')->sortable()->searchable(),
                TextColumn::make('profile.role')->label('rol'),
                TextColumn::make('profile.phone_number')->label('telefono'),
            ])
            ->filters([
                //
                SelectFilter::make('profiles.role')->optionsLimit(1)->options([
                    'admin'=> 'Administrador',
                    'seller' => 'Vendedor',
                    ])->label('Filtrar por rol'),
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
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}