function formatarCPF(campo){
    let valor = campo.value.replace(/\D/g, '');

    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    campo.value = valor;
}

function formatarTelefone(campo){
    let valor = campo.value.replace(/\D/g, '');

    valor = valor.replace(/(\d{0})(\d)/, '$1($2');
    valor = valor.replace(/(\d{2})(\d)/, '$1)$2');
    valor = valor.replace(/(\d{5})(\d)/, '$1-$2');

    campo.value = valor;
}

