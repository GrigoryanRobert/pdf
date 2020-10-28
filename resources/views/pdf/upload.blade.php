@extends('layouts.main')

@section('content')

    <main id="main">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="" enctype="multipart/form-data">
            @csrf
            <h2>Upload pdf file</h2>
            <div class="file-field">
                <div class="btn btn-sm float-left">
                    <h2>Choose file</h2>
                    <input type="file" name="pdf">
                </div>
            </div> <br/><br/><br/><br/><br/>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
        <!-- #Upload -->

    </main>

@endsection
