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
                $csrfField = csrf_field();
                $methodField = method_field("DELETE");

                $confirmButton = '
                    <form method="POST" action="' . route('status.confirmed', $bookings->id) . '" style="display: inline;">
                        ' . $csrfField . '
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="fa fa-check"></i> Confirm
                        </button>
                    </form>';

                $completeButton = '
                    <form method="POST" action="' . route('status.completed', $bookings->id) . '" style="display: inline;">
                        ' . $csrfField . '
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-check"></i> Complete
                        </button>
                    </form>';

                $deleteButton = '
                    <form method="POST" action="' . route('bookings.destroy', $bookings->id) . '" style="display: inline;">
                        ' . $csrfField . $methodField . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>';

                return '<div style="display: flex; justify-content: center;">' .
                    ($bookings->status == "pending" ? $confirmButton : ($bookings->status == "confirmed" ? $completeButton : $deleteButton)) .
                    '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id)
    {
        BookTable::find($id)->delete();

        session()->flash('delete', 'Data Berhasil Dihapus');
        return redirect()->route('bookings.index');
    }

    public function confirmed($id)
    {
        $booking = BookTable::find($id);
        $booking->update([
            'status' => 'confirmed'
        ]);

        session()->flash('success', 'Berhasil Proses Data');
        return redirect()->route('bookings.index');
    }

    public function completed($id)
    {
        $booking = BookTable::find($id);
        $booking->update([
            'status' => 'completed'
        ]);

        session()->flash('success', 'Berhasil Proses Data');
        return redirect()->route('bookings.index');
    }
}
