	function CreateTable()
	{
		var nbLignes=document.getElementById("nbligne").value;
		var nbSuspentes=document.getElementById("nbsuspentes").value;
		var table="";
		var ligne="";
		var ascii = "&#";
		var code = "A".charCodeAt(0);
		var wInput = 300/nbSuspentes;
		
		//Tableau
		
		//table = '<form action="modele/confirm_xml.php" method="post"><table style="width:100%;">';
		for(var i = 0;  i<nbLignes; i++){
			table+='<tr>';
			/*for(var j = 0; j<nbSuspentes; j++){
				jString = j+1;
				code = code + i;
				table+='<th class="mdl-data-table__cell--non-numeric">'+ascii+code+' '+jString+'</th>';
				code = "A".charCodeAt(0);
			}*/
			table+='</tr><tr>';
			for(var j = -1; j<nbSuspentes*3-1; j++){
				var jString = (j+1).toString();
				var iString = (i+1).toString();
				code = code + Math.round(j/3);

				table+='<td class="tdControle mdl-data-table__cell--non-numeric" style="height:80px; border:1px; border-style:solid; min-width:0px; max-width:100px;" </td><input type="text" name="'+iString+ascii+code+'" style="height:80px; max-width:'+wInput+'px; "/>';
				code = "A".charCodeAt(0);
			}
			table+='</tr>';
		}
		//table+='<center><input  name="submit" type="submit"  value="Enregistrer la voile"></center></form>';
		//table+="</table><center><input  name='submit' type='submit'  value='Enregistrer la voile'></center>";
		document.getElementById('table_suite').innerHTML = "";
		$(".table_suite").append(table);
		
		//Colonne
		

		
		
		//Ligne
		
		for(var j = 0; j<nbligne; j++){
			var jString = (j+1).toString();
			code = code + i;
			ligne+='<p>'+j+'</br></p>';
			document.getElementById('colonne1').innerHTML = "";
			$(".colonne1").append(ligne);
		}
	}

	

	function affichvoile()

	{

		var voile=document.getElementById("voileart").value;

			if(voile!=-1)
				{
		$.ajax({	
			url:"index.php?d=operateur&a=recuperer_voile",

			data:{id:voile},

			type : "POST",

			success :function(rep)
			{
			
				var reponce=rep.split(',');

				if(document.getElementById("donner").style.visibility==='hidden')

				{

					document.getElementById("donner").style.visibility='visible';

					document.getElementById("labelnom").style.visibility='visible';

					document.getElementById("labelcert").style.visibility='visible';

					document.getElementById("labeldate").style.visibility='visible';

					document.getElementById("taile").style.visibility='visible';

					

				}
				
				document.getElementById("nom").value=reponce[0];

				document.getElementById("fabriquand").value=reponce[1];

				document.getElementById("nbtaile").value=reponce[2];

				document.getElementById("date").value=reponce[3];

				document.getElementById("cert").value=reponce[4];
			
				var table;

				var wid=100/reponce[2];

				table="<table class='mdl-data-table' style='margin:auto;'>";

				
				
				for(i=1;i<=reponce[2];i++)

				{

					table=table+"<th width='"+wid+"%'>taille"+i+"</th>";

				}

				table=table+"</tr><tr> ";

				
				
				for(i=1; i<=reponce[2];i++)

				{

					table=table+ '<td style=" width:'+wid+'%">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

								'<input name="taille'+i+'" style=" width:100%" class="mdl-textfield__input" type="text"  value="'+reponce[i+4]+'"id="taille'+i+'">'+

								'<label style=" width:100%" class="mdl-textfield__label" for="taille'+i+'"></label>'+

								'</div>'+'</td>';

				}
				table=table+"  </tr> </table>";

				document.getElementById("taile").innerHTML = "";

				$(".taile").append(table);
				if(document.getElementById('valider').style.visibility=='hidden')
				{
					document.getElementById('valider').style.visibility='visible';
				}
				if(document.getElementById('bouton').style.visibility=='hidden')
				{
					document.getElementById('bouton').style.visibility='visible';
				}
				/*
				if(document.getElementById('valeur_taille_containt').style.visibility=='hidden')
				{
					document.getElementById('valeur_taille_containt').style.visibility='visible';
				}
				if(document.getElementById('longerSuspentecontain').style.visibility=='hidden')
				{
					document.getElementById('longerSuspentecontain').style.visibility='visible';
				}
				if(document.getElementById('materiauxSuspentecontin').style.visibility=='hidden')
				{
					document.getElementById('materiauxSuspentecontin').style.visibility='visible';
				}
				if(document.getElementById('composition').style.visibility=='hidden')
				{
					document.getElementById('composition').style.visibility='visible';
				}
				
				if(document.getElementById('longeur').style.visibility=='hidden')
				{
					document.getElementById('longeur').style.visibility='visible';
				}
				*/
				
			}

			});
				}
		/*
		var  tablmateriaux="<h6> listes des matériaux de la suspentes </h6>"+
		"<table border='1'> <tr>"+
		"<th width='60px'> taille </th>";
		for(i=1; i<=nb;i++)
		{
			tablmateriaux+="<th width='"+wid+"%'>taile"+i+"</th>";
		}
		tablmateriaux+="</tr><tr> ";
		for(j=1;j<=nbSuspente;j++)
		{
			tablmateriaux+="<th width='"+wid+"px'> supsente"+j+" </th>";
			for(i=1; i<=nb;i++)
			{
				tablmateriaux+='<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
							'<select  name="materiaux'+i+j+'"  id="materiaux'+i+j+'"  style="width:100%">'+
							rep+
							'</select>'+
							'</div>'+'</td>';
			}
			tablmateriaux+="</tr><tr>";
		}
		tablmateriaux+="  </tr> </table>";
		*/
	}

	function affichTable()

	{

	

		var nb=document.getElementById("nbtaile").value;

		var id=document.getElementById("id_const").value;

		var cert=document.getElementById("cert").value;

		var nom=document.getElementById("nom").value;

		var date=document.getElementById("datesortie").value;

		var tabl="";

		if((id>=0)&&(nb>0)&&(date!="")&&(cert!=="")&&(nom!==""))

		{

			tabl="<table class='mdl-data-table' style='margin:auto;' border='1'> <tr>";

			var wid= 100/nb;

			for(i=1; i<=nb;i++)

			{

				tabl=tabl+"<th width='"+wid+"%'> taille"+i+"</th>";

			}

			tabl=tabl+"</tr><tr> ";

			for(i=1; i<=nb;i++)

			{

				tabl=tabl+ '<td style=" width:'+wid+'%">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

							'<input name="taille'+i+'" style=" width:100%" class="mdl-textfield__input" type="text" id="taille'+i+'">'+

							'<label style=" width:100%" class="mdl-textfield__label" for="taille'+i+'"></label>'+

							'</div>'+'</td>';

			}

			tabl=tabl+"  </tr> </table>";

			document.getElementById('tabl_suite').innerHTML = "";

			$(".tabl_suite").append(tabl);

			

			if(document.getElementById("file").style.visibility==='hidden')

			{

				document.getElementById("file").style.visibility='visible';

			}

			if(document.getElementById("valider").style.visibility==='hidden')

			{

				document.getElementById("valider").style.visibility='visible';

			}

			if(document.getElementById("select_nb_suspente").style.visibility==='hidden')

			{

				document.getElementById("select_nb_suspente").style.visibility='visible';

			}

		}

		else{

			alert("il menque une ou plusieur valeur veiller verifier");

		}

	}

	function aficherTableauxvaleur()

	{

		var tabl="";

		var nbSuspente = document.getElementById("nbSuspente").value;

		var nb=document.getElementById("nbtaile").value;

		var wid= 45;

		tabl="<h6>référence fabricant des suspentes  </h6>"+

			"<table border='1'> <tr>"+

			"<th width='"+wid+"px'> taille </th>";

			

			for(i=1; i<=nb;i++)

			{

				tabl=tabl+"<th style='width:'"+wid+"px;'>taille"+i+"</th>";

			}

				

			

			tabl=tabl+"</tr><tr> ";

			

			for(j=1;j<=nbSuspente;j++)

			{

				tabl=tabl+"<th width='45px'> suspente"+j+" </th>";

				for(i=1; i<=nb;i++)

				{

					tabl=tabl+ '<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

								'<input name="reffab'+j+i+'" style=" width:100%" class="mdl-textfield__input" type="text" id="reffab'+j+i+'">'+

								'<label style=" width:100%" class="mdl-textfield__label" for="reffab'+j+i+'"></label>'+

								'</div>'+'</td>';

				}

				tabl=tabl+"</tr><tr>";

			}

	

			tabl=tabl+"  </tr> </tabl_2e>";

			document.getElementById('valeur_taille').innerHTML = "";
			if(document.getElementById('valeur_taille_containt').style.visibility=='hidden')
			{
				document.getElementById('valeur_taille_containt').style.visibility='visible';
			}
			$(".valeur_taille").append(tabl);

			

			var tabl2="";

			tabl2="<h6> Longueur des suspentes par référence et par taille </h6>"+

			"<table border='1'> <tr>"+

			"<th width='"+wid+"px'> taille </th>";

			for(i=1; i<=nb;i++)

			{

				tabl2=tabl2+"<th width='45px'> taille"+i+"</th>";

			}

				

			

			tabl2=tabl2+"</tr><tr> ";

			

			for(j=1;j<=nbSuspente;j++)

			{

				tabl2=tabl2+"<th width='"+wid+"px'> suspente"+j+" </th>";

				for(i=1; i<=nb;i++)

				{

					tabl2=tabl2+ '<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

								'<input name="tailsup'+j+i+'" style=" width:100%" class="mdl-textfield__input" type="text" id="tailsup'+j+i+'">'+

								'<label style=" width:100%" class="mdl-textfield__label" for="tailsup'+j+i+'"></label>'+

								'</div>'+'</td>';

				}

				tabl2=tabl2+"</tr><tr>";

			}

	

			tabl2=tabl2+"  </tr> </tabl_2e>";

			if(document.getElementById('longerSuspentecontain').style.visibility=='hidden')
			{
				document.getElementById('longerSuspentecontain').style.visibility='visible';
			}
			document.getElementById('longerSuspente').innerHTML = "";

			wid= 100/nb;

			$(".longerSuspente").append(tabl2);

			$.ajax({

			url:"index.php?d=operateur&a=recuperer_materiaux",

			success :function(rep)

			{
				var tabl3="";
				tabl3="<h6> listes des matériaux de la suspentes </h6>"+

				"<table border='1'> <tr>"+

				"<th width='60px'> taille </th>";

				for(i=1; i<=nb;i++)

				{

					tabl3=tabl3+"<th width='"+wid+"%'>taile"+i+"</th>";

				}

				tabl3=tabl3+"</tr><tr> ";

				

				for(j=1;j<=nbSuspente;j++)

				{

					tabl3=tabl3+"<th width='"+wid+"px'> supsente"+j+" </th>";

					for(i=1; i<=nb;i++)

					{

						tabl3=tabl3+ '<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

									'<select  name="materiaux'+i+j+'"  id="materiaux'+i+j+'"  style="width:100%">'+

									rep+

									'</select>'+

									'</div>'+'</td>';

					}

					tabl3=tabl3+"</tr><tr>";

				}

		

				tabl3=tabl3+"  </tr> </table>";

				document.getElementById('materiauxSuspente').innerHTML = "";

			if(document.getElementById('materiauxSuspentecontin').style.visibility=='hidden')
			{
				document.getElementById('materiauxSuspentecontin').style.visibility='visible';
			}
				$(".materiauxSuspente").append(tabl3);

				

			}

			});

			var bouton="";

			bouton= '<br />'+

					'<center>'+

					'<div class="materiauxSuspentecontin" name="materiauxSuspentecontin" id="materiauxSuspentecontin">'+
					'<a href="#popup_tableau4" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">compisition d\'une ligne </a>'+
					
					'<a href="#popup_tableau5" class="mdl-button mdl-js-button mdl-button--primary" style="text-decoration:none; color:rgb(96,125,139)">longueurs de contrôle</a>'+
					'</div>'+
					'</center>';

			document.getElementById('boutons').innerHTML = "";

			$(".boutons").append(bouton);
			var letre=['A','B','C','D','E','br'];
			var composition = "<h6> composition d'une ligne</h6>"+
			"<table border='1'>" +
			"<tr>"+
			"<th width='5%'>nom</th>"
			for( var t=1;t<=nb;t++)
			{
				composition=composition+"<th width='"+5+"%'> taille"+t+" </th>";
			}
			composition+="</tr><tr>";		
			lengt=letre.length;
			for( var j=0;j<lengt;j++)
			{
				
				for(var i=1;i<=25;i++)
				{
					composition=composition+"<th width='"+5+"%'>"+letre[j]+i+" </th>";
					for(var test=1;test<=nb;test++)
					{
						composition=composition+'<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
								'<input name="composition'+j+i+test+'" style=" width:100%" class="mdl-textfield__input" type="text" id="composition'+j+i+test+'"><label style=" width:100%" class="mdl-textfield__label" for="composition'+j+i+'"></label>'+
							'</div>'+'</td>';
					}
					composition=composition+"</tr><tr>";
				}
			}
			var longeur = "<h6> longeur d'une ligne</h6>"+
			"<table border='1'>" +
			"<tr>"+
			"<th width='5%'>nom</th>"
			for( var t=1;t<=nb;t++)
			{
				longeur=longeur+"<th width='"+5+"%'> taille"+t+" </th>";
			}
			longeur+="</tr><tr>";		
			lengt=letre.length;
			for( var j=0;j<lengt;j++)
			{
				
				for(var i=1;i<=25;i++)
				{
					longeur=longeur+"<th width='"+5+"%'>"+letre[j]+i+" </th>";
					for(var test=1;test<=nb;test++)
					{
						longeur=longeur+'<td style=" width:'+wid+'px">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
								'<input name="longeur'+j+i+test+'" style=" width:100%" class="mdl-textfield__input" type="text" id="longeur'+j+i+test+'"><label style=" width:100%" class="mdl-textfield__label" for="composition'+j+i+'"></label>'+
							'</div>'+'</td>';
					}
					longeur=longeur+"</tr><tr>";
				}
			}
			
			composition+="</tr></table>";
			
			document.getElementById('compositionligne').innerHTML = "";
			$(".compositionligne").append(composition);
			
			document.getElementById('longueursdecontrole').innerHTML = "";
			$(".longueursdecontrole").append(longeur);
			
			if(document.getElementById('boutonvalider').style.visibility=='hidden')
			{
				document.getElementById('boutonvalider').style.visibility='visible';
			}
	}

	function affich() {

		

		var x  = document.getElementById("client").value;

		// rend  tout les id  hidden 

		if(x<0)

		{

			for (i=1;i<=10;i++)

			{

				document.getElementById(i).style.visibility='hidden';
				document.getElementById("ajout_compte").style.visibility='visible';

			}

			document.getElementById("validation").style.visibility='hidden';

			document.getElementById("supprimer").style.visibility='hidden';
			
			document.getElementById("ajout_compte").style.visiblity='visible';

			document.getElementById("affichage").style.visibility='hidden';
			
			document.getElementById("permissions_adm").style.visibility='hidden';

		}

		else

		{

			// rend tout les id visible  

			if(document.getElementById("affichage").style.visibility==='hidden')

			{

				document.getElementById("validation").style.visibility='visible';

				document.getElementById("supprimer").style.visibility='visible';
				
				document.getElementById("ajout_compte").style.visibility='hidden';

				document.getElementById("affichage").style.visibility='visible';

				for (i=1;i<=10;i++)

				{

					document.getElementById(i).style.visibility='visible';

				}

			}

			//index.php.Action("d=administrateur&&a=affiche", "Controller", null, index.php?, null)
			$.ajax({
					
			url:'index.php?d=administrateur&a=affiche',

			data :{id:x},

			type : "POST",

			success :function(rep)	

			{

				// rempli les casse afficher par les valeur renvoiller du fichier php 
				
				
				var email = rep.split(',');

				if(email[11]==3){
					document.getElementById("permissions_adm").style.visibility="hidden";
					document.getElementById("supprimer").style.visibility='hidden';
				}
				else{
					document.getElementById("permissions_adm").style.visibility="visible";
					document.getElementById("supprimer").style.visibility='visible';
				}
				
				document.getElementById("email_adm").value=email[0];

				document.getElementById("rue_exp_adm").value=email[1];

				document.getElementById("ville_exp_adm").value=email[2];

				document.getElementById("code_exp_adm").value=email[3];

				document.getElementById("rue_fact_adm").value=email[4];

				document.getElementById("ville_fact_adm").value=email[5];

				document.getElementById("code_fact_adm").value=email[6];

				if (email[7] == 1) {

					document.getElementById("activation_adm").checked = true;

					document.getElementById("label_activation_adm").className= "mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded is-checked";

				}else {

					document.getElementById("activation_adm").checked = false;

					document.getElementById("label_activation_adm").className= "mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded";

				}
				if (email[11] == 2) {

					document.getElementById("operateur_adm").checked = true;

					document.getElementById("label_operateur_adm").className= "mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded is-checked";

				}else {

					document.getElementById("operateur_adm").checked = false;

					document.getElementById("label_operateur_adm").className= "mdl-switch mdl-js-switch mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded";

				}
				document.getElementById("nom_adm").value=email[8];

				document.getElementById("prenom_adm").value=email[9];

				document.getElementById("telephone_adm").value=email[10];
				

			}

		});

		}

	}



	function update(){

		// recuperre toute les valeur voulue par id 

		 var x  = document.getElementById("client").value;

		 var email = document.getElementById("email_adm").value;

		 var rue_exp = document.getElementById("rue_exp_adm").value;

		 var ville_exp = document.getElementById("ville_exp_adm").value;

		 var code_postal_exp = document.getElementById("code_exp_adm").value;

		 var rue_fac = document.getElementById("rue_fact_adm").value;

		 var ville_fac = document.getElementById("ville_fact_adm").value;

		 var code_postal_fac = document.getElementById("code_fact_adm").value;

		 var nom = document.getElementById("nom_adm").value;

		 var prenom = document.getElementById("prenom_adm").value;

		 var telephone = document.getElementById("telephone_adm").value;

		 var activation = document.getElementById("activation_adm").checked;
		 
		 var operateur = document.getElementById("operateur_adm").checked;

		 // transfaire les donner  pour pouvoir utiliser dans du php requete sql

		 $.ajax({

		  url:"index.php?d=administrateur&a=update_compte",

		  type : "GET",

		  data:  {id:x,

				  email:email,

				  rue_exp:rue_exp,

				  ville_exp:ville_exp,

				  code_postal_exp:code_postal_exp,

				  rue_fac:rue_fac,

				  ville_fac:ville_fac,

				  code_postal_fac:code_postal_fac,

				  activation:activation,
				  
				  operateur:operateur,

				  prenom:prenom,

				  nom:nom,

				  telephone:telephone

		  },

		  success: function (rep)

		 {

			alert("Modifications effectuées.");

		 }	

		 });

	}


	function activate(){

		ids = "";
		target = "activateUser";
		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)

		{

			$.ajax({

			  url:"index.php?d=administrateur&a=select_compte",

			  type : "GET",

			  success: function (rep)

			 {

				array=rep.split(',');

				

				for(i=0;i<(array.length-1);i++)

				{

					if(document.getElementById(array[i]).classList.contains("is-selected")==true)

					{

						ids=ids+array[i]+";";

					}

				}

				$.ajax({

				  url:"index.php?d=administrateur&a=activer",

				  type : "GET",

				  data: {ids:ids,target:target},

				  success: function (rep)

				 {

					 location.reload();

				 }	

				 });

			

			 }	

			 });	

			

		}	

	}
	
	function activate_annonce(){
		
		ids = "";
		target = "activateAnnonce";
		
		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)
		{
			$.ajax({
			  url:"index.php?d=annonces&a=select_annonce",
			  type : "GET",
			  data: {target:target},
			  success: function (rep)
			 {
				array=rep.split(',');
				
				for(i=0;i<(array.length-1);i++)
				{
					if(document.getElementById(array[i]).classList.contains("is-selected")==true)
					{
						ids=ids+array[i]+";";

					}
				}

				$.ajax({
				  url:"index.php?d=administrateur&a=activer",
				  type : "GET",
				  data: {ids:ids,target:target},
				  success: function (rep)
				 {
					 
					 location.reload();
				 }	

				 });
			 }	
			 });	
		}	

	}

	

	

