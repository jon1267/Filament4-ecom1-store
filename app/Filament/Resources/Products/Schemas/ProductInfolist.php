<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('sku')
                    ->label('SKU'),
                TextEntry::make('description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('category.name')
                    ->label('Category'),
                TextEntry::make('supplier.name')
                    ->label('Supplier')
                    ->placeholder('-'),
                TextEntry::make('purchase_price')
                    ->money(),
                TextEntry::make('selling_price')
                    ->money(),
                TextEntry::make('current_stock')
                    ->numeric(),
                TextEntry::make('minimum_stock')
                    ->numeric(),
                TextEntry::make('unit'),
                TextEntry::make('barcode')
                    ->placeholder('-'),
                ImageEntry::make('image')
                    ->placeholder('-'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (Product $record): bool => $record->trashed()),
            ]);
    }
}
