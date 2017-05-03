<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="modele/modelisation/css/bootstrap.min.css">			<!--	CSS POUR PLUSIEURS ELEMENTS		!-->
		<link rel="stylesheet" type="text/css" href="modele/modelisation/css/cpicker.css">				<!--	CSS POUR COLOPICKERS	!-->
		<link rel="stylesheet" type="text/css" href="modele/modelisation/css/range.css">					<!--	CSS POUR LE SLIDER RANGE	!-->
		<link rel="stylesheet" type="text/css" href="modele/modelisation/css/slider.css">				<!--	CSS POUR LE SLIDER DU BAS	!-->
		<link rel="stylesheet" type="text/css" href="modele/modelisation/css/myStyle.css">
		<title>Ailipse - Voile de parapente</title>
		<style>
			::-webkit-scrollbar{
				display:none;
			}
			html, body {
				width: 100%;
				height: 100%;
				margin: 0;
				padding: 0;
				overflow: hidden;								font-family: 'Roboto';
			}
			main{
				overflow:hidden !important;
			}

			#renderCanvas {
				width: 100%;
				height: 100%;
				margin: 0;
				padding: 0;
				touch-action: none;
			}
		</style>
		<script src="modele/modelisation/js/babylon.2.4.js"></script>				<!--	FRAMEWORK	!-->
		<!--<script src="js/hand-1.3.7.js"></script>!-->
		<!--<script src="js/oimo.js"></script>!-->
		<script src="modele/modelisation/js/jquery-3.1.1.js"></script>				<!--	JQUERY		!-->
		<script src="modele/modelisation/js/bootbox.min.js"></script>				<!--	JAVASCRIPT POUR NOTRE ALERT		!-->
		<script src="modele/modelisation/js/bootstrap.min.js"></script>				<!--	JAVASCRIPT POUR BOUTONS		!-->
		<!--<script src="js/cannon.js"></script>!-->
		<script src="modele/modelisation/js/cpicker.js"></script>					<!--	JAVASCRIPT POUR COLORPICKERS	!-->
	</head>
	<body>
		<canvas id="renderCanvas"></canvas>   
		<script type="text/javascript">  
			//BOUTONS CAMERA //////////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<button id="bFace" class="salut mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 1.2%; top: 2.4%; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de face</button>');
			$('.demo-content').append('<button id="bArriere" class="salut mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 1.2%; top: 7.4%; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue arrière</button>');
			$('.demo-content').append('<button id="bDroite" class="salut mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 1.2%; top: 12.4%; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de droite</button>');
			$('.demo-content').append('<button id="bGauche" class="salut mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 1.2%; top: 17.4%; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de gauche</button>');

			//BOUTON AIDE /////////////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<button id="bControles" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="position: absolute; left: 1.2%; top: 22.4%; width:140px; z-index:1; background-color: #2196F3; ">COMMANDES</button>');

			//COLOR PICKER ////////////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="bgColor" style="position: absolute; left: 1.2%;  top:27.4%; width:160px; z-index:1;">Couleur de Fond</label><input type="text" id="bgColor" value="rgb(255, 255, 255)" style="position: absolute; left: 1.2%;  top:30%; width:140px; z-index:1;"/></div></div>');  		
			$('.demo-content').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="constructeurColor" style="position: absolute; left: 1.2%; top:32.4%; width:160px;z-index:1;">Voile constructeur</label><input type="text" id="constructeurColor" value="rgb(255, 255, 255)" style="position: absolute; left: 1.2%;  top:35%; width:140px; z-index:1;"/></div></div>');  
			$('.demo-content').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="clientColor" style="position: absolute; left: 1.2%;  top:37.4%; width:160px;z-index:1;">Votre voile</label><input type="text" id="clientColor" value="rgb(255, 74, 25)" style="position: absolute; left: 1.2%;  top:40%; width:140px; z-index:1;"/></div></div>');  

			//BOUTON ACTUALISATION ////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<button id="bActualiser" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 1.2%; top: 55.3%; width:140px; z-index:1; background-color: #2196F3; color:#FFFFFF;">ACTUALISER</button>');

			//RANGE SLIDER ////////////////////////////////////////////////////////////////////////////////////////////////
			$('body').append('<input type="range" oninput="setScale(this.value)" class="mdl-slider mdl-js-slider" id="scaleDiff" name="range" value="1" max="30" min="1" step="1" style="position: absolute; left: 240px; top: 505px; width:140px; z-index:1; background-color:rgb(96,125,139); "><div class="NiceForm" style="margin-t2op: 100px"><label for="scaleDiff" style="position: absolute; left: 260px; top: 475px; width:300px; z-index:1;">Échelle différence</label></div>');

			//SLIDER TABLEAUX /////////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<input class="sr-only" style="top:100px;" id="aside-ctrl" type="checkbox" /><label class="aside-ctrl--reset" for="aside-ctrl"></label><aside class="aside" id="aside"><label class="aside-ctrl--label" for="aside-ctrl"></label></aside>');

			//DIFFERENTS CONTROLES ////////////////////////////////////////////////////////////////////////////////////////
			$('.demo-content').append('<div class="bControles" style="position: absolute; right: 1.2%; top: 2.4%; z-index: 1;"><button type="button" id="btnControles" data-toggle="dropdown" >CONTRÔLES ▼</button><ul id="listControles" class="dropdown-menu" role="menu"></ul></div>');

			//Zone de l'application 
			var canvas = document.querySelector("#renderCanvas");

			//On charge le framework
			var engine = new BABYLON.Engine(canvas, true); 
      
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//                                     		LES FONCTIONS                                                 	 //
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
			//Affiche les lignes de suspentes sélectionnées dans les tableaux contenus dans le slider du bas
			function showLines(){
				var ids = [];
				var arrayID = ['LA','LB','LC','LD','RA','RB','RC','RD'];
				tube.forEach(function(element){
					element.dispose();
				});
				tube = [];
				ribbonMap.clear();
				ribbonMap.set("RA",RPathA);
				ribbonMap.set("RB",RPathB);
				ribbonMap.set("RC",RPathC);
				ribbonMap.set("RD",RPathD);
				ribbonMap.set("LA",LPathA);
				ribbonMap.set("LB",LPathB);
				ribbonMap.set("LC",LPathC);
				ribbonMap.set("LD",LPathD);
				arrayID.forEach(function(element){
					if(document.getElementById(element).classList.contains("is-selected")==true)
					{
						ids.push(element);
					}		  
				});
				ids.forEach(function(element){
					tube.push(new BABYLON.MeshBuilder.CreateTube("tube", {path: ribbonMap.get(element),radius:1.5}, scene));
				});
				tube.forEach(function(element){
					element.material = tubeMat;
				});
			}
	  
			//Réadapte l'affichage en fonction de l'échelle demandée
			function setScale(newScale){
				ribbonClientR.dispose();
				ribbonClientR = getRibbon(newScale, RclientTab, false, alpha, nb_suspente, coeff, scene);
				ribbonClientR.material = matC;
				ribbonClientL.dispose();
				ribbonClientL = getRibbon(newScale, LclientTab, true, alpha, nb_suspente, coeff, scene);
				ribbonClientL.material = matC;
				showLines();
			}
	  
			//Change la couleur de fond, pour une couleur donnée
			function setBgColor(layer,stringColor){
				var color = getColor(stringColor);
				layer.color = new BABYLON.Color4(color[0]/255,color[1]/255,color[2]/255,1);
			}
	  
			//Change la couleur du material passé en argument par la couleur donnée
			function setMaterialColor(material,stringColor){
				var color = getColor(stringColor);
				material.ambientColor = new BABYLON.Color3(color[0]/255,color[1]/255,color[2]/255);		  
				material.alpha = color[3];  
			}
	  
			//Retourne un ribbon correspondant à un côté de la voile
			function getRibbon(stringScale, clientTab, sideLeft, alpha, nb_suspente, coeff, scene){
				if (sideLeft == true)
				{
					LPathA = [];	LPathB = [];	LPathC = [];	LPathD = [];
					for(var i = 0; i < nb_suspente; i++)
					{
						LPathA.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[0][i]*stringScale)*coeff,(1300-(30*i))*coeff));
						LPathB.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[1][i]*stringScale)*coeff,(400-(15*i))*coeff));
						LPathC.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[2][i]*stringScale)*coeff,(-400+(15*i))*coeff));
						LPathD.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[3][i]*stringScale)*coeff,(-1300+(30*i))*coeff));
					}
					return BABYLON.MeshBuilder.CreateRibbon("ff", {pathArray : [LPathA, LPathB, LPathC, LPathD]},scene);
				}
				else
				{
					RPathA = [];	RPathB = [];	RPathC = [];	RPathD = [];
					for(var i = 0; i < nb_suspente; i++)
					{
						RPathA.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[0][i]*stringScale)*coeff,(1300-(30*i))*coeff));
						RPathB.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[1][i]*stringScale)*coeff,(400-(15*i))*coeff));
						RPathC.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[2][i]*stringScale)*coeff,(-400+(15*i))*coeff));
						RPathD.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[3][i]*stringScale)*coeff,(-1300+(30*i))*coeff));
					}
					return BABYLON.MeshBuilder.CreateRibbon("ff", {pathArray : [RPathA, RPathB, RPathC, RPathD]},scene);
				}
			}
	  
			//Retourne un tableau contenant les informations de la couleur passée en argument
			function getColor(stringColor){
				var res = stringColor.split(',');
				var red =  res[0].split('(');
				var green = res[1]
				if(res.length==4){
					var blue = res[2];
					var alpha = res[3].split(')');
					var color = [red[1],green,blue,alpha[0]];
				}
				else{
					var blue = res[2].split(')');
					var color = [red[1],green,blue[0],1];
				}		
				return color;
			}
			
			
			
			//Récupère les dates des différents controles et les ajoute dans le bouton
			function getDates(){
				var dir = "modele/modelisation/XML";
				var fileextension = ".xml";
				$.ajax({					
					url: dir,
					success: function (data) {
						//Récupère tous les noms de fichiers présent
						$(data).find("a:contains(" + fileextension + ")").each(function () {
							if(this.href.indexOf('www.')!=-1)
							{
								var filename = this.href.replace("http://www.ailipse-technique.fr/beta/ailipse/", "").replace(".xml", "");
							}
							else{
								var filename = this.href.replace("http://ailipse-technique.fr/beta/ailipse/", "").replace(".xml", "");
							}
							var div = document.getElementById('listControles');
							div.innerHTML = div.innerHTML + '<li id="'+filename+'" onclick="actVoile(this.id)">' + filename + '</li>';
						});
					}
				});
			}
			
			//Actualise les données en fonction de la voile clickée
			function actVoile(id){
				var selControle = (id);
				getMesuresRight(selControle);
				getMesuresLeft(selControle);				
			}
				
			//Récupère les mesures des différences du côté droit et les ajoute aux tableaux en fonction du contrôle sélectionné
			function getMesuresRight(selControle){
				RclientTab = [];				
				if(selControle=="")
				{
					selControle = "AZERTY";
				}
				var request = new XMLHttpRequest();
				request.open("GET", "modele/modelisation/XML/"+selControle+".xml", false);
				request.send();				
				
				var xml = request.responseXML;
				var controle = xml.getElementById(selControle);
				var AR = controle.getElementsByTagName("AR");
				var BR = controle.getElementsByTagName("BR");
				var CR = controle.getElementsByTagName("CR");
				var DR = controle.getElementsByTagName("DR");
				var CRTabA = [];
				var CRTabB = [];
				var CRTabC = [];
				var CRTabD = [];
				for(var j = 0; j < AR.length; j++) {
					CRTabA.push(AR[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < BR.length; j++) {
					CRTabB.push(BR[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < CR.length; j++) {
					CRTabC.push(CR[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < DR.length; j++) {
					CRTabD.push(DR[j].childNodes[0].nodeValue);
				}
				RclientTab = [CRTabA, CRTabB, CRTabC, CRTabD];
			}
			
			//Récupère les mesures des différences du côté gauche et les ajoute aux tableaux en fonction du contrôle sélectionné et actualise l'échelle et le slider
			function getMesuresLeft(selControle){
				LclientTab = [];
				if(selControle=="")
				{
					selControle = "AZERTY";
				}
				var request = new XMLHttpRequest();
				request.open("GET", "modele/modelisation/XML/"+selControle+".xml", false);
				request.send();			
				
				var xml = request.responseXML;
				var controle = xml.getElementById(selControle);
				var AL = controle.getElementsByTagName("AL");
				var BL = controle.getElementsByTagName("BL");
				var CL = controle.getElementsByTagName("CL");
				var DL = controle.getElementsByTagName("DL");
				var CLTabA = [];
				var CLTabB = [];
				var CLTabC = [];
				var CLTabD = [];
				for(var j = 0; j < AL.length; j++) {
					CLTabA.push(AL[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < BL.length; j++) {
					CLTabB.push(BL[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < CL.length; j++) {
					CLTabC.push(CL[j].childNodes[0].nodeValue);
				}
				for(var j = 0; j < DL.length; j++) {
					CLTabD.push(DL[j].childNodes[0].nodeValue);
				}
				LclientTab = [CLTabA, CLTabB, CLTabC, CLTabD];
				if (typeof ribbonClientR !== 'undefined' && typeof ribbonClientL !== 'undefined') {
					setScale(1);
					document.getElementById("scaleDiff").value = 1;
					updateArray();
				}
			}
						
			//Actualise les valeurs des tableaux
			function updateArray(){
				for(var i in RclientTab){
					switch(i){
						case "0":
							preId = "RA";
						break;
						case "1":
							preId = "RB";
						break;
						case "2":
							preId = "RC";
						break;
						case "3":
							preId = "RD";
						break;
						default:
						break;
					}
					for(var j in RclientTab[i]){
						document.getElementById(preId+j).innerHTML = RclientTab[i][j];
					}
				}
				for(var i in LclientTab){
					switch(i){
						case "0":
							preId = "LA";
						break;
						case "1":
							preId = "LB";
						break;
						case "2":
							preId = "LC";
						break;
						case "3":
							preId = "LD";
						break;
						default:
						break;
					}
					for(var j in LclientTab[i]){
						document.getElementById(preId+j).innerHTML = LclientTab[i][j];
					}
				}			
			}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//                                     		FIN FONCTIONS                                              	     //
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  
	  
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//              VARIABLES GLOBALES UTILISABLES DANS LES FONCTIONS SANS LES PASSER EN PARAMÈTRES              //
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//Récupération des dates de controles
			getDates();
			
			scene = new BABYLON.Scene(engine);		//Super objet qui englobe tout les éléments que l'on créera dans createScene								
			coeff = 0.05;							//Mise à l'échelle de la voile pour des questions d'affichage
			alpha = 0.07;							//Angle en radiant utilisé pour construire la voile
			nb_suspente = 12;						//Nombre de points par lignes de suspentes
			RclientTab = [];	LclientTab = [];	//Tableau de tableaux de points pour la construction de la voile client
			getMesuresRight("");
			getMesuresLeft("");
			ribbonMap = new Map();					//Map pour faciliter la correspondance entre un id sélectionné(html) et une suspente
			tube = [];								//Tableau contenant tout les objets tube
			RPathA = [];		LPathA = [];		//Tableaux de points nécessaires à la création d'un objet ribbon
			RPathB = [];		LPathB = [];
			RPathC = [];		LPathC = [];
			RPathD = [];		LPathD = [];
					 
			//Construction des matières
			constructeurMat = new BABYLON.StandardMaterial("constructeurMat", scene);
			constructeurMat.ambientColor = new BABYLON.Color3(1, 1, 1);
			constructeurMat.diffuseTexture = new BABYLON.Texture("modele/modelisation/img/logo.png", scene);
			constructeurMat.backFaceCulling = false;
			constructeurMat.wireframe = false ;

			matC = new BABYLON.StandardMaterial("matC", scene);
			matC.ambientColor = new BABYLON.Color3(1, 0.29, 0.1);
			matC.backFaceCulling = false;
			matC.wireframe = true;

			tubeMat = new BABYLON.StandardMaterial("tubeMat", scene);
			tubeMat.ambientColor = new BABYLON.Color3(0, 1, 0.33);
			tubeMat.backFaceCulling = false;
			
		 
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//              							FIN VARIABLES GLOBALES     								         //
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////

			 
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//              							FONCTION PRINCIPALE	     								         //
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			//Tableau gauche
			var leftTable = '<table onchange="showLines()" style="position:absolute; table-layout:fixed;  top:0px; width:50%; z-index:1;" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-data-table__header--sorted-ascending"><thead><th class="mdl-data-table__cell--non-numeric" style="border:none; width:65px;">Gauche</th>';
			for(var i=0;i<nb_suspente;i++)
			{
				leftTable+= '<th class="mdl-data-table">' + (i+1) + "</th>";
			}
			leftTable+="</thead>";
			for(var i in LclientTab)
			{
				var preId = "";
				switch(i){
					case "0":
						leftTable+="<tr id='LA'><td class='mdl-data-table__cell--non-numeric'>A</td>";
						preId = "LA";
					break;
					case "1":
						leftTable+="<tr id='LB'><td class='mdl-data-table__cell--non-numeric'>B</td>";
						preId = "LB";
					break;
					case "2":
						leftTable+="<tr id='LC'><td class='mdl-data-table__cell--non-numeric'>C</td>";
						preId = "LC";
					break;
					case "3":
						leftTable+="<tr id='LD'><td class='mdl-data-table__cell--non-numeric'>D</td>";
						preId = "LD";
					break;
					default:
					break;
				}
				for(var j in LclientTab[i])
				{
					leftTable+="<td id="+preId+j+" class='mdl-data-table--selectable'>" + LclientTab[i][j] + "</td>";
				}
				leftTable+="</tr>";
			}
			leftTable+="</table>";
			document.getElementById("aside").innerHTML = '<label class="aside-ctrl--label" for="aside-ctrl"></label>';
			$('aside').append(leftTable);	//on ajoute le tableau créé à la page

		
			//Tableau droit
			var rightTable = '<table onchange="showLines()" style=" position:relative; table-layout:fixed; top:0px;  left:50%; width:50%; z-index:1;" class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-data-table__header--sorted-ascending"><thead><th class="mdl-data-table__cell--non-numeric" style="border:none; width:62px;">Droite</th>';
			for(var i=0;i<nb_suspente;i++)
			{
				rightTable+= '<th class="mdl-data-table">' + (i+1) + "</th>";
			}
			rightTable+="</thead>";
			for(var i in RclientTab)
			{
				var preId = "";
				switch(i){
					case "0":
						rightTable+="<tr id='RA'><td class='mdl-data-table__cell--non-numeric'>A</td>";
						preId = "RA";
					break;
					case "1":
						rightTable+="<tr id='RB'><td class='mdl-data-table__cell--non-numeric'>B</td>";
						preId = "RB";
					break;
					case "2":
						rightTable+="<tr id='RC'><td class='mdl-data-table__cell--non-numeric'>C</td>";
						preId = "RC";
					break;
					case "3":
						rightTable+="<tr id='RD'><td class='mdl-data-table__cell--non-numeric'>D</td>";
						preId = "RD";
					break;
					default:
					break;

				}
				for(var j in RclientTab[i])
				{
					rightTable+="<td id="+preId+j+" class='mdl-data-table--selectable'>" + RclientTab[i][j] + "</td>";
				}
				rightTable+="</tr>";
			}
			rightTable+="</table>";
			$('aside').append(rightTable);
			
			//Création de la scène
			var createScene = function () {
         
				//On applique une lumière ambiente pour que les matières soient éclairés et non pas noires
				scene.ambientColor = new BABYLON.Color3(1, 1, 1);

				//Création d'une caméra nécessaire à l'observation de la scène
				var camera = new BABYLON.ArcRotateCamera("Camera", 3 * Math.PI / 2, Math.PI / 8, 800, new BABYLON.Vector3(0,300,0), scene);
				camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
				camera.attachControl(canvas, false);

				//On crée un layer pour mettre une image en fond en transparence
				var layer = new BABYLON.Layer("layer","modele/modelisation/img/3.png",scene,true);
		 
		 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              									VOILE USINE     								         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////  
				//Création des points nécessaires à la création de la voile
				for(var i = nb_suspente-1; i > 0; i--)
				{
					RPathA.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i))*coeff,(1300-(30*i))*coeff));
					RPathB.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i))*coeff,(400-(15*i))*coeff));
					RPathC.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i))*coeff,(-400+(15*i))*coeff));
					RPathD.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i))*coeff,(-1300+(30*i))*coeff));
				}
				for(var i = 0; i < nb_suspente; i++)
				{
					RPathA.push(new BABYLON.Vector3((7100)*Math.sin(alpha*i)*coeff,((7100)*Math.cos(alpha*i))*coeff,(1300-(30*i))*coeff));
					RPathB.push(new BABYLON.Vector3((7100)*Math.sin(alpha*i)*coeff,((7100)*Math.cos(alpha*i))*coeff,(400-(15*i))*coeff));
					RPathC.push(new BABYLON.Vector3((7100)*Math.sin(alpha*i)*coeff,((7100)*Math.cos(alpha*i))*coeff,(-400+(15*i))*coeff));
					RPathD.push(new BABYLON.Vector3((7100)*Math.sin(alpha*i)*coeff,((7100)*Math.cos(alpha*i))*coeff,(-1300+(30*i))*coeff));
				}
		 
				//L'objet ribbon correspond à la voile, on y applique une matière
				var ribbon = BABYLON.MeshBuilder.CreateRibbon("ribbonConstr", {pathArray : [RPathA, RPathB, RPathC, RPathD]}, scene);
				ribbon.material = constructeurMat;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              								FIN VOILE USINE     								         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////		 
		 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              								VOILE CLIENT	     								         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				ribbonClientR = getRibbon(document.getElementById("scaleDiff").value, RclientTab, false, alpha, nb_suspente, coeff, scene);
				ribbonClientR.material = matC;

				ribbonClientL = getRibbon(document.getElementById("scaleDiff").value, LclientTab, true, alpha, nb_suspente, coeff, scene);
				ribbonClientL.material = matC;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              							  FIN VOILE CLIENT	     								         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				 				 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              						GESTION DES CLICKS SUR BOUTONS      						         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//On repositionne la caméra de manière à avoir la vue adéquate proposée
				$('#bFace').click(function () {
					camera.setPosition(new BABYLON.Vector3(0,400,-800));
					camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
				});

				$('#bArriere').click(function () {		
					camera.setPosition(new BABYLON.Vector3(0,400,800));
					camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
				})

				$('#bDroite').click(function () {		
					camera.setPosition(new BABYLON.Vector3(1000,200,0));
					camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
				})

				$('#bGauche').click(function () {		
					camera.setPosition(new BABYLON.Vector3(-1000,200,0));
					camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
				})
		
				//Aide à l'utilisation
				$('#bControles').click(function () {
					bootbox.alert({
						message:"<strong>MOLETTE SOURIS:</strong> Zoomer <br> <strong>CTRL + CLIC GAUCHE:</strong> Se déplacer latéralement <br><strong>CLIC GAUCHE APPUYÉ:</strong> Effectuer une rotation <br><strong>Échelle différence:</strong> Permet un agrandissement de la différence de mesure par rapport à la voile constructeur<br><br> Cette modélisation n'est qu'une représentation approximative de la voile, elle a pour but de représenter les déformations des voiles par rapport à leurs structures initiales."				
					}).find('.btn-primary').removeClass("btn-primary").addClass("mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent").css({'background-color':'#00BCD4', 'color' : '#FFFFFF'});
				})
		
				//Actualisation des couleurs
				$('#bActualiser').click(function () {
					setBgColor(layer,document.getElementById("bgColor").value);
					setMaterialColor(constructeurMat,document.getElementById("constructeurColor").value);
					setMaterialColor(matC,document.getElementById("clientColor").value);
					ribbonClientR.dispose();
					ribbonClientR = getRibbon(document.getElementById("scaleDiff").value, RclientTab, false, alpha, nb_suspente, coeff, scene);
					ribbonClientR.material = matC;
					ribbonClientL.dispose();
					ribbonClientL = getRibbon(document.getElementById("scaleDiff").value, LclientTab, true, alpha, nb_suspente, coeff, scene);
					ribbonClientL.material = matC;
				})
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//              						FIN GESTION DES CLICKS SUR BOUTONS     						         //
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		
				//On retourne la scene paramétrée
				return scene;
			};
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////
			//              							FIN FONCTION PRINCIPALE	     					    	         //
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////

			//on récupère la scène précédemment paramétrée
			scene = createScene();
	  
			//Boucle principale pour réafficher la scene
			engine.runRenderLoop(function () {
				scene.render();
			});
	  
			//On scrute un redimensionnement pour que le framework redimensionne le canvas si nécessaire
			window.addEventListener("resize", function () {
				engine.resize();
			});
		</script>
	</body>
</html>