// Instanciando Objetos DOOM
var tabs = document.getElementsByClassName('tab');
var tabContents = document.getElementsByClassName('tab-content');
var lastTabIndex = 0;

// Definindo Eventos
for (let i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', () => {
        if (lastTabIndex != i) {
            tabs[lastTabIndex].classList.remove('selected');
            tabContents[lastTabIndex].classList.add('hidden');
            tabs[i].classList.add('selected');
            tabContents[i].classList.remove('hidden');
            lastTabIndex = i;
        }
    });
}