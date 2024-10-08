@extends('layouts.app')
@extends('general')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <h2 class="text-center mt-5 text-white">{{ __('Vagas') }}</h2>
            <p class="text-center text-white">Envie seu currículo online e venha trabalhar conosco</p>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        @foreach ($vagas as $vaga)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body card-body-home" style="margin: 0 auto">
                    <h5 class="card-title">{{ $vaga->titulo }}</h5>
                    <div class="row">
                        <div class="col-md-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg> -->
                        </div>
                        <div class="col-md-9">
                            <p class="card-text">{{ $vaga->unidade->descricao }}</p>
                        </div>
                    </div>
                    <a href="{{ route('login') }}" class="btn btn-principal mt-3"> Candidate-se</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
