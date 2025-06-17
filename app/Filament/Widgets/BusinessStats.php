<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BusinessStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New Subscriptions', '192.1k')
            ->icon('heroicon-o-user-plus')
            ->description('30 hari terakhir') 
            ->color('success'),



            Stat::make('Monthly Recurring Revenue', '21%')
            ->icon('heroicon-o-currency-dollar'),

            Stat::make('Reactivated Subscriptions', '3:12')
            ->icon('heroicon-o-arrow-path'),

            Stat::make('Total Active Subscriptions', '3:12')
            ->icon('heroicon-o-arrow-trending-up'),
            
        ];
    }
}
