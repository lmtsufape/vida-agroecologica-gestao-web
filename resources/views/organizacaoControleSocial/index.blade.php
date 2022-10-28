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
                    <h3 class="text-center">Organizações de Controle Social (OCS)</h3>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-primary w-100 pb-1" data-toggle="modal" data-target="#cadastroModal">
                        Cadastrar OCS
                    </button>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="text-center" scope="col">Nome</th>
                    <th class="text-center" scope="col">CNPJ</th>
                    <th class="text-center" scope="col">Representante</th>
                    <th class="text-center" scope="col">Data de Fundação</th>
                    <th class="w-25 text-center" scope="col">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lista_ocs as $ocs)
                    <tr>
                        <td class="text-center">{{$ocs->nome}}</td>
                        <td class="text-center">{{$ocs->cnpj}}</td>
                        <td class="text-center">{{$ocs->representante}}</td>
                        <td class="text-center">{{$ocs->data_fundacao}}</td>
                        <td class="text-center">
                            <button class="btn btn-group" type="button" data-toggle="modal" data-target="#editModal_{{$ocs->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Organização de Controle Social</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" action="{{route('ocs.store')}}">
                            @csrf
                            <div class="modal-body">
                                @csrf
                                <h6 class="sectionTitle">Informações Gerais</h6>

                                <input type="hidden" name="associacao_id" value="{{$associacao->id}}">
                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-6">
                                        <label for="nome">Nome:</label>
                                        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome" value="{{ old('nome') }}" required autocomplete="nome"
                                               autofocus>
                                        @error('nome')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="cnpj">CNPJ:</label>
                                        <input class="form-control @error('cnpj') is-invalid @enderror" id="cnpj" name="cnpj" value="{{ old('cnpj') }}" required autocomplete="cnpj"
                                               autofocus>
                                        @error('cnpj')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-6">
                                        <label for="representante">Representante:</label>
                                        <input class="form-control @error('representante') is-invalid @enderror" id="representante" type="text" name="representante" value="{{ old('representante') }}" required autocomplete="representante"
                                               autofocus>
                                        @error('representante')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="data_fundacao">Data de Fundação:</label>
                                        <input type="date" class="form-control @error('data_fundacao') is-invalid @enderror" id="data_fundacao" name="data_fundacao" value="{{ old('data_fundacao') }}" required autocomplete="data_fundacao"
                                               autofocus>
                                        @error('data_fundacao')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
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

                                <h6 class="sectionTitle">Endereço</h6>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-4">
                                        <label for="pais">Pais:</label>
                                        <input class="form-control @error('pais') is-invalid @enderror" id="pais" type="text" name="pais" value="{{ old('pais') }}" required autocomplete="pais"
                                               autofocus>
                                        @error('pais')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="uf">Estado:</label>
                                        <input class="form-control @error('uf') is-invalid @enderror" id="uf" type="text" name="uf" value="{{ old('uf') }}" required
                                               autocomplete="uf"
                                               autofocus>
                                        @error('uf')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-4">
                                        <label for="cidade">Cidade:</label>
                                        <input class="form-control @error('cidade') is-invalid @enderror" id="cidade" type="text" name="cidade" value="{{ old('cidade') }}" required
                                               autocomplete="cidade"
                                               autofocus>
                                        @error('cidade')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-6">
                                        <label for="cep">CEP:</label>
                                        <input class="form-control @error('cep') is-invalid @enderror" id="cep" type="text" name="cep" value="{{ old('cep') }}" required autocomplete="cep"
                                               autofocus>
                                        @error('cep')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="bairro">Bairro:</label>
                                        <input class="form-control @error('bairro') is-invalid @enderror" id="bairro" type="text" name="bairro" value="{{ old('bairro') }}" required
                                               autocomplete="bairro"
                                               autofocus>
                                        @error('bairro')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row justify-content-center mt-2">
                                    <div class="col-sm-6">
                                        <label for="rua">Rua:</label>
                                        <input class="form-control @error('rua') is-invalid @enderror" id="rua" type="text" name="rua" value="{{ old('rua') }}" required autocomplete="rua"
                                               autofocus>
                                        @error('rua')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="numero">Número:</label>
                                        <input class="form-control @error('numero') is-invalid @enderror" id="numero" type="text" name="numero" value="{{ old('numero') }}" required
                                               autocomplete="numero"
                                               autofocus>
                                        @error('numero')
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
            {{--
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
                                        <form method="POST" action="{{route('associacao.update')}}">
                                            @csrf
                                            <div class="modal-body">
                                                @csrf
                                                <h6 class="sectionTitle">Informações Gerais</h6>

                                                <input type="hidden" name="associacao_id" value="{{$associacao->id}}">
                                                <div class="row justify-content-center mt-2">
                                                    <div class="col-sm-4">
                                                        <label for="nome">Nome:</label>
                                                        <input class="form-control @error('nome') is-invalid @enderror" id="nome" type="text" name="nome" value="{{$associacao->nome}}" required autocomplete="nome"
                                                               autofocus>
                                                        @error('nome')
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="codigo">Código:</label>
                                                        <input class="form-control @error('codigo') is-invalid @enderror" id="codigo" name="codigo" value="{{$associacao->codigo}}" required autocomplete="codigo"
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
                                                        <input class="form-control @error('telefone') is-invalid @enderror" id="telefone" name="telefone" value="{{$associacao->contato->telefone}}" required autocomplete="telefone"
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
                                                <button type="submit" class="btn btn-success">Editar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        --}}
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
                "zeroRecords": "Nenhuma OCS Criada.",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo"
                }
            },
            "order": [0, 1, 2,3],
            "columnDefs": [{
                "targets": [4],
                "orderable": false
            }]
        });
    </script>
@endsection
