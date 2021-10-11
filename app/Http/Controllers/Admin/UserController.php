<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function ssd()
    {
        $users = User::query();
        return Datatables::of($users)
            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edit_icon = '';
                $delete_icon = '';
                $info_icon = '';
                $info_icon = '<a href="' . route('admin.users.edit', $each->id) . '" class="text-info"><i class="far fa-edit"></i></a>';
                $edit_icon = '<a href="' . route('admin.users.edit', $each->id) . '" class="text-warning"><i class="far fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger delete-btn" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $info_icon . $edit_icon  . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
