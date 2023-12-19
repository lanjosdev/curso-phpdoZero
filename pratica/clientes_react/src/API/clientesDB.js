import api from './config.json';
import axios from "axios";

// Base URL: http://localhost/curso-phpdoZero/pratica/backend/
export const API_URL = api.api_url;


// End points de CLIENTES

// Lista todos os Clientes cadastrados (READ):
export async function CLIENTES_GET_ALL() {
    const response = await axios.get(API_URL + "clientes.php")

    const clientesAll = response.data; // puxa a array de midias da API
    // console.log(clientesAll);
    return clientesAll;
}

// Cadastar Cliente (CREATE):
export async function CLIENTE_ADD(formData) {
    axios({
        method: 'post',
        url: API_URL + 'cadastrar_cliente.php',
        data: formData,
    })
    
    // const resul = response.data; // puxa a array de midias da API
    // console.log(resul);
    // return resul;
}