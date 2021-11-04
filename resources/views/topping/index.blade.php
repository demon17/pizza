@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Topping List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('topping.create') }}"> Create New Topping</a>
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
            <th>Title</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->price }}</td>
                <td>
                    <form action="{{ route('topping.destroy',$value->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('topping.show',$value->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('topping.edit',$value->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
