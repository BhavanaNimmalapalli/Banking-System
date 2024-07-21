var modal = document.getElementById('recoverModal');

var modalBtn = document.getElementById('recoverPassword');

var closeBtn = document.getElementById('closeModal');

modalBtn.addEventListener('click', openModal);

closeBtn.addEventListener('click', closeModal);

window.addEventListener('click', outsideClick);

function openModal(e){
    e.preventDefault(); 
    modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}

function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
}
