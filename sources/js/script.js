
//Fonction d'affichage de l'arme sélectionnée: 

function showBow() {
	$('.weaponimg').css('display', 'none');
	$('.weaponimg:first-child').css('display', 'inline');	
	$('.selectedweapon1').html('Bow and Arrows');	
}

function showSword() {
	$('.weaponimg').css('display', 'none');
	$('.weaponimg:nth-child(2)').css('display', 'inline');	
	$('.selectedweapon1').html('Iron Sword');
}

function showClub() {
	$('.weaponimg').css('display', 'none');
	$('.weaponimg:nth-child(3)').css('display', 'inline');
	$('.selectedweapon1').html('Spiky Club');
}


$('.bow').click(showBow);
$('.sword').click(showSword);
$('.club').click(showClub);




//Fonction d'affichage de la potion sélectionnée: 

function showMaravak() {
	$('.potionimg').css('display', 'none');
	$('.potionimg:nth-child(6)').css('display', 'inline');	
	$('.selectedpotion1').html('Maravak Beverage');	
}
function showSurprise() {
	$('.potionimg').css('display', 'none');
	$('.potionimg:nth-child(7)').css('display', 'inline');	
	$('.selectedpotion1').html('Surprise Cocktail');	
}
function showJoba() {
	$('.potionimg').css('display', 'none');
	$('.potionimg:nth-child(8)').css('display', 'inline');	
	$('.selectedpotion1').html('Protection Mixture');	
}

$('.maravak').click(showMaravak);
$('.poposurprise').click(showSurprise);
$('.joba').click(showJoba);




//Fonction d'affichage du spell sélectionné: 

function showKiss() {
	$('.spellimg').css('display', 'none');
	$('.spellimg:nth-child(11)').css('display', 'inline');	
	$('.selectedspell1').html('Kiss. Careful!');	
}


function showHoney() {
	$('.spellimg').css('display', 'none');
	$('.spellimg:nth-child(12)').css('display', 'inline');	
	$('.selectedspell1').html('Honey');	
}

$('.kiss').click(showKiss);
$('.honey').click(showHoney);


