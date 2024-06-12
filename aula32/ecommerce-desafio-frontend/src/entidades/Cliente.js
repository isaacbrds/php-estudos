export class Cliente{
    constructor(clienteJson = {}){
        this.id = clienteJson.id;
        this.nome = clienteJson.nome;
        this.telefone = clienteJson.telefone;
        this.email = clienteJson.email;
        this.endereco = clienteJson.endereco;
    }
}