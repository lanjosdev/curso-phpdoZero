// Funcionalidades / Libs:
import { useEffect, useState } from "react";
// import { CLIENTES_GET_ALL } from "../../API/clientesDB";
import { useParams, Link } from "react-router-dom";

// Utils:
// import { formatarTel, formatarData, formatarCadastro } from "../../utils/format";

// Estilo:

export default function DeletaCliente() {
    const { idCliente } = useParams(); // pega o parametro definido no routes.jsx
    const [confirmaDelete, setConfirmaDelete] = useState(false);
  
    document.title = `Deletar Cliente`;
    
    useEffect(()=> {
      async function carregaCliente() {     
        
      }
      carregaCliente();
    }, [idCliente]);

    function handleDeleteCliente() {
        alert('deletou');

        setConfirmaDelete(true);
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
                <p>Tem certeza que deseja deletar este cliente?</p>

                <div className="actions">
                    <Link to='/' style={{marginRight: '20px'}}>Não</Link>
                    <button onClick={()=> handleDeleteCliente(idCliente)}>Sim</button>
                </div>                
                </>
            )}

        </main>
    );
}