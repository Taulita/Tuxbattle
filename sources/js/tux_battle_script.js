function userPseudo(champId)
{
	var pseudoValidation = document.getElementById(champId).value;
	var regPseudoValidation = new RegExp("^[A-Za-z0-9_-]+$");

	if(regPseudoValidation.test(pseudoValidation) == true)
	{
		document.getElementById(champId).value = pseudoValidation
	}
	else
	{
		alert('Seuls les caractères suivants sont autorisés :\n- Lettres de A à Z ou a à z\n- Les underscores [ _ ]\n- Les tirets [ -]\nMerci de recommencer.');
		userPseudoLostFocus(champId);
	}
}

function userPseudoLostFocus(champId)
{
	document.getElementById(champId).value = "";
}