@extends('customers.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="col-8 pull-left">
                <h2>Daftar Nama Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($customer as $customers)

        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $customers->name }}</td>
            <td>{{ $customers->phone_number }}</td>
            <td>{{ $customers->email }}</td>
            <td>{{ $customers->gender }}</td>
            <td>
                <form action="{{ route('customers.destroy',$customers->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('customers.show',$customers->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customers->id) }}">Edit</a>
                    @csrf

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>

        @endforeach

    </table>

    {!! $customer->links() !!}

@endsection

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>