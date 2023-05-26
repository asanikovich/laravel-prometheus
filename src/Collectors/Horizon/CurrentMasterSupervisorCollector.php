<?php

namespace Spatie\Prometheus\Collectors\Horizon;

use Laravel\Horizon\Contracts\MasterSupervisorRepository;
use Spatie\Prometheus\Collectors\Collector;
use Spatie\Prometheus\Facades\Prometheus;

class CurrentMasterSupervisorCollector implements Collector
{
    public function register(): void
    {
        Prometheus::addGauge('Number of master supervisors')
            ->value(function () {
                $supervisors = app(MasterSupervisorRepository::class)->all();

                return count($supervisors);
            });

    }
}