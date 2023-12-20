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
export async function MEDIA_DELETE(id, token) {
    const response = await axios.delete(API_URL + `api/media/${id}`, { headers: { Authorization: "Bearer " + token } })

    console.log('RESPOTA DA FUNÇÃO DELETE:')
    console.log(response);
    // const mediaDeletada = response.data.data;
    // return mediaDeletada;
}
