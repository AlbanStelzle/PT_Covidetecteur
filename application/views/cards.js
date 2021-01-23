

// ajouter/relier un capteur à son compte
function card(ele){

	// modifie le contenu de la div on passe de l'image de la croix (ajout) à une icone de poubelle (supprimer), un titre, et un bouton pour voir les statistiques du capteur
	var id = ele.id;

	console.log(id);


	if (id == "white_card_1_1") {
		document.getElementById('white_card_1_1').innerHTML = '<div class="text-right" ><a class="hoov" onlcick><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}

	if (id == "white_card_1_2") {
		document.getElementById('white_card_1_2').innerHTML = '<div class="text-right" ><a class="hoov" href=""><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}

	if (id == "white_card_1_3") {
		document.getElementById('white_card_1_3').innerHTML = '<div class="text-right" ><a class="hoov" href=""><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}
}



// retirer un capteur à son compte
function card(ele){

	// modifie le contenu de la div on passe de l'icone de poubelle (supprimer), du titre, et du bouton pour voir les statistiques du capteur à l'image de la croix (ajout)
	var id = ele.id;

	console.log(id);


	if (id == "white_card_1_1") {
		document.getElementById('white_card_1_1').innerHTML = '<div class="text-right" ><a class="hoov" onlcick><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}

	if (id == "white_card_1_2") {
		document.getElementById('white_card_1_2').innerHTML = '<div class="text-right" ><a class="hoov" href=""><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}

	if (id == "white_card_1_3") {
		document.getElementById('white_card_1_3').innerHTML = '<div class="text-right" ><a class="hoov" href=""><img src="images/icon-trash.png" alt="logo" style="width:13%" ></a></div><br><br><h2 class="text-center user-select-none">Titre</h2><br><div class="text-center"><button type="button" class="btn btn-info rounded-pill" style="width:50%">Statistiques</button></div>';
	}
}

