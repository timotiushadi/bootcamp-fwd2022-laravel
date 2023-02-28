<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use Illuminate\Support\Facades\Storage;
Use Symfony\Component\HttpFoundation\Response;

// Request
Use App\Http\Requests\Specialist\StoreSpecialistRequest;
Use App\Http\Requests\Specialist\UpdateSpecialistRequest;

// Use everything here
Use Gate;
Use Auth;

// Models
Use App\Models\MasterData\Specialist;

class SpecialistController extends Controller
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
        abort_if(Gate::denies('specialist_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist = Specialist::orderBy('created_at', 'desc')->get();

        // dd($specialist);

        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(StoreSpecialistRequest $request)
    {  
        // Get all requests from frontsite
        $data = $request->all();
        
        // Store to database
        $specialist = Specialist::create($data);
        
        alert()->success('Success', 'Your specialist has been created');
        return redirect()->route('pages.backsite.master-data.specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($specialist);

        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialist $specialist)
    {
        abort_if(Gate::denies('specialist_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // dd($specialist);
        
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialistRequest $request, Specialist $specialist)
    {
        // Get all requests from frontsite
        $data = $request->all();
        
        // Store to database
        $specialist->update($data);
        
        alert()->success('Success', 'Your specialist has been updated');
        return redirect()->route('pages.backsite.master-data.specialist.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialist $specialist)
    {
        abort_if(Gate::denies('specilaist_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $specialist->delete();

        alert()->success('Success', 'Your specialist has been deleted');
        return back();
    }
}
