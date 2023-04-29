@extends('layouts.app')

@section('content')
@include('components.message')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Student') }}</div>

                <div class="card-body">
                    <div class="my-3 p-3 bg-body rounded shadow-sm">

                        <!-- ADD BUTTON -->
                        <div class="pb-3">
                            <a href='{{ url('student/create') }}' class="btn btn-primary">+ Add Data</a>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">No</th>
                                    <th class="col-md-3">NIM</th>
                                    <th class="col-md-4">Name</th>
                                    <th class="col-md-2">Major</th>
                                    <th class="col-md-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $data->firstItem()?>
                                @foreach ($data as $item)

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->nim }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->major }}</td>
                                    <td>
                                        <a href='{{ url('student/'.$item->nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                                        <form onsubmit="return confirm('Are you sure to delete this data?')" class="d-inline" action="{{ url('student/'.$item->nim) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START DATA -->



@endsection
<!-- END DATA -->

