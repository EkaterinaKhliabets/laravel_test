<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\User\FilterRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //public function index(Request $request)
    public function index(FilterRequest $request)
    {
        if ($request->not_valid == '1'){
            $users = User::paginate(3);
        }
        else {
            $users = User::not_valid()->paginate(3); //отбираем только тех пользователей, которые сейчас работают
        }

        return view('users.index', ['users'=>$users, 'not_valid' => $request->not_valid]);

       /* $data = $request->validated();
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);

        //$users = User::filter($filter)->paginate(3);

        //dd($request->not_valid );

        if ($request->not_valid == '1'){
            //$users = User::paginate(3);
            $users = User::all();
        }
        else{
            //$users = User::filter($filter)->paginate(3);
            $users = User::filter($filter)->get();
        }

        return view('users.index', ['users'=>$users, 'not_valid' => $request->not_valid]);*/
    }

   /* public function search(Request $request)
    {

        // echo ($request->not_valid . ' search'); die;
        if ($request->not_valid === '1') {
            $users = User::paginate(3);
        } else {
            $users = User::not_valid()->paginate(3); //отбираем только тех пользователей, которые сейчас работают
        }

        return view('users.index', ['users' => $users]);
    }*/

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        User::create($request->validated() + ['organization_id' => Organization::first()->id]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
