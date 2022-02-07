<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="card bg-light mt-5">
        <div class="card-header">
            <strong> <h4>Importar Dados</h4></strong>
        </div>
        <div class="card-body">
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ol>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>

                        @endforeach
                    </ol>

                </div>
                @endif

                @if (Session::has('success'))
                    <div class="row">
                      <div class="col-md-12 col-md-offset-1">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <i class="fas fa-check-circle"></i> <h5>{!! Session::get('success') !!}</h5>
                        </div>
                      </div>
                    </div>
                @endif

                <div class="form-group">
                    <input type="file" name="file" placeholder="Choose file" >
                </div>
                {{-- <input type="file" name="file" class="form-control col"> --}}
                <br>
                <button class="btn btn-success ">Importar Dados</button>
        </form>
        </div>
    </div>
</div>
</body>

</html>
