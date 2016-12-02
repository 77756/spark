@extends('welcome')

@section('content')
    <div class="container">
    <div class="col-md-offset-1 col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">All Companies</div>
        <div class="panel-body">
        @if($user->customers)
            <table class="table table-striped table-responsive sortable">
                <thead>
                <!-- headers here -->
                <tr>
                    <th>ID</th>
                    <th data-defaultsort="asc">Name</th>
                    <th>E-mail address</th>
                    <th>Phone number</th>
                    <th>Country</th>
                </tr>
                </thead>

                <tbody>
                <!-- foreach loop here -->
                @foreach ($user->customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->country }}</td>
                        <td><a class="btn btn-info btn-sm" href="/customers/{{ $customer->id }}/more">more</a></td>
                        <td><a class="btn btn-warning btn-sm" href="/customers/{{ $customer->id }}/edit">edit</a></td>
                        <td><a class="btn btn-danger btn-sm"
                               onclick="var del = window.confirm('Are you sure you want to delete entry {{ $customer->name }}?');
                                       if (del) { document.location.href = '/customers/{{ $customer->id }}/delete'; }">
                                delete
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            No entries
        @endif

        <a href="/customers/add" class="btn btn-primary btn-sm">New customer</a>
    </div>
    </div>
    </div>
    </div>
@endsection
