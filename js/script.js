function check_eleve() {
    var niv = document.getElementById('niv').value;
    if (niv == 0) {
        alert("Niveau est obligatoire!");
        return false
    }

    if (niv > 1) {
        var section = document.getElementById('section').value;
        if (section == 0) {
            alert("Section est obligatoire!");
            return false;
        }
    }

    return check_mat();
}

function check_mat() {
    if (document.getElementById('mat').selectedIndex == -1) {
        alert("Au moins faire le choix d'une matiere!");
        return false;
    }
}

function check_prof() {
    var mat = document.getElementById('mat').value;
    if (mat == 0) {
        alert("Matière est obligatoire!");
        return false;
    }
}

function allow() {
    var niv = document.getElementById('niv').value;
    var section = document.getElementById('section');
    if (['2', '3', '4'].includes(niv)) {
        section.disabled = false;
    } else {
        section.selectedIndex = 0;
        section.disabled = true;
    }
}

function cancel_eleve() {
    document.getElementById('niv').value = '0';
    document.getElementById('section').value = '0';
    document.getElementById('section').disabled = true;
    document.getElementById('mat').selectedIndex = -1;
}

function cancel_prof() {
    document.getElementById('mat').value = '0';
}

function check_search(search) {
    if (document.getElementById(search).value == '') {
        alert("Bar de recherche est vide!");
        return false;
    }
}