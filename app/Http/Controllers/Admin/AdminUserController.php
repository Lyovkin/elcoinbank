<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminUserController
 * @package App\Http\Controllers\Admin
 */
class AdminUserController extends Controller
{
    public function __construct(Auth $auth)
    {
        $this->middleware('admin');
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'desc');

        if ($request->input('id')) {
            $users = $users->where('id', '=', $request->input('id'));
        }

        if ($request->input('email')) {
            $users = $users->where('email', 'LIKE', '%'.$request->input('email').'%');
        }

        if ($request->input('user_name')) {
            $users = $users->where('name', 'LIKE', '%'.$request->input('user_name').'%');
        }

        $users = $users->paginate(10);

        return view('admin.user.index', [
            'users' => $users,
            'f_id' => $request->input('id'),
            'f_email' => $request->input('email'),
            'f_user_name' => $request->input('user_name'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::orderBy('id', 'asc')->get();

        return view('admin.user.edit', ['user' => $user, 'roles'=> $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param Requests\UserRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Request $request)
    {
        $data = $request->all();

        // If no one checkbox was checked we need to set 'roleCheck' as empty array to avoid error
        if (!array_key_exists('roleCheck', $data)) $data['roleCheck'] = [];

        if ($user->update($data)) {
            $user->roles()->sync($data['roleCheck']);
           // \ProfileService::updateProfile($request, $user->profile);
        }
        \Session::flash('message', 'Пользователь обновлен');
        //$page = $request->page;
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function block(User $user)
    {
       // dd($user);
        $user->blocked = \Illuminate\Support\Facades\Request::input('blocked');
        $user->save();
        return redirect()->back();
    }
}
