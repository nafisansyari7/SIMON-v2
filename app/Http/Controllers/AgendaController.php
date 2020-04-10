<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupProject;
use App\Lecturer;
use App\GroupProjectSchedule;
use App\GroupProjectExaminer;
use App\GroupProjectSupervisor;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seminar = GroupProject::with(['Agency', 'GroupProjectSchedule', 'InternshipStudents' => function ($abc) {
            $abc->with('User');
        }])->where('is_verified', '3')->get();
        // dd($seminar);
        return view('college_student.seminar', compact('seminar'));
    }
    public function get()
    {
        $verified = GroupProject::with(['Agency', 'GroupProjectSchedule', 'GroupProjectSupervisor' => function ($ccd) {
            $ccd->with('Lecturer');
        }, 'InternshipStudents' => function ($abc) {
            $abc->with('User');
        }])->where('is_verified', '3')->get();
        return response()->json(['data' => $verified]);
    }
    public function detailDaftar($id)
    {
        $Anggota = GroupProject::with(['Agency', 'InternshipStudents' => function ($abc) {
            $abc->with(['Jobdescs', 'File']);
        }])->find($id);
        $fck = GroupProjectExaminer::with('Lecturer')->where('group_project_id', $Anggota->id)->get();
        $supervisor = GroupProjectSupervisor::with('Lecturer')->where('group_project_id', $Anggota->id)->first();
        return response()->json(['data' => $Anggota, 'fck' => $fck, 'supervisor' => $supervisor]);
    }
    public function hadiriSeminar($id)
    {
        $Anggota = GroupProject::with(['Agency', 'InternshipStudents' => function ($abc) {
            $abc->with(['Jobdescs', 'File']);
        }])->find($id);
        $fck = GroupProjectExaminer::with('Lecturer')->where('group_project_id', $Anggota->id)->get();
        $supervisor = GroupProjectSupervisor::with('Lecturer')->where('group_project_id', $Anggota->id)->first();
        return response()->json(['data' => $Anggota, 'fck' => $fck, 'supervisor' => $supervisor]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
