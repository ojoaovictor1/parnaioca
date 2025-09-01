function formatarCPF(campo){
    let valor = campo.value.replace(/\D/g, '');

    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    campo.value = valor;
}

function formatarMoeda(campo) {
    let valor = campo.value.replace(/\D/g, '');

    valor = (valor/100).toFixed(2) + ''; 
    valor = valor.replace(".", ","); 
    valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, "."); 

    campo.value = valor;
}


