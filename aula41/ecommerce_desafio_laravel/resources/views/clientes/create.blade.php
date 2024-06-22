@extends('layout')

@section('titulo_header_html')
    Página principal
@endsection

@section('content')

<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Novo Cliente</h2>
            <a href="/clientes/" class="btn btn-danger mb-3">Voltar</a>
        </div>
        <!-- * * * * * * * * * * * * * * *-->
        <!-- * * SB Forms Contact Form * *-->
        <!-- * * * * * * * * * * * * * * *-->
        <!-- This form is pre-integrated with SB Forms.-->
        <!-- To make this form functional, sign up at-->
        <!-- https://startbootstrap.com/solution/contact-forms-->
        <!-- to get an API token!-->
        <form id="contactForm" method="post" action="/clientes">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="nome" name="nome" type="text" placeholder="Digite seu nome *" />
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" name="nome" type="email" placeholder="Digite seu email *"  />
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Digite seu telefone *" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" id="endereco" name="endereco" placeholder="Seu endereço*"></textarea>
                    </div>
                </div>
            </div>
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"> Enviar </button></div>
        </form>
    </div>
</section>
@endsection