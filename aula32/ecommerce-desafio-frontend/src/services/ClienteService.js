import { Cliente } from "../entidades/Cliente";
import { api } from "../config/api";

export class ClienteService{
    async buscar(){
        try {
            const response = await fetch(`${api.host}/clientes`, {
                method: 'GET',
                headers:{
                    "Content-Type" : 'application/json',
                    "Authorization": `Bearer ${localStorage.getItem('token')} `
                },
                
            });
            if(!response.ok) throw new Error('Erro ao buscar o cliente');
            
            let clientesJson  = await response.json();
            let clientesTipado = [];
            
            clientesJson.forEach((cliente)=>{
               clientesTipado.push( new Cliente(cliente));
            })

            return clientesTipado;
        } catch (error) {
            console.log('Erro ao buscar cliente:', error)
            throw error;
        }
    }

    async salvar(cliente) {
        try {
            const response = await fetch(`${api.host}/clientes`, {
                method: 'POST',
                headers:{
                    "Content-Type" : 'application/json',
                },
                body: JSON.stringify(cliente)
            })
            if(!response.ok) throw new Error('Erro ao salvar o cliente');
            
            let clienteJson  = response.json();
            return new Cliente(clienteJson);
        } catch (error) {
            console.log('Erro ao salvar cliente:', error)
            throw error;
        }
        
    }
}