<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Interfaces\Doctors\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $Doctors;

    public function __construct(DoctorRepositoryInterface $Doctors)
    {
        $this->Doctors = $Doctors;
    }


    public function index()
    {
        return $this->Doctors->index();
    }


    public function create()
    {
        return $this->Doctors->create();
    }


    public function store(Request $request)
    {
        return $this->Doctors->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return $this->Doctors->edit($id);
    }


    public function update(Request $request)
    {
        //
        return $this->Doctors->update($request);
    }


    public function destroy(Request $request)
    {
        //
        return $this->Doctors->destroy($request);
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        return $this->Doctors->update_password($request);
    }

    public function update_status(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
        ]);
        return $this->Doctors->update_status($request);
    }
}
