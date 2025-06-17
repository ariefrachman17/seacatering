<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class RevenueGrowthChart extends ChartWidget
{
    protected static ?string $heading = 'Revenue Growth';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'data' => [0, 100000],
                ],
            ],
            'labels' => ['Week 1', 'Week 2', 'Week 3', 'Week4', 'Week 5'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
