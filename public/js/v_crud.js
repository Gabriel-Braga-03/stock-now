// Instanciando Objetos DOOM
var tf_code_bar = document.querySelector('#main-form input[name="code_bar"]');
var tf_name = document.querySelector('#main-form input[name="name"]');
var tf_qtd = document.querySelector('#main-form input[name="qtd"]');
var tf_price = document.querySelector('#main-form input[name="price"]');
var table = document.getElementById('main-table').children[1];
var btn_del = document.getElementById('btn_del');
var btn_edit = document.getElementById('btn_edit');
var btn_pesq = document.getElementById('btn_pesq');
var lastTableLine = null;

// Definindo Eventos
for (let i = 0; i < table.childElementCount; i++) {
    table.children[i].addEventListener('click', () => {
        // Habilitar botões se desabilitados
        if (btn_del.disabled) {
            btn_del.disabled = false;
            btn_edit.disabled = false;
            btn_pesq.disabled = false;
        }

        // Colorindo linha
        if (table.children[lastTableLine] != null) {
            table.children[lastTableLine].classList.remove('selected');
        }
        table.children[i].classList.add('selected');
        lastTableLine = i;

        // Setando valores no form
        tf_code_bar.value = table.children[i].children[0].innerText;
        tf_name.value = table.children[i].children[1].innerText;
        tf_qtd.value = table.children[i].children[2].innerText;
        tf_price.value = table.children[i].children[3].innerText.slice(3);
    });
}
btn_del.addEventListener('click', () => {
    location.href = `delete/product/${table.children[lastTableLine].children[0].innerText}`;
});
btn_edit.addEventListener('click', () => {
    location.href = `update/product/${tf_code_bar.value}/${tf_name.value}/${tf_qtd.value}/${tf_price.value}`;
});
btn_pesq.addEventListener('click', () => {
    var code_bar = tf_code_bar.value == "" ? null : tf_code_bar.value;
    var name = tf_name.value == "" ? null : tf_name.value;
    var qtd = tf_qtd.value == "" ? null : tf_qtd.value;
    var price = tf_price.value == "" ? null : tf_price.value;
    location.href = `read/product/${code_bar}/${name}/${qtd}/${price}`;
});