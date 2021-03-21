

// ajouter/relier un capteur à son compte
function card(ele) {

	// modifie le contenu de la div on passe de l'image de la croix (ajout) à une icone de poubelle (supprimer), un titre, et un bouton pour voir les statistiques du capteur
	let id = ele.id;
	let path = `${window.location.protocol}//${window.location.host}/~stelzle/PT_covidetecteur/`;
	console.log(id);
	console.log(path);

	document.getElementById(id).innerHTML = '<div class="text-right" ><a class="hoov" onlcick><img src="../images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
}


