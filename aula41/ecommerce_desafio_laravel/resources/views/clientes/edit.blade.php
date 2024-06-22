@extends('layout')

@section('titulo_header_html')
    Editar Cliente
@endsection

@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Editar Cliente</h2>
            <a href="/clientes/" class="btn btn-danger mb-3">Voltar</a>
        </div>
        <form id="contactForm" method="post" action="/clientes/<?= $cliente->id ?>">
                <input type="hidden" name="_method" value="PUT">
                @include('clientes.form', ['cliente' => $cliente])
            </form>
    </div>
</section>
@endsection