<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\TwoD;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class TwoDController extends Controller
{

    public function index()
    {
        return view('admin.2D.index');
    }


    public function ssd()
    {
        $numbers = TwoD::query();
        return Datatables::of($numbers)
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('limit', function ($each) {
                return $each->limit != null ? $each->limit :  '-';
            })
            ->editColumn('is_close', function ($each) {
                $badge = '<span class="badge bg-danger">Closed</span>';
                return $each->is_close == 1 ? $badge : '-';
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
            ->rawColumns(['action', 'is_close'])
            ->make(true);
    }
}
