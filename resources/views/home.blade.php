@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form action="{{route('import-user')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h1>Upload your files here</h1>
                            <input type="file" name="file">
                            <input type="submit">
                            <a href="{{ route('export-user') }}" class="btn">Export Excel</a>
                            @error('file')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </form>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
