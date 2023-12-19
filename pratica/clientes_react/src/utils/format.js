export const formatarTel = (tel)=> {
    if(tel) {
        let ddd = tel.substr(0, 2);
        let part1tel = tel.substr(2, 5);
        let part2tel = tel.substr(7); //pega o resto final
        return `(${ddd}) ${part1tel}-${part2tel}`;
    } else {
        return 'Não informado';
    }
}

export const formatarData = (data)=> {
    if(data) {
        // Separa a data em um array usando o método `split()`.
        const date = data.split('-'); //vira uma array
        // console.log(data);
  
        // Inverte o array usando o método `reverse()`.
        return date.reverse().join('/');
    }
}

export const formatarCadastro = (data) => {
    // Converte a data para um objeto Date usando o método toLocaleString().
    const dataFormatada = new Date(data).toLocaleString("pt-BR", {
      // Formato da data: dd/MM/yyyy H:i
      dateStyle: "short",
      timeStyle: "short",
    });

    // console.log(dataFormatada);
    return dataFormatada
}