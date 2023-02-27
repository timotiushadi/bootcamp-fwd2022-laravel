<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Storage;
Use Symfony\Component\HttpFoundation\Response;

// Request
Use App\Http\Requests\Doctor\StoreDoctorRequest;
Use App\Http\Requests\Doctor\UpdateDoctorRequest;

// Use everything here
Use Gate;
Use Auth;

// Models
Use App\Models\Operational\Doctor;
Use App\Models\MasterData\Specialist;

class DoctorController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor = Doctor::orderBy('created_at', 'desc')->get();

        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.index', compact('doctor', 'specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {
        $data = $request->all();

        $doctor = Doctor::create($data);

        alert()->success('Success', 'Your Doctor has been created');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        // Abort if the requested doesn't have permission by user role
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        // Abort if the requested doesn't have permission by user role
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist = Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.edit', compact('doctor', 'specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $data = $request->all();

        $doctor->update($data);

        alert()->success('Success', 'Your Doctor has been updated');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        // Abort if the requested doesn't have permission by user role
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->forceDelete();

        alert()->success('Success', 'Your Doctor has been deleted');
        return back();
    }
}
