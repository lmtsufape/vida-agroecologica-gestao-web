@extends('layouts.app')
<style>
    h6{
        margin-top: 10px;
        margin-bottom: 10px;
        font-weight: bolder;
        font-size: 22px;
        color: #1b4b72;
    }
</style>

@section('content')
    <div class="row my-5">
        <div class="col-md-2"></div>
        <div class="col-sm-8 shadow-lg p-3 bg-white rounded" style="min-height: 28rem">
            <div class="row mb-4 borda-bottom">
                <div class="col-md-9">
                    <h3 class="text-center">Associações</h3>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100 pb-1" data-toggle="modal" data-target="#cadastroModal">
                        Cadastrar Associação
                    </button>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">Código</th>
                    <th class="text-center" scope="col">Presidente</th>
                    <th class="w-25 text-center" scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($associacoes as $associacao)
                    <tr>
                        <td class="text-center">{{$associacao->nome}}</td>
                        <td class="text-center">{{$associacao->codigo}}</td>
                        <td class="text-center">{{$associacao->user->nome}}</td>
                        <td class="text-center">
                            <button class="btn btn-group" type="button" data-toggle="modal" data-target="#editModal_{{$associacao->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Associação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{route('associacao.create')}}">
                            @csrf
                            <div class="modal-body">
                                @csrf
                                <h6 class="sectionTitle">Informações Gerais</h6>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-4">
                                        <label for="nome">Nome:</label>
                                        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome" value="{{ old('nome') }}" required autocomplete="nome"
                                               autofocus>
                                        @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="codigo">Código:</label>
                                        <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo"
                                               autofocus>
                                        @error('codigo')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="presidente">{{ __('Presidente:') }}</label>
                                        <select class="form-control" id="presidente_create" name="presidente">
                                            <option selected disabled style="font-weight: bolder">
                                                Selecione um Presidente
                                            </option>
                                            @foreach($presidentes as $presidente)
                                                <option value="{{$presidente->id}}">
                                                    {{$presidente->nome}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <h6 class="sectionTitle">Contato</h6>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-6">
                                        <label for="email">E-mail:</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                               autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="telefone">Telefone:</label>
                                        <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone"
                                               autofocus>
                                        @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Cadastrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @foreach($associacoes as $associacao)
                <div class="modal fade" id="editModal_{{$associacao->id}}" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cadastroModalLabel">Editar Associação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="#">
                                @csrf
                                <div class="modal-body">
                                    @csrf
                                    <h6 class="sectionTitle">Informações Gerais</h6>

                                    <div class="row justify-content-center mt-2">
                                        <div class="col-sm-4">
                                            <label for="nome">Nome:</label>
                                            <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" nome="nome" value="{{$associacao->nome}}" required autocomplete="nome"
                                                   autofocus>
                                            @error('nome')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="codigo">Código:</label>
                                            <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" type="codigo" name="codigo" value="{{$associacao->codigo}}" required autocomplete="codigo"
                                                   autofocus>
                                            @error('codigo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="presidente">{{ __('Presidente:') }}</label>
                                            <select class="form-control" id="presidente_create" name="presidente">
                                                <option selected disabled style="font-weight: bolder">
                                                    Selecione um Presidente
                                                </option>
                                                @foreach($presidentes as $presidente)
                                                    <option value="{{$presidente->id}}" @if($associacao->user->id == $presidente->id) selected @endif>
                                                        {{$presidente->nome}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <br>
                                    <h6 class="sectionTitle">Contato</h6>

                                    <div class="row justify-content-center mt-2">
                                        <div class="col-sm-6">
                                            <label for="email">E-mail:</label>
                                            <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{$associacao->contato->email}}" required autocomplete="email"
                                                   autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <label for="telefone">Telefone:</label>
                                            <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" type="telefone" name="telefone" value="{{$associacao->contato->telefone}}" required autocomplete="telefone"
                                                   autofocus>
                                            @error('telefone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-success">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-2"></div>
    </div>

    <script>
        $('.table').DataTable({
            searching: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "search": "Pesquisar",
                "infoEmpty": "",
                "zeroRecords": "Nenhuma Solicitacao Criada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [0, 1, 2],
            "columnDefs": [{
                "targets": [3],
                "orderable": false
            }]
        });
    </script>
@endsection
