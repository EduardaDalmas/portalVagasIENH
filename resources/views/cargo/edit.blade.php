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
                            <h4>  {{ __('Editar cargo') }}</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cargo.update', $cargo->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-2">
                            <label for="nome">{{ __('Nome') }}</label>
                            <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ $cargo->nome }}" required autocomplete="nome" autofocus>

                            @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group mb-2">
                            <label for="descricao">{{ __('Descrição') }}</label>
                            <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{ $cargo->descricao }}" required autocomplete="descricao" autofocus>

                            @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group mb-2">
                            <label for="responsabilidades">{{ __('Responsabilidades') }}</label>
                            <input id="responsabilidades" type="text" class="form-control @error('responsabilidades') is-invalid @enderror" name="responsabilidades" value="{{ $cargo->responsabilidades }}" required autocomplete="responsabilidades" autofocus>

                            @error('responsabilidades')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <label for="area">Selecione a Área:</label>
                        <select name="area_id" id="area" class="form-control" required>
                            <option value="">Escolha uma área</option>
                            @foreach($areas as $area)
                                <option value="{{ $area->id }}" {{ $cargo->area_id == $area->id ? 'selected' : '' }}>
                                    {{ $area->nome }}
                                </option>
                            @endforeach
                        </select>

                        

                        <div class="form-group mb-2">
                            <center>
                                <a type="button" href="{{route('cargo.index')}}" class="btn btn-secondary">
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