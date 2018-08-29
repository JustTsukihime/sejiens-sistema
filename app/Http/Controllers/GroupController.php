<?php

namespace App\Http\Controllers;

use App\Group;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::with('members')->get();
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userList = User::all()->pluck('name', 'id');
        return view('group.create', compact('userList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:groups,name',
            'leader_id' => 'required|exists:users,id',
        ]);

        $group = Group::create($request->only(['name']));
        $group->leader()->associate($request->leader_id)->save();

        return redirect()->route('group.show', $group);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return view('group.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $userList = User::all()->pluck('name', 'id');

        return view('group.edit', compact('group', 'userList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => ['required', Rule::unique('groups')->ignore($group->id)],
            'leader_id' => 'required|exists:users,id',
        ]);

        $group->update($request->only(['name']));
        $group->leader()->associate($request->leader_id)->save();

        return redirect()->route('group.show', $group);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }

    public function addMember(Request $request, Group $group)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
        ]);

        $group->members()->attach($request->student_id);
        return back();
    }

    public function removeMember(Request $request, Group $group)
    {
        $this->validate($request, [
            'student_id' => 'required|exists:students,id',
        ]);

        $group->members()->detach($request->student_id);
        return back();
    }
}
