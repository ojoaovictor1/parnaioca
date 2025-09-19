function carregarSection(url, event) {
    if (event) event.preventDefault();
    fetch(url)
        .then(response => response.text())
        .then(html => {
            document.getElementById("cadastro_auxiliar").innerHTML = html;
            document.getElementById("cadastro_auxiliar").scrollIntoView({behavior: "smooth"});
        })
        .catch(err => console.log("Erro ao carregar section:", err));
}
