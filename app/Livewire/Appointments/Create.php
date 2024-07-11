<?php

namespace App\Livewire\Appointments;

use App\Models\Section;
use App\Models\Appointment;
use App\Models\Doctor;
use Livewire\Component;

class Create extends Component
{
    public $sections;
    public $doctors;
    public $doctor;
    public $section_id;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $message = false;

    public function mount()
    {
        // Fetch sections with translations
        $this->sections = Section::get();
        $this->doctors=collect();
    }

    public function render()
    {
        return view('livewire.appointments.create', [
            'sections' => Section::get()
        ]);
    }

    public function getDoctor(){
        $this->doctors = Doctor::where('section_id',$this->section_id)->get();
        //dd($this->doctors);

    }


    public function store()
    {
        $this->validate([
            'doctor' => 'required|exists:doctors,id',
            'section_id' => 'required|exists:sections,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'notes' => 'nullable|string|max:1000',
        ]);

        $appointment = new Appointment();
        $appointment->doctor_id = $this->doctor;
        $appointment->section_id = $this->section_id;
        $appointment->name = $this->name;
        $appointment->email = $this->email;
        $appointment->phone = $this->phone;
        $appointment->notes = $this->notes;
        $appointment->save();

        $this->message = true;
        $this->reset('section_id', 'doctor', 'name', 'email', 'phone', 'notes');
        $this->doctors=[];
    }
}
