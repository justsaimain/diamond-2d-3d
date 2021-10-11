<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

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
                $edit_icon = '<a href="' . route('admin.users.edit', $each->id) . '" class="text-warning mx-2"><i class="far fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="text-danger mx-2 delete-btn" data-id="' . $each->id . '"><i class="fas fa-trash-alt"></i></a>';
                return '<div class="action-icon">' . $info_icon . $edit_icon  . $delete_icon . '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
