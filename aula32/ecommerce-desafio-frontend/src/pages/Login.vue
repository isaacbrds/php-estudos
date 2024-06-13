<script>
    import { LoginService } from '../services/LoginService';
    import { reativoStorage } from '@/reativo/reativoStorage';
    export default{
        name: 'Login',
        data() {
            return {
            email: '',
            password: '',
            erro: ''
            };
        },
        methods: {
            async login() {
                try{
                    this.erro = '';
                    const token =  await new LoginService().login(this.email, this.password);
                    reativoStorage.set('token', token);
                    this.$router.push('/clientes');
                }catch(e){
                    this.erro = e.message;
                }
                
            },
        },
    }
</script>

<template>


    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="offset-2 col-xxl-5 col-md-8">
                   
                    <h3>Sistema de Login</h3>
                    <div v-if="erro" class="alert alert-danger" role="alert">{{ erro }}</div>
                    <form @submit.prevent="login">
                    <div>
                        <label for="email">email:</label>
                        <input type="email" id="email" v-model="email" required class="form-control"/>
                    </div>
                    <div>
                        <label for="password">Senha:</label>
                        <input type="password" id="password" v-model="password" required class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    

</template>