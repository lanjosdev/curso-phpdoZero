// Funcionalidades / Libs:
import { useRef } from "react";
import { CLIENTE_ADD } from "../../API/clientesDB";
import { Link } from "react-router-dom";

// Utils:
// import { formatarTel, formatarData, formatarCadastro } from "../../utils/format";

// Estilo:

export default function Cadastro() {
  document.title = `Cadastrar cliente`;
  const nomeRef = useRef('');
  const emailRef = useRef('');
  const telRef = useRef('');
  const nascRef = useRef('');
  // const [] = useState();
  

  async function handleSubmitRegister(e) {
    e.preventDefault();

    const nome = nomeRef.current?.value;
    const email = emailRef.current?.value;
    const tel = telRef.current?.value;
    const nasc = nascRef.current?.value;

    if(nome !== '' && email !== '' && nasc !== '') {
      let formData = new FormData();
      formData.append('nome', nome);
      formData.append('email', email);
      formData.append('telefone', tel);
      formData.append('nascimento', nasc);

      try {
        const response = await CLIENTE_ADD(formData);
        console.log(response);
        
        console.log('SUCESS CREATE REGISTER');
        // setClientes(response);
        const formCadastro = document.querySelector('#form-cadastro');
        formCadastro.reset();

      } catch(erro) {
        console.log('Deu erro');
        console.log(erro);
      } 
      // finally {
      //   // setLoadingClientes(false);
      // }

    } else {
      console.log('Form incompleto')
    }
  }


  return (
    <main className="Cadastro-container">

      <h1>Cadastrar Cliente</h1>

      <Link to='/'>Voltar para a lista de Clientes</Link>
      <br/><br/><br/>

      <form onSubmit={handleSubmitRegister} id="form-cadastro">
        <label htmlFor="name">Nome: </label>
        <input type="text" id="name" name="nome" ref={nomeRef} /> *
        <br/><br/>

        <label htmlFor="mail">E-mail: </label>
        <input type="email" id="mail" name="email" ref={emailRef}  /> *
        <br/><br/>

        <label htmlFor="tel">Telefone: </label>
        <input type="tel" placeholder="(11)98888-8888" id="tel" name="telefone" ref={telRef}  />
        <br/><br/>

        <label htmlFor="nasc">Data de Nascimento: </label>
        <input type="date" placeholder="dd/mm/aaaa" id="nasc" name="nascimento" ref={nascRef}  /> *
        <br/><br/>


        <button type="submit">Salvar Cliente</button>
      </form>
      
    </main>
  )
}