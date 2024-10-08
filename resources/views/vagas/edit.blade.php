@extends('layouts.app')
@extends('general')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row mb-3">
                        <div class="col-md-9">
                            <h4>  {{ __('Editar vaga') }}</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('vaga.update', $vaga->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="titulo">{{ __('Titulo') }}</label>
                            <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ $vaga->titulo }}" required autocomplete="titulo" autofocus>

                            @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group mb-2">
                            <label for="unidade">{{ __('Unidade') }}</label>
                            
                            <select class="form-select form-select-md mb-3" aria-label="Large select example" id="unidade" type="unidade" class="form-control @error('unidade') is-invalid @enderror" name="unidade" value="{{ old('unidade') }}" required autocomplete="unidade">
                            @foreach($unidades_negocio as $unidade)
                                <option value="{{$unidade->id}}">{{$unidade->descricao}}</option>
                            @endforeach
                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group mb-2 mt-3">
                        <!-- Outros campos da pergunta -->
                        <label for="funcoes">Vincular vaga à função:</label>
                        <a href="#" data-toggle="collapse" data-target="#funcoes-collapse">Mostrar funções</a>
                            <div id="funcoes-collapse" class="collapse">
                                <div class="list-group">
                                    @foreach ($funcoes as $funcao)
                                        <label class="list-group-item">
                                            <input type="checkbox" name="funcoes[]" value="{{ $funcao->id }}" class="form-check-input" {{isset($vagaFuncoes) && in_array($funcao->id, $vagaFuncoes) ? 'checked' : '' }} >
                                            {{ $funcao->nome }}
                                        </label>
                                @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-2">
                            <label for="status">{{ __('Status') }}</label>
                            
                            <select class="form-select form-select-md mb-3" aria-label="Large select example" id="status" name="status" required autocomplete="status">
                                <option value="Aberta" @if(old('status', $vaga->status) == 'Aberta') selected @endif>Aberta</option>
                                <option value="Fechada" @if(old('status', $vaga->status) == 'Fechada') selected @endif>Fechada</option>
                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group mb-2">
                            <center>
                                <a type="button" href="{{route('vaga.index')}}" class="btn btn-secondary">
                                    {{ __('Voltar') }}
                                </a>
                                <button type="submit" class="btn btn-principal">
                                    {{ __('Salvar') }}
                                </button>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
