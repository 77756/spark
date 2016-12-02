@extends('welcome')

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header"><h2>Customers</h2></div>
            <div class="table-responsive">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    @if($user->customers)
                        <table class="table table-striped b-t b-b dataTable no-footer">
                            <thead>
                            <!-- headers here -->
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail address</th>
                                <th>Phone number</th>
                                <th>Country</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>thomas</td>
                                <td>thomasfranken3@hotmail.com</td>
                                <td>0643187818</td>
                                <td>nederland</td>
                            </tr>
                            <!-- foreach loop here -->
                            {{--@foreach ($user->customers as $customer)--}}
                            {{--<tr>--}}
                            {{--<td>{{ $customer->id }}</td>--}}
                            {{--<td>{{ $customer->name }}</td>--}}
                            {{--<td>{{ $customer->email }}</td>--}}
                            {{--<td>{{ $customer->phone }}</td>--}}
                            {{--<td>{{ $customer->country }}</td>--}}
                            {{--<td><a class="btn btn-info btn-sm" href="/customers/{{ $customer->id }}/more">more</a></td>--}}
                            {{--<td><a class="btn btn-warning btn-sm" href="/customers/{{ $customer->id }}/edit">edit</a></td>--}}
                            {{--<td><a class="btn btn-danger btn-sm"--}}
                            {{--onclick="var del = window.confirm('Are you sure you want to delete entry {{ $customer->name }}?');--}}
                            {{--if (del) { document.location.href = '/customers/{{ $customer->id }}/delete'; }">--}}
                            {{--delete--}}
                            {{--</a></td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                            </tbody>
                        </table>
                    @else
                        No entries
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
