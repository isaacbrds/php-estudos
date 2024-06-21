@extends('layout')

@section('titulo_header_html')
    Página principal
@endsection

@section('content')
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Lista de clientes</div>
        </div>
        <a href="/clientes/create" class="btn btn-primary">Novo cliente</a>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <div class="text-center">
                    <h1>Clientes</h1>

                    {{-- Mensagem de sucesso --}}
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Mensagem de erro --}}
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?= $cliente->id ?></td>
                        <td><?= htmlspecialchars($cliente->nome) ?></td>
                        <td><?= htmlspecialchars($cliente->telefone) ?></td>
                        <td><?= htmlspecialchars($cliente->email) ?></td>
                        <td><?= htmlspecialchars($cliente->endereco) ?></td>
                        <td style="width: 250px">
                            <!-- Botões de ação -->
                            <a href="/clientes/<?= $cliente->id ?>" class="btn btn-primary btn-sm">Mostrar</a>
                            <a href="/clientes/<?= $cliente->id ?>/edit" class="btn btn-warning btn-sm">Editar</a>
                            <form action="/clientes/<?= $cliente->id ?>" onsubmit="return confirm('Confirma?')" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        {{ $clientes->links() }}

    </section>
    @endsection