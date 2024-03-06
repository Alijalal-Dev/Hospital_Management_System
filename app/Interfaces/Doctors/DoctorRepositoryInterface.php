<?php

namespace App\Interfaces\Doctors;
use Illuminate\Http\Request;

interface DoctorRepositoryInterface
{
    // get Doctor
    public function index();

    // create Doctor
    public function create();

    // store Doctor
    public function store($request);

    // update Doctor
    public function update($request);

    // destroy Doctor
    public function destroy(Request $request);

}
