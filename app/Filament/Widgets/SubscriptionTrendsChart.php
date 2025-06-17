<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class SubscriptionTrendsChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'Subscription Trends',
                    'data' => [0, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Nov 1'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
