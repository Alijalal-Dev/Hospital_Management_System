<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Sections\SectionRepository;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Services\SingleServiceRepository;
use App\Interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\insurances\insuranceRepository;
use App\Interfaces\insurances\insuranceRepositoryInterface;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Repository\Patients\PatientRepository;
use App\Interfaces\Patients\PatientRepositoryInterface;
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
        $this->app->bind(insuranceRepositoryInterface::class, insuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
