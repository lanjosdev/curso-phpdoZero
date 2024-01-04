// Funcionalidades / Libs:
import { useRef, useState, useEffect } from "react";
import { CLIENTE_GET_ID, CLIENTE_EDIT } from "../../API/clientesDB";
import { useParams, Link } from "react-router-dom";

// Utils:
// import { formatarTel } from "../../utils/format";

// Estilo:

export default function EditaCliente() {
  const { idCliente } = useParams(); // pega o parametro definido no routes.jsx
  const [cliente, setCliente] = useState({});
  const [sucesso, setSucesso] = useState(false);
  const [erro, setErro] = useState(false);
  
  const nomeRef = useRef('');
  const emailRef = useRef('');
  const telRef = useRef('');
  const nascRef = useRef('');

  document.title = `Editar Cliente`;

  // Carrega dados do cliente selecionado:
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
      //finally {
      //  preencheCampos();
      //}      
    }
    carregaCliente();
  }, [idCliente]);

  // Preenche campos com os dados do cliente:
  useEffect(()=> {
    function preencheCampos() {
        // const clientInfo = cliente;
        nomeRef.current.value = cliente.nome;
        emailRef.current.value = cliente.email;
        telRef.current.value = cliente.telefone;
        nascRef.current.value = cliente.nascimento;
    }
    preencheCampos();
  }, [cliente]);


  async function handleSubmitEdit(e) {
    e.preventDefault();

    const nome = nomeRef.current?.value;
    const email = emailRef.current?.value;
    const tel = telRef.current?.value;
    const nasc = nascRef.current?.value;

    if(nome === cliente.nome && email === cliente.email && tel === cliente.telefone && nasc === cliente.nascimento) {
        setSucesso(false);
        setErro('Nada atualizado!')
        // console.log("Nada atualizado!");
        return;
    }

    if(nome !== '' && email !== '' && nasc !== '') {
      setErro(false);

      let formData = new FormData();
      formData.append('id', idCliente);
      formData.append('nome', nome);
      formData.append('email', email);
      formData.append('telefone', tel);
      formData.append('nascimento', nasc);

      try {
        const response = await CLIENTE_EDIT(formData);
        // console.log(response);        
        console.log('Editado com Sucesso!');
        setErro(false);
        setSucesso(true);
      } catch(erro) {
        // trata o tipo de erro de acordo com o código retornado:
        setErro('O telefone deve ser preenchido no padrão (11)98888-8888'); //true
        setSucesso(false);

        console.log('Erro ao EDITAR:');
        console.log(erro);
      }
      // finally {
      //   // setLoadingClientes(false);
      // }

    } else {
      console.log('Form incompleto');
      setErro(true);
    }
  }


  return (
    <main className="Edita-container">

      <h1>Editar Cliente</h1>

      <Link to='/'>Voltar para a lista de Clientes</Link>
      <br/><br/><br/>

      <form onSubmit={handleSubmitEdit}>
        <label htmlFor="name">Nome: </label>
        <input type="text" id="name" ref={nomeRef} autoComplete="on" required /> *
        <br/><br/>

        <label htmlFor="mail">E-mail: </label>
        <input type="email" id="mail" ref={emailRef} required /> *
        <br/><br/>

        <label htmlFor="tel">Telefone: </label>
        {/* Em proximas atualizações, usar mascara no input */}
        <input type="tel" placeholder="(11)98888-8888" id="tel" ref={telRef} autoComplete="on" />
        <br/><br/>

        <label htmlFor="nasc">Data de Nascimento: </label>
        <input type="date" placeholder="dd/mm/aaaa" id="nasc" ref={nascRef} required /> *
        <br/><br/>


        <button type="submit">Editar Cliente</button>
      </form>

      {sucesso ? <p style={{color: 'green'}}><b>Cliente atualizado com sucesso!!!</b></p> : null}
      {erro ? <p style={{color: 'red'}}><b>{erro}</b></p> : null}
      
    </main>
  )
}