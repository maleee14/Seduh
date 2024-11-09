<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BookTable;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index');
    }

    public function data()
    {
        $bookings = BookTable::orderBy('id', 'desc')->get();

        return datatables()
            ->of($bookings)
            ->addIndexColumn()
            ->addColumn('name', function ($bookings) {
                return $bookings->first_name . " " . $bookings->last_name;
            })
            ->addColumn('action', function ($bookings) {
                return '
                <div style="display: flex; justify-content: center;">
                    <form method="POST" action="' . route('bookings.destroy', $bookings->id) . '" style="display: inline;">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id)
    {
        BookTable::find($id)->delete();

        return redirect()->route('bookings.index');
    }
}