jQuery(function($){

var fileDiv = document.getElementById("upload");

var fileInput = document.getElementById("upload-image");

console.log(fileInput);

fileInput.addEventListener("change",function(e){

  var files = this.files

  showThumbnail(files)

},false)



fileDiv.addEventListener("click",function(e){

  $(fileInput).show().focus().click().hide();

  e.preventDefault();

},false)



fileDiv.addEventListener("dragenter",function(e){

  e.stopPropagation();

  e.preventDefault();

},false);



fileDiv.addEventListener("dragover",function(e){

  e.stopPropagation();

  e.preventDefault();

},false);



fileDiv.addEventListener("drop",function(e){

  e.stopPropagation();

  e.preventDefault();



  var dt = e.dataTransfer;

  var files = dt.files;



  showThumbnail(files)

},false);



function showThumbnail(files){

  for(var i=0;i<files.length;i++){

    var file = files[i]

    var imageType = /image.*/

    if(!file.type.match(imageType)){

      console.log("Not an Image");

      continue;

    }



    var image = document.createElement("img");

    // image.classList.add("")

    var thumbnail = document.getElementById("thumbnail");

    image.file = file;

    thumbnail.appendChild(image)



    var reader = new FileReader()

    reader.onload = (function(aImg){

      return function(e){

        aImg.src = e.target.result;

      };

    }(image))

    var ret = reader.readAsDataURL(file);

    var canvas = document.createElement("canvas");

    ctx = canvas.getContext("2d");

    image.onload= function(){

      ctx.drawImage(image,100,100)

    }

  }

}

          });

	
	function delete_annonce(isFromPanel){
		if(typeof(isFromPanel)!="undefined"){target = "notPanel";}	//si on vient pas du panel de gestion
		else								{target = "delete";}//si on est dans la suppresion des annonces actives (admin) ou propre à l'utilisateur
		ids = "";
		
		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)

		{
			$.ajax({
			  url:"index.php?d=annonces&a=select_annonce",
			  type : "GET",
			  data: {target:target},
			  success: function (rep)
			 {
				array=rep.split(',');
				
				for(i=0;i<(array.length-1);i++)
				{
					if(document.getElementById(array[i])!==null)
						{
							if(document.getElementById(array[i]).classList.contains("is-selected")==true)
							{
								ids=ids+array[i]+";";
							}
						}
				}
				$.ajax({
				  url:"index.php?d=annonces&a=validation_suppression_annonce",
				  type : "GET",
				  data: {ids:ids,target:target},
				  success: function (rep)
				 {
					location.reload();
				 }	
				 });
			 }	
			 });
		}	
	}	


	function delete_notifications(){

		ids=" ";

		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)

		{

			$.ajax({

			  url:"index.php?d=administrateur&a=select_compte",

			  type : "GET",

			  success: function (rep)

			 {

				array=rep.split(',');

				

				for(i=0;i<(array.length-1);i++)

				{

					if(document.getElementById(array[i]).classList.contains("is-selected")==true)

					{

						ids=ids+array[i]+";";

					}

				}

				$.ajax({

				  url:"index.php?d=administrateur&a=supprimer",

				  type : "GET",

				  data: {ids:ids},

				  success: function (rep)

				 {

					 location.reload();

				 }	

				 });

			

			 }	

			 });	

			

		}	

	}
	
	
	function annonce_select_marque()
	{
		var id_marque = document.getElementById("marque").value;
		$.ajax({

		  url:"index.php?d=annonces&a=select_marque",

		  type : "POST",

		  data: {id_marque:id_marque},

		  success: function (rep)

		 {
			var retour = "<option value='-2'>Sélectionnez un modèle</option>" + rep;
			document.getElementById("modele").innerHTML = retour;
			if(id_marque = -2)
			{
				document.getElementById("taille").innerHTML = "<option value='-2'>Sélectionnez la taille</option>";
			}
		 }	

		 });
		
	}
	
	function annonce_select_modele()
	{
		var id_modele = document.getElementById("modele").value;
		$.ajax({

		  url:"index.php?d=annonces&a=select_modele",

		  type : "POST",

		  data: {id_modele:id_modele},

		  success: function (rep)

		 {
			var retour = "<option value='-2'>Sélectionnez la taille</option>" + rep;
			document.getElementById("taille").innerHTML = retour;
		 }	

		 });
		
	}
	
	function choixRegion(id){
		document.getElementById("selRegion").value=id;
	}
	
	function afficherSuivi(){
		
		function insererBr(str, index, value) {
		    return str.substr(0, index) + value + str.substr(index);
		}
		
		function trouverEspace(actualIndex,myString){
			var i = actualIndex;
			while(myString[i]!=" "){
				i--;
			}
			return i;
		}
			
		function formaterString(myString){
			var actualIndex=40;
			while(actualIndex<myString.length){
				i = trouverEspace(actualIndex,myString);
				myString=insererBr(myString,i,"<br/>");
				actualIndex=i+40;
			}			
			return myString;
		}
		var id_select = document.getElementById("select_suivi").value;
		if(id_select!=-2){
			
			//On rend visible les champs
			document.getElementById("controle").style.visibility = "visible";
			document.getElementById("champsSuivi").style.visibility = "visible";
			
			//On récupère les données du suivi
			$.ajax({
				 url:"index.php?d=operateur&a=recuperer_suivi",
				 type : "POST",
				 data: {id_select:id_select},
				 success: function (rep)
				 {
					tableau=rep.split(',');
					document.getElementById("id").innerHTML = id_select;
					document.getElementById("date_ouverture").innerHTML = tableau[0];
					document.getElementById("commentaire").innerHTML = formaterString(tableau[1]);
					document.getElementById("statut").innerHTML = tableau[2];
					document.getElementById("operateur").innerHTML = tableau[3];
				 }	

			});
			
			//On récupère les évènements liés au suivi
			$.ajax({
				  url:"index.php?d=operateur&a=recuperer_evenements_suivi",
				  type : "POST",
				  data: {id_select:id_select},
				  success: function (rep)
				  {
					  tableau=rep.split(',');
					  tableau_suivi =	'<h5 class="animated fade-in">Évènements du suivi</h5>'+
						  				'<table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">'+
											'<thead>'+
												'<tr>'+
											  		'<th class="mdl-data-table__cell--non-numeric">commentaire</th>'+
											  		'<th class="mdl-data-table__cell--non-numeric">date</th>'+
											  		'<th class="mdl-data-table__cell--non-numeric">opérateur</th>'+
												'</tr>'+
											'</thead>'+
											'<tbody>';												
					  for(var i=0;i<(tableau.length)-1;i++){
						  if(i%3==0){
							  tableau_suivi+='<tr>'+
												'<td class="mdl-data-table__cell--non-numeric">'+formaterString(tableau[i])+'</td>';
						  }
						  else if(i%3==1){
							  tableau_suivi+='<td class="mdl-data-table__cell--non-numeric">'+tableau[i]+'</td>';
						  }
						  else{
							  tableau_suivi+='<td class="mdl-data-table__cell--non-numeric">'+tableau[i]+'</td>'+
							  				'</tr>';
						  }
					  }
					  tableau_suivi+= '</tbody></table>';
					  tableau_suivi+='<div class="mdl-textfield mdl-js-textfield">'+
										'<textarea class="mdl-textfield__input" type="text" maxlength="200" rows= "8" id="nouveau_commentaire" name="nouveau_commentaire"></textarea>'+
										'<label class="mdl-textfield__label" for="sample5">Commentaire</label>'+
									'</div><br/><br/>'+
									'<button onclick="gestionSuivi(\'ajout_evenement\')" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored"  style="margin-bottom:40px;">'+
									'Ajouter un nouvel évènement'+
									'</button>';
					  //on va passer deux strings pour savoir si c'est une cloturation ou un ajout d'évènement
					  $("#tableau_evenement").html(tableau_suivi);
				  }	

			});
			//On checke l'existence d'un fichier xml portant le nom du suivi pour choisir l'intitulé du bouton
			$.ajax({
				 url:"index.php?d=operateur&a=fichier_existe",
				 type : "POST",
				 data: {id_suivi:id_select},
				 success: function (rep)
				 {
					if(rep==1)	{document.getElementById("controle").innerHTML = "Modification du contrôle";}
					else		{document.getElementById("controle").innerHTML = "Création du contrôle";}
				 }	

			});
		}
		else
		{
			document.getElementById("controle").style.visibility = "hidden";
			document.getElementById("champsSuivi").style.visibility = "hidden";
			document.getElementById("id").innerHTML = "";
			document.getElementById("date_ouverture").innerHTML = "";
			document.getElementById("commentaire").innerHTML = "";
			document.getElementById("statut").innerHTML = "";
			document.getElementById("operateur").innerHTML = "";
			$("#tableau_evenement").html("");
			
		}
	}
	function gestionSuivi(type){
		if(type=="ajout_evenement"){
			commentaire = document.getElementById("nouveau_commentaire").value;
			id = document.getElementById("select_suivi").value;
			if(commentaire!=""){
				$.ajax({
					 url:"index.php?d=operateur&a=ajouter_evenement_suivi",
					 type : "POST",
					 data: {commentaire:commentaire,id:id},
					 success: function (rep)
					 {
						location.href="index.php?d=operateur&a=suivi";
					 }	
	
				});
			}
		}
		else{
			id_suivi = document.getElementById("select_suivi").value;
			commentaire = document.getElementById("commentaire_suivi").value;
			statut = document.getElementById("statut_suivi").value;
			$.ajax({
				 url:"index.php?d=operateur&a=modifier_suivi",
				 type : "POST",
				 data: {id_suivi:id_suivi,commentaire:commentaire,statut:statut},
				 success: function (rep)
				 {
					location.href="index.php?d=operateur&a=suivi";
				 }	

			});
		}
	}
	function redimensionnement()
	{
		//alert("appel");
		var nbtaille= document.getElementById('nbtaile').value;
		
		
		var wid=100/nbtaille;

		var  table="<table class='mdl-data-table' style='margin:auto;'>";

		
		//alert(nbtaille);
		for(i=1;i<=nbtaille;i++)

		{

			table=table+"<th width='"+wid+"%'>taille"+i+"</th>";

		}

		table=table+"</tr><tr> ";
		//alert("premier for");
		
		
		for(i=1; i<=nbtaille;i++)
		{

			table=table+ '<td style=" width:'+wid+'%">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+

						'<input name="taille'+i+'" style=" width:100%" class="mdl-textfield__input" type="text" id="taille'+i+'">'+

						'<label style=" width:100%" class="mdl-textfield__label" for="taille'+i+'"></label>'+

						'</div>'+'</td>';

		}
		table=table+"  </tr> </table>";
		//alert("second for");
		document.getElementById("taile").innerHTML = "";
		//alert(table);
		$(".taile").append(table);
		//alert('fin');
	}
	function revelerChamps(myChar){
		if(myChar=="p"){
			document.getElementById("select_suivi").style.visibility = "visible";
			document.getElementById("titre").style.visibility = "visible";
			document.getElementById("table").style.visibility = "visible";
		}
	}
