<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use Yajra\Datatables\Datatables;
use App\Http\Requests\UpdateUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact($user));
    }

    public function store(StoreUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->profile_picture = "https://ui-avatars.com/api/?name=" . $request->name;
        $user->refer_code = $this->getReferCode();
        $user->invited_by = 'admin';
        $user->save();

        return redirect()->route('admin.users.index')->with('create', 'User is successfully created.');
    }

    public function update($id, UpdateUser $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->save();

        return redirect()->route('admin.users.index')->with('update', 'User is successfully updated.');
    }

    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return 'success';
    }

    public function ssd()
    {
        $users = User::query();
        return Datatables::of($users)
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $delete_icon = '';
                $info_icon = '';
                $info_icon = '<a href="' . route('admin.users.show', $each->id) . '" class="text-info mx-2"><i class="far fa-eye"></i></a>';
                $edit_icon = '<a href="#" class="text-warning mx-2 edit-btn" data-id="' . $each->id . ' "data-name="' . $each->name . '"data-phone="' . $each->phone . '"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger mx-2 delete-btn" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $info_icon . $edit_icon  . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getReferCode()
    {
        $words = preg_split('//', 'abcdefghijklmnopqrstuvwxyz0123456789', -1);
        shuffle($words);
        $code = '';
        foreach ($words as $word) {
            if (strlen($code) < 5) {
                $code .= $word;
            }
        }

        if (User::where('refer_code', $code)->first() == null) {
            return $code;
        } else {
            $words = preg_split('//', 'abcdefghijklmnopqrstuvwxyz0123456789', -1);
            shuffle($words);
            $code = '';
            foreach ($words as $word) {
                if (strlen($code) < 5) {
                    $code .= $word;
                }
            }
            return $code;
        }
    }
}
