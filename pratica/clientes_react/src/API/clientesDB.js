import api from './config.json';
import axios from "axios";

// Base URL: http://localhost/curso-phpdoZero/pratica/backend/
export const API_URL = api.api_url;


// END POINTS DE CLIENTES

// Busca todos os Clientes cadastrados (READ):
export async function CLIENTES_GET_ALL() {
    const response = await axios.get(API_URL + "clientes.php")

    const clientesAll = response.data; // puxa a array de midias da API
    // console.log(clientesAll);
    return clientesAll;
}
// Busca Cliente pelo ID (READ):
export async function CLIENTE_GET_ID(id) {
    const response = await axios.get(API_URL + `clientes.php?id=${id}`);

    const cliente = response.data; // puxa a array de midias da API
    console.log(cliente);
    return cliente;
}

// Cadastar Cliente (CREATE):
export async function CLIENTE_ADD(formData) {
    await axios({
        method: 'post',
        url: API_URL + 'cadastrar_cliente.php',
        data: formData,
    })
    
    // const resul = response.data; // puxa a array de midias da API
    // console.log(resul);
    // return resul;
}

// Deletar Cliente (DELETE):
export async function CLIENTE_DELETE(id) {
    const response = await axios.get(API_URL + `deletar_cliente.php?id=${id}`);

    console.log('RESPOTA DA FUNÇÃO DELETE:');
    console.log(response);
    // const mediaDeletada = response.data.data;
    // return mediaDeletada;
}
