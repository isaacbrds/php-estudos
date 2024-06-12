<script>
    export default{
        name: "Menu",
        data(){
            return {
                logado: false
            }
        },
        methods: {
            sair(){
                if(confirm('Confirma?')){
                    localStorage.clear();
                    this.$router.push('/login');
                }
            }
        },
        created(){
            this.logado = localStorage.getItem('token') != null;
        }
    }
</script>

<template>
    <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Desafio de PHP com Slim</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item">
                                <router-link class="nav-link" to="/">Home</router-link>
                            </li>
                            <li v-if="!logado">
                                <router-link class="nav-link" to="/login">Login</router-link>
                            </li>
                            <li v-if="logado" class="nav-item">
                                <router-link class="nav-link" to="/clientes">Clientes</router-link>
                            </li>
                            <li v-if="logado" class="nav-item">
                                <router-link class="nav-link" to="/pedidos">Pedidos</router-link>
                            </li>
                            <li v-if="logado" class="nav-item">
                                <a class="nav-link" href="#" @click="sair()">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </main>
</template>
