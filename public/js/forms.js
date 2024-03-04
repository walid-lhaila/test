const clientForm = document.getElementById('clientForm');
const proprietaireForm = document.getElementById('proprietaireForm');

document.getElementById('client-btn').addEventListener('click', function () {
    clientForm.classList.remove('hidden');
    proprietaireForm.classList.add('hidden');
});

document.getElementById('proprietaire-btn').addEventListener('click', function () {
    clientForm.classList.add('hidden');
    proprietaireForm.classList.remove('hidden');
});


