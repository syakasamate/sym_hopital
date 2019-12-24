function remplir(element) {
    var x = (element[0] + element[1]);
    document.getElementById("medecin_matricule").value = x;
}
var delet = document.getElementById('delete')
if (delet) {
    delet.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger') {
            alert(1);
        }
    });
}