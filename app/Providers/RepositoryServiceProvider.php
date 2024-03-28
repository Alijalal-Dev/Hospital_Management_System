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
use App\Interfaces\Finance\ReceiptRepositoryInterface;
use App\Repository\Finance\ReceiptRepository;
use App\Interfaces\Finance\PaymentRepositoryInterface;
use App\Repository\Finance\PaymentRepository;
use App\Interfaces\doctor_dashboard\InvoicesRepositoryInterface;
use App\Repository\doctor_dashboard\InvoicesRepository;
use App\Repository\doctor_dashboard\DiagnosisRepository;
use App\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use App\Repository\doctor_dashboard\RaysRepository;
use App\Interfaces\doctor_dashboard\RaysRepositoryInterface;
use App\Interfaces\doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Repository\doctor_dashboard\LaboratoriesRepository;
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
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

        // doctor
        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class, DiagnosisRepository::class);
        $this->app->bind(RaysRepositoryInterface::class, RaysRepository::class);
        $this->app->bind(LaboratoriesRepositoryInterface::class, LaboratoriesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
