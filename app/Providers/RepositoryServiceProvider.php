<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Interfaces\Services\SingleServiceRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
