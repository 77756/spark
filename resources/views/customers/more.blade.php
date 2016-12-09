@extends('welcome')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header"><h2>Customer</h2></div>
            <div class="table-responsive">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <table ui-jp="dataTable" class="table table-striped">
                        <thead>
                        <!-- headers here -->
                        <tr>
                            <th>Name</th>
                            <th>E-mail Address</th>
                            <th>Phone number</th>
                            <th>Street Address</th>
                            <th>Zip Code</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>KVK</th>
                            <th>BTW</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- foreach loop here -->
                        <tr>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->street . ' ' .  $customer->streetNum }}</td>
                            <td>{{ $customer->zip }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->country }}</td>
                            <td>{{ $customer->kvk }}</td>
                            <td>{{ $customer->btw }}</td>
                            <td>{{ $customer->created_at }}</td>
                            <td>{{ $customer->ending_on }}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="/customers/{{ $customer->id }}/edit">edit
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection