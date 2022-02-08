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
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
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
                            <i class="bi bi-check2-circle success"></i> <h5>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5> <h5> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check2-circle mr-3" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                              </svg> {!! Session::get('success') !!}</h5>
                        </div>
                      </div>
                    </div>
                @endif

                <div class="form-group">
                    <input type="file" name="file" placeholder="Choose file" >
                </div>
                {{-- <input type="file" name="file" class="form-control col"> --}}
                <br>
                <button class="btn btn-success mr-2">  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cloud-arrow-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"/>
                    <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                  </svg> Importar Dados</button>
                  <form action="{{ route('cria_arquivo') }}" method="POST" >
                    <button class="btn btn-success ">  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-filetype-txt" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-2v-1h2a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.928 15.849v-3.337h1.136v-.662H0v.662h1.134v3.337h.794Zm4.689-3.999h-.894L4.9 13.289h-.035l-.832-1.439h-.932l1.228 1.983-1.24 2.016h.862l.853-1.415h.035l.85 1.415h.907l-1.253-1.992 1.274-2.007Zm1.93.662v3.337h-.794v-3.337H6.619v-.662h3.064v.662H8.546Z"/>
                      </svg> Criar Arquivo txt </button>
                  </form>
        </form>
        </div>
    </div>
</div>
</body>

</html>
