@extends('layouts.app')

@section('content')
@include('components.message')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>

                <div class="card-body">
                    <!-- START FORM -->
 <form action='{{ url('student/'.$data->nim) }}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('student') }}" class="btn btn-secondary">Back</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                {{ $data->nim }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ $data->name }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="major" class="col-sm-2 col-form-label">Major</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='major' value="{{ $data->major }}" id="major">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="major" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Save Data</button></div>
        </div>
    </div>
</form>
@endsection
<!-- END FORM -->
                </div>
            </div>
        </div>
    </div>
</div>




