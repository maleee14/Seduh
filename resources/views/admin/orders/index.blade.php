@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-inline">Orders</h5>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Costumer</th>
                                    <th scope="col">Address</th>
                                    <th scope="col" width="15%">Phone</th>
                                    <th scope="col" width="15%">Total Price</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            let table = new DataTable('.table', {
                processing: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('orders.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'costumer'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'grand_total'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        sortable: false
                    }
                ]
            });
        </script>
    @endpush
@endsection
