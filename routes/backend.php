<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\Dashboard\InsuranceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\appointments\AppointmentController;
use App\Http\Controllers\Dashboard\HomeController;




/*
|--------------------------------------------------------------------------
| backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/Dashboard_Admin', [DashboardController::class, 'index']);

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        //################################ dashboard user ##########################################
        Route::get('/dashboard/user', function () {
            return view('Dashboard.User.dashboard');
        })->middleware(['auth'])->name('dashboard.user');
        //################################ end dashboard user #####################################



        //################################ dashboard admin ########################################
        Route::get('/dashboard/admin', function () {
            return view('Dashboard.Admin.dashboard');
        })->middleware(['auth:admin'])->name('dashboard.admin');

        //################################ dashboard doctor ########################################

        Route::get('/dashboard/doctor', function () {
            return view('Dashboard.doctor.dashboard');
        })->middleware(['auth:doctor'])->name('dashboard.doctor');

        //################################ end dashboard doctor #####################################

        //################################ end dashboard admin #####################################
        Route::middleware(['auth:admin'])->group(function () {

            //############################# sections route ##########################################

            Route::resource('Sections', App\Http\Controllers\Dashboard\SectionController::class);

            //############################# end sections route ######################################

            //############################# Doctors route ##########################################

            Route::resource('Doctors', DoctorController::class);
            Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');

            //############################# end Doctors route ######################################

            //############################# SingleService route ##########################################

            Route::resource('Service', SingleServiceController::class);

            //############################# end SingleService route ######################################

            //############################# GroupServices route ##########################################



            Route::view('Add_GroupServices', 'livewire.GroupServices.include_create')->name('Add_GroupServices');

            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/custom/livewire/update', $handle);
            });

            //############################# end GroupServices route ######################################

            //############################# insurance route ##########################################

            Route::resource('insurance', InsuranceController::class);

            //############################# end insurance route ######################################

            //############################# Ambulance route ##########################################

            Route::resource('Ambulance', AmbulanceController::class);

            //############################# end Ambulance route ######################################

            //############################# Patients route ##########################################

            Route::resource('Patients', PatientController::class);

            //############################# end Patients route ######################################

            //############################# single_invoices route ##########################################

            Route::view('single_invoices', 'livewire.single_invoices.index')->name('single_invoices');
            // print single invoice
            Route::view('Print_single_invoices', 'livewire.single_invoices.print')->name('Print_single_invoices');

            //############################# end single_invoices route ######################################

            //############################# Receipt route ##########################################

            Route::resource('Receipt', ReceiptAccountController::class);

            //############################# end Receipt route ######################################

            //############################# Payment route ##########################################

            Route::resource('Payment', PaymentAccountController::class);

            //############################# end Payment route ######################################

            //############################# RayEmployee route ##########################################

            Route::resource('ray_employee', RayEmployeeController::class);

            //############################# end RayEmployee route ######################################


            //############################# laboratorie_employee route ##########################################

            Route::resource('laboratorie_employee', LaboratorieEmployeeController::class);

            //############################# end laboratorie_employee route ######################################


            //############################# single_invoices route ##########################################

            Route::view('group_invoices', 'livewire.Group_invoices.index')->name('group_invoices');

            Route::view('group_Print_single_invoices', 'livewire.Group_invoices.print')->name('group_Print_single_invoices');

            //############################# end single_invoices route ######################################


            //############################# Appointments route ######################################
            Route::get('appointments',[AppointmentController::class,'index'])->name('appointments.index');
            Route::put('appointments/approval/{id}',[AppointmentController::class,'approval'])->name('appointments.approval');
            Route::get('appointments/approval',[AppointmentController::class,'index2'])->name('appointments.index2');
            Route::get('appointments/finished',[AppointmentController::class,'index3'])->name('appointments.index3');
            Route::delete('appointments/destroy/{id}',[AppointmentController::class,'destroy'])->name('appointments.destroy');

            //appointment charts
            Route::get('/dashboard/admin', [HomeController::class, 'index'])->name('dashboard.admin');

        });

        require __DIR__ . '/auth.php';

    }
);

