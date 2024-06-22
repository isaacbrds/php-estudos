@extends('layout')

@section('titulo_header_html')
    Detalhe de Cliente
@endsection

@section('content')
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Detalhes do Cliente: {{ $cliente->nome }}</h2>
            <a href="/clientes/" class="btn btn-danger mb-3">Voltar</a>
        </div>
    <form id="contactForm" method="post" action="/clientes">
    <div class="row align-items-stretch mb-5">
        @csrf
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" id="nome" type="text" placeholder="Digite o nome *" value="{{ $cliente->nome ?? '' }}" disabled/>
        </div>
        <div class="form-group">
            <input class="form-control" id="email" name="email" type="email" placeholder="Seu Email *" value="{{ $cliente->email ?? '' }}" disabled/>
        </div>
        <div class="form-group mb-md-0">
            <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu telefone *" value="{{ $cliente->telefone ?? '' }}" disabled/>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-textarea mb-md-0">
            <textarea class="form-control" id="endereco" name="endereco" placeholder="Seu endereço *" disabled>{{ $cliente->endereco ?? '' }}</textarea>
        </div>
    </div>
    
</section>
@endsection