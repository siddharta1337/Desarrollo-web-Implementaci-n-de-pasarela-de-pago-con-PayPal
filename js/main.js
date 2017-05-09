 
function definirValor(_valor) {
    
    document.querySelector('#totalDeCompra').innerHTML = 'Total de compra: $' + _valor;
    document.querySelector('.paypal-btn-container').style.display = 'block';
    document.getElementById("precio_item").value = _valor;
}

