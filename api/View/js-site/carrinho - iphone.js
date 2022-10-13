function AddCarrinho(produto, qtd, valor, posicao)
{
  localStorage.setItem("produto" + posicao, produto);
  localStorage.setItem("qtd" + posicao, qtd);
  valor = valor * qtd;
  localStorage.setItem("valor" + posicao, valor);
  alert("Produto adicionado ao carrinho!");
}

var total = 0; // variável que retorna o total dos produtos que estão na LocalStorage.
var i = 0;     // variável que irá percorrer as posições
var valor = 0; // variável que irá receber o preço do produto convertido em Float.

for(i=1; i<=99; i++) // verifica até 99 produtos registrados na localStorage
{
  var prod = localStorage.getItem("produto" + i + ""); // verifica se há recheio nesta posição.
  if(prod != null)
  {
    // exibe os dados da lista dentro da div itens
    document.getElementById("itens").innerHTML += localStorage.getItem("qtd" + i) + " x ";
    document.getElementById("itens").innerHTML += localStorage.getItem("produto" + i);
    document.getElementById("itens").innerHTML += " ";
    document.getElementById("itens").innerHTML += "R$: " + localStorage.getItem("valor" + i) + "<hr>";

    // calcula o total dos recheios
    valor = parseFloat(localStorage.getItem("valor" + i)); // valor convertido com o parseFloat()
    total = (total + valor); // arredonda para 2 casas decimais com o .toFixed(2)
  }
}
// exibe o total dos recheios
document.getElementById("total").innerHTML = total.toFixed(2);
