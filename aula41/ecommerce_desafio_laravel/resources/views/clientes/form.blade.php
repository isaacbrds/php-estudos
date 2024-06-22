<div class="row align-items-stretch mb-5">
    @csrf
    <div class="col-md-6">
        <div class="form-group">
            <input class="form-control" id="nome" name="nome" type="text" placeholder="Digite o nome *" value="{{ $cliente->nome ?? '' }}" />
        </div>
        <div class="form-group">
            <input class="form-control" id="email" name="email" type="email" placeholder="Seu Email *" value="{{ $cliente->email ?? '' }}" />
        </div>
        <div class="form-group mb-md-0">
            <input class="form-control" id="telefone" name="telefone" type="tel" placeholder="Seu telefone *" value="{{ $cliente->telefone ?? '' }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-textarea mb-md-0">
            <textarea class="form-control" id="endereco" name="endereco" placeholder="Seu endereço *">{{ $cliente->endereco ?? '' }}</textarea>
        </div>
    </div>
</div>

{{-- Mensagem de erro --}}
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="text-center">
    <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Enviar</button>
</div>