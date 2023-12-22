// Funcionalidades / Libs:
import { useEffect, useState } from "react";
import { CLIENTE_GET_ID, CLIENTE_DELETE } from "../../API/clientesDB";
import { useParams, Link } from "react-router-dom";

// Utils:
// import { formatarTel, formatarData, formatarCadastro } from "../../utils/format";

// Estilo:

export default function DeletaCliente() {
    const { idCliente } = useParams(); // pega o parametro definido no routes.jsx
    const [cliente, setCliente] = useState({});
    const [confirmaDelete, setConfirmaDelete] = useState(false);
  
    document.title = `Deletar Cliente`;

    useEffect(()=> {
      async function carregaCliente() {     
        try {
            const response = await CLIENTE_GET_ID(idCliente);
            // console.log('Dados cliente:');
            // console.log(response);
            setCliente(response);            
        } catch(erro) {
            console.log('Deu erro!');
            console.log(erro);
            // usa navigate para page "NotFound" quando não encontrar cliente id
        } 
        // finally {
        //     setLoadingClientes(false);
        // }      
      }
      carregaCliente();
    }, [idCliente]);


    async function handleDeleteCliente(id) {
        try {
            const response = await CLIENTE_DELETE(id);
            console.log('Cliente DELETADO!!!');
            setConfirmaDelete(true);
        } catch(erro) {
            console.log('ERRO AO DELETAR');
            console.log(erro);
        }
    }


    return (
        <main className="DeletaCliente-container">

            {confirmaDelete ? (
                <>
                <h1>Cliente deletado com sucesso!</h1>
                <p><Link to='/'>Clique aqui</Link> para voltar para a lista de clientes.</p>
                </>
            ) : (
                <>
                <h1>Deletar Cliente</h1>
                <p>Tem certeza que deseja deletar cliente <b>{cliente.nome}</b>?</p>

                <div className="actions">
                    <Link to='/' style={{marginRight: '20px'}}>Não</Link>
                    <button onClick={()=> handleDeleteCliente(idCliente)}>Sim</button>
                </div>                
                </>
            )}

        </main>
    );
}