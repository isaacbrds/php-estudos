@extends('layout')

@section('titulo_header_html')
    Novo Cliente
@endsection

@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Novo Cliente</h2>
            <a href="/clientes/" class="btn btn-danger mb-3">Voltar</a>
        </div>
    <form id="contactForm" method="post" action="/clientes">
        @include('clientes.form')
    </form>
    </div>
</section>
@endsection