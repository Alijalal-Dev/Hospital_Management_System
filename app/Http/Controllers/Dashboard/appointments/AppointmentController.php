<?php

namespace App\Http\Controllers\Dashboard\appointments;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;
use Twilio\Rest\Client;

class AppointmentController extends Controller
{
    public function index()
    {

        $appointments = Appointment::where('type', 'غير مؤكد')->get();
        return view('Dashboard.appointments.index', compact('appointments'));
    }

    public function index2()
    {

        $appointments = Appointment::where('type', 'مؤكد')->get();
        return view('Dashboard.appointments.index2', compact('appointments'));
    }

    public function index3()
    {

        $appointments = Appointment::where('type', 'منتهي')->get();
        return view('Dashboard.appointments.index3', compact('appointments'));
    }

    public function approval(Request $request, $id)
    {
        $appointment = Appointment::findorFail($id);

        // Format the appointment date for comparison
        $appointment_date = date('Y-m-d', strtotime($request->appointment));
        
        $appointment_count = Appointment::where('doctor_id', $appointment->doctor_id)
            ->whereDate('appointment', $appointment_date)
            ->where('type', 'مؤكد')->count();

        $doctor_info = Doctor::find($appointment->doctor_id);

        //dd($appointment_count,$doctor_info);

        if ($appointment_count >= $doctor_info->number_of_statements) {
            session()->flash('error', "No more appointments available for this day.");
            return back();
        }

        // Check if the date already exists for this doctor
        $existingAppointment = Appointment::where('doctor_id', $appointment->doctor_id)
            ->where('appointment', $request->appointment)
            ->where('type', 'مؤكد')
            ->first();

        if ($existingAppointment) {
            session()->flash('error', "This appointment date is already taken.");
            return back();
        }

        $appointment->update([
            'type' => 'مؤكد',
            'appointment' => $request->appointment
        ]);
        // send email
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name, $appointment->appointment));

        // send message mob
        $receiverNumber = $appointment->phone;
        $message = "عزيزي المريض" . " " . $appointment->name . " " . "تم حجز موعدك بتاريخ " . $appointment->appointment;

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($receiverNumber, [
            'from' => $twilio_number,
            'body' => $message
        ]);
        session()->flash('add');
        return back();
    }
    public function destroy($id)
    {
        Appointment::destroy($id);
        session()->flash('delete');
        return back();
    }
}
