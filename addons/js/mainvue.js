
	function affichvoile()
	{
		var voile=document.getElementById("voileart").value;
		alert(voile);
		$.ajax({
			
			url:"modele/Forme/recupVoile.php",
			data:{id:voile},
			type : "POST",
			success :function(rep)
			{
				alert(rep);
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
				alert("test");
				var table;
				var wid=100/reponce[2];
				table="<table class='mdl-data-table' style='margin:auto;'>";
				alert("test2");
				for(i=1;i<reponce[2];i++)
				{
					table=table+"<th width='"+wid+"%'>taille"+i+"</th>";
				}
				table=table+"</tr><tr> ";
				alert("test3");
				for(i=1; i<=nb;i++)
				{
					table=table+ '<td style=" width:'+wid+'%">'+'<div style="width:100%;" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
								'<input name="taille'+i+'" style=" width:100%" class="mdl-textfield__input" type="text" id="taille'+i+'">'+
								'<label style=" width:100%" class="mdl-textfield__label" for="taille'+i+'"></label>'+
								'</div>'+'</td>';
				}
				table=table+"  </tr> </table>";
				document.getElementById("taile").innerHTML = "";
				alert("test4");
				$(".taile").append(table);
				alert("testfin");
			}
			});
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
				tabl=tabl+"<th style='width:'"+wid+"px;'>ref"+i+"</th>";
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
			$(".valeur_taille").append(tabl);
			
			var tabl2="";
			tabl2="<h6> Longueur des suspentes par ref�rence et par taille </h6>"+
			"<table border='1'> <tr>"+
			"<th width='"+wid+"px'> taille </th>";
			for(i=1; i<=nb;i++)
			{
				tabl2=tabl2+"<th width='45px'> ru"+i+"</th>";
			}
				
			
			tabl2=tabl2+"</tr><tr> ";
			
			for(j=1;j<=nbSuspente;j++)
			{
				tabl2=tabl2+"<th width='"+wid+"px'> taille"+j+" </th>";
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
			document.getElementById('longerSuspente').innerHTML = "";
			wid= 15;
			$(".longerSuspente").append(tabl2);
			$.ajax({
			url:"modele/Forme/recupMaterial.php",
			success :function(rep)
			{
				
				var tabl3="";
				tabl3="<h6> listes des mat�riaux de la suspentes </h6>"+
				"<table border='1'> <tr>"+
				"<th width='60px'> taille </th>";
				for(i=1; i<=nb;i++)
				{
					tabl3=tabl3+"<th width='"+wid+"px'>suspentes"+i+"</th>";
				}
					
				
				tabl3=tabl3+"</tr><tr> ";
				
				for(j=1;j<=nbSuspente;j++)
				{
					tabl3=tabl3+"<th width='"+wid+"px'> taille"+j+" </th>";
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
				$(".materiauxSuspente").append(tabl3);
				
			}
			});
			var bouton="";
			bouton= '<br />'+
					'<center>'+
					'<button type="submit" name="submit"class="mdl-button mdl-js-button mdl-button--raised" >'+
					'valider  tout les donne� rentr�e  '+
					'</button>'+
					'</center>';
			document.getElementById('boutons').innerHTML = "";
			$(".boutons").append(bouton);
	}
	function affich() {
		
		var x  = document.getElementById("client").value;
		// rend  tout les id  hidden 
		if(x<0)
		{
			for (i=1;i<=12;i++)
			{
				document.getElementById(i).style.visibility='hidden';
			}
			document.getElementById("validation").style.visibility='hidden';
			document.getElementById("start").style.visibility='hidden';
			document.getElementById("affichage").style.visibility='hidden';
		}
		else
		{
			// rend  tout les id vissible  
			if(document.getElementById("affichage").style.visibility==='hidden')
			{
				document.getElementById("validation").style.visibility='visible';
				document.getElementById("start").style.visibility='visible';
				document.getElementById("affichage").style.visibility='visible';
				for (i=1;i<=12;i++)
				{
					document.getElementById(i).style.visibility='visible';
				}
			}
			
			$.ajax({
			url:"modele/Forme/showUser.php",
			data :{id:x},
			type : "POST",
			success :function(rep)	
			{
				// rempli les casse afficher par les valeur renvoiller du fichier php 
				var email = rep.split(',');
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
		 var password = document.getElementById("password_adm").value;
		 var verification = document.getElementById("verification_adm").value;
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
		 // transfaire les donner  pour pouvoir utiliser dans du php requete sql
		 $.ajax({
		  url:"modele/Forme/updateAdm.php",
		  type : "GET",
		  data:  {id:x,
				  email:email,
				  password:password,
				  verification:verification,
				  rue_exp:rue_exp,
				  ville_exp:ville_exp,
				  code_postal_exp:code_postal_exp,
				  rue_fac:rue_fac,
				  ville_fac:ville_fac,
				  code_postal_fac:code_postal_fac,
				  activation:activation,
				  prenom:prenom,
				  nom:nom,
				  telephone:telephone
		  },
		  success: function (rep)
		 {
			alert("Modifications effectu�es.");
		 }	
		 });
	}
	
	function activate(){
		ids=" ";
		if(confirm("�tes-vous s�r de vouloir continuer ?")==true)
		{
			$.ajax({
			  url:"modele/Forme/selectAdm.php",
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
				  url:"modele/Forme/activate.php",
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
		function delete_annonce(){		var ids="";		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)		{						var val=0;				var element = document.getElementById(val);				var images = [];				while(element !=null)				{					val++;					if(element.parentElement.classList.contains("is-selected")==true){images.push(element.innerHTML);}					element = document.getElementById(val);				}				$.ajax({				  url:"modele/delete_annonce.php",				  type : "GET",				  data: {tab:images},				  success: function (rep)				 {					 location.reload();				 }					 });						}		}	
	function delete_notifications(){
		ids=" ";
		if(confirm("Êtes-vous sûr de vouloir continuer ?")==true)
		{
			$.ajax({
			  url:"modele/Forme/selectAdm.php",
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
				  url:"modele/Forme/delete_notifications.php",
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