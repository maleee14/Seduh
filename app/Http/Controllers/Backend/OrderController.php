<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index');
    }

    public function data()
    {
        $order = Order::orderBy('id', 'desc')->get();

        return datatables()
            ->of($order)
            ->addIndexColumn()
            ->addColumn('costumer', function ($order) {
                return $order->first_name . " " . $order->last_name;
            })
            ->addColumn('address', function ($order) {
                return $order->street_address . ", " . $order->city . ", " . $order->state . ", " . $order->zip_code;
            })
            ->addColumn('grand_total', function ($order) {
                return format_uang($order->grand_total * 15849);
            })
            ->addColumn('action', function ($order) {
                $csrfField = csrf_field();
                $methodField = method_field("DELETE");

                $deliverButton = '
                    <form method="POST" action="' . route('status.delivered', $order->id) . '" style="display: inline;">
                        ' . $csrfField . '
                        <button type="submit" class="btn btn-sm btn-info">
                            <i class="fa fa-check"></i> Deliver
                        </button>
                    </form>';

                $doneButton = '
                    <form method="POST" action="' . route('status.success', $order->id) . '" style="display: inline;">
                        ' . $csrfField . '
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="fa fa-check"></i> Completed
                        </button>
                    </form>';

                $deleteButton = '
                    <form method="POST" action="' . route('orders.destroy', $order->id) . '" style="display: inline;">
                        ' . $csrfField . $methodField . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>';

                return '<div style="display: flex; justify-content: center;">' .
                    ($order->status == "processing" ? $deliverButton : ($order->status == "delivered" ? $doneButton : $deleteButton)) .
                    '</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        session()->flash('delete', 'Data Berhasil Dihapus');
        return redirect()->route('orders.index');
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'delivered'
        ]);

        session()->flash('success', 'Berhasil Proses Data');
        return redirect()->route('orders.index');
    }

    public function success($id)
    {
        $order = Order::find($id);
        $order->update([
            'status' => 'success'
        ]);

        session()->flash('success', 'Berhasil Proses Data');
        return redirect()->route('orders.index');
    }
}
