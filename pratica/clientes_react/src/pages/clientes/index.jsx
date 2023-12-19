// Funcionalidades / Libs:
import { useState, useEffect } from "react";
import { CLIENTES_GET_ALL } from "../../API/clientesDB";
import { Link } from "react-router-dom";

// Utils:
import { formatarTel, formatarData, formatarCadastro } from "../../utils/format";

// Estilo:

export default function Clientes() {
  document.title = `Lista de Clientes`;
  const [loadingClientes, setLoadingClientes] = useState(true);
  const [clientes, setClientes] = useState([]);

  
  useEffect(()=> {
    async function carregaClientes() {     
      try {
        const response = await CLIENTES_GET_ALL();
        console.log(response);

        setClientes(response);
      } catch(erro) {
        console.log('Deu erro');
        console.log(erro);
      } finally {
        setLoadingClientes(false);
      }
    }
    carregaClientes();
  }, []);
  

  return (
    <main className="Container-clientes">
        <h1>Lista de Clientes</h1>
        <p style={{display: 'inline-block'}}>Estes são os clientes cadastrados no seu sistema:</p>
        <Link to='/cadastro' style={{float: 'right'}}>ADD CLIENTE</Link>

        {loadingClientes ? (
            <p>Buscando clientes...</p>
        ) : (
            clientes.length === 0 ? (
                <p>Nenhum cliente registrado!</p>
            ) : (
                <table border={1} cellPadding={10}>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Nascimento</th>
                            <th>Cadastrado em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        {clientes.map((cliente)=> (
                            <tr key={cliente.id}>
                                <td data-label="id">{cliente.id}</td>
                                <td data-label="nome">{cliente.nome}</td>                                
                                <td data-label="email">{cliente.email}</td>                                
                                <td data-label="telefone">{formatarTel(cliente.telefone)}</td>      
                                <td data-label="nascimento">{formatarData(cliente.nascimento)}</td>             
                                <td data-label="data_cadastro">{formatarCadastro(cliente.data_cadastro).replace(",", "")}</td>      
                                <td data-label="acao">
                                    <div className="actions">
                                        <Link to={`/edite/${cliente.id}`}>Edit</Link>
                                        <Link to={`/delete/${cliente.id}`}>X</Link>
                                    </div>
                                </td>
                            </tr>
                        ))}                        
                    </tbody>
                </table>
            )
        )}
    </main>
  )
}