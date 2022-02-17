<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>


.titulo {

line-height: 1.2;
font-size: 1.8rem;

}



.titulo::after {
content: '';
display: block;
/* background: #d8d8d8; */
 background: #d8d8d8;
height: 0.4rem;
width: 2.5rem;
border-radius: 0.2rem;
}



</style>

</head>


<body>
    <div class="container mt-5">
        <div class="card bg-light mt-5">
        <div class="card-header titulo ">
            <strong > Criar Arquivo txt</strong>
        </div>
        <div class="card-body">
        <form >
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

                @if (Session::has('message'))
                    <div class="row">
                      <div class="col-md-12 col-md-offset-1">
                        <div class="alert alert-success alert-dismissible">
                            <i class="bi bi-check2-circle success"></i> <h5>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <h5> <h5> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check2-circle mr-3" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                              </svg> {!! Session::get('message') !!}</h5>
                        </div>
                      </div>
                    </div>
                @endif

             <h6 class="mt-2">Relação de lotes</h6>
            <table class="table table-striped col-md-10">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Número do Lote</th>
                    <th scope="col">Data/Hora da Criação</th>

                    <th scope="col" colspan="2" class="text-center">Ações</th>
                  </tr>
                </thead>
                <tbody>

                  <?php  foreach($dados as $dado): ?>

                  <tr >
                    <td>{{ $dado->id}}</td>
                    <td>{{ $dado->lote}}</td>
                    <td>{{ $dado->created_at->format('d/m/Y')}}</td>

                    <td>
                        <a  class="btn btn-success btn-sm" type="button" id="arquivo" href="{{url('arquivo/'.$dado->lote ) }}" >  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-txt" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-2v-1h2a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.928 15.849v-3.337h1.136v-.662H0v.662h1.134v3.337h.794Zm4.689-3.999h-.894L4.9 13.289h-.035l-.832-1.439h-.932l1.228 1.983-1.24 2.016h.862l.853-1.415h.035l.85 1.415h.907l-1.253-1.992 1.274-2.007Zm1.93.662v3.337h-.794v-3.337H6.619v-.662h3.064v.662H8.546Z"/>
                          </svg>  Criar Arquivo </a>
                    </td>
                    <td>
                        {{-- {{$dado->status}} --}}
                        @if ($dado->status == 1)

                        <a class="btn btn-primary btn-sm" id="download"  href="{{ url('download/'.$dado->lote) }}" >  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16 fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                          </svg>  Download </a>

@endif

                    </td>
                  </tr>
                  <?php endforeach;?>

                </tbody>
              </table>


                {{-- <input type="file" name="file" class="form-control col"> --}}
                <br>


                  {{-- <a class="btn btn-success"  href="{{ route('cria_arquivo') }}" >  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-filetype-txt" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-2v-1h2a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.928 15.849v-3.337h1.136v-.662H0v.662h1.134v3.337h.794Zm4.689-3.999h-.894L4.9 13.289h-.035l-.832-1.439h-.932l1.228 1.983-1.24 2.016h.862l.853-1.415h.035l.85 1.415h.907l-1.253-1.992 1.274-2.007Zm1.93.662v3.337h-.794v-3.337H6.619v-.662h3.064v.662H8.546Z"/>
                  </svg>Criar Arquivo </a> --}}
        </form>

        </div>
    </div>
</div>
</body>

<script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>

    <script src="/js/bootstrap.min.js"></script>
    {{-- <script src="{{ mix('/js/app.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

// $("#arquivo").change(function(){
//   $("#download").attr("disabled", false);
// });

$("#arquivo").click( function() {

    $("#download").fadeIn("slow");

    });

</script>
</html>
