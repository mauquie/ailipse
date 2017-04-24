<!doctype html>
<html>
<head>
   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="modele/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="modele/bootstrap-colorpicker.css">
   <link rel="stylesheet" type="text/css" href="modele/cpicker.css">
   <link rel="stylesheet" type="text/css" href="modele/mycss.css">
   <link rel="stylesheet" type="text/css" href="test.css">
   <title>Babylon - Voile de parapente</title>
   <style>
      html, body {
         overflow: hidden;
         width: 100%;
         height: 99.6%;
         margin: 0;
         padding: 0;
      }
      #renderCanvas {
         width: 100%;
         height: 99.6%;
         touch-action: none;
      }
   </style>
   <script src="modele/babylon.2.4.js"></script>
   <script src="modele/hand-1.3.7.js"></script>
   <script src="modele/oimo.js"></script>
   <script src="modele/jquery-3.1.1.js"></script>
   <script src="modele/bootbox.min.js"></script>
   <script src="modele/bootstrap.min.js"></script>
   <script src="modele/cannon.js"></script>   <!-- optional physics engine -->
   
</head>
<body>
   <canvas id="renderCanvas"></canvas>   
   <script type="text/javascript">  
	  //BOUTONS CAMERA //////////////////////////////////////////////////////////////////////////////////////////////
	  $('body').append('<button id="bFace" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 260px; top: 85px; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de face</button>');
	  $('body').append('<button id="bArriere" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 260px; top: 129px; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue arrière</button>');
	  $('body').append('<button id="bDroite" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 260px; top: 173px; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de droite</button>');
	  $('body').append('<button id="bGauche" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 260px; top: 217px; width:140px; z-index:1; background: rgb(96,125,139); color: rgb(255,255,255);">Vue de gauche</button>');
	  $('body').append('<button id="bControles" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="position: absolute; left: 260px; top: 261px; width:140px; z-index:1; background-color:#00BCD4; color:#37474F;">COMMANDES</button>');
	  $('body').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="bgColor" style="position: absolute; left: 260px;  top:345px; width:160px; z-index:1;">Couleur de Fond</label><input type="text" id="bgColor" value="rgb(255, 255, 255)" style="position: absolute; left: 260px;  top:365px; width:140px; z-index:1;"/></div></div>');  		
	  $('body').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="constructeurColor" style="position: absolute; left: 260px; top:425px; width:160px;z-index:1;">Voile constructeur</label><input type="text" id="constructeurColor" value="rgb(255, 255, 255)" style="position: absolute; left: 260px;  top:405px; width:140px; z-index:1;"/></div></div>');  
	  $('body').append('<div class="NiceForm" style="margin-t2op: 100px"><div><label for="clientColor" style="position: absolute; left: 260px;  top:385px; width:160px;z-index:1;">Votre voile</label><input type="text" id="clientColor" value="rgb(255, 74, 25)" style="position: absolute; left: 260px;  top:445px; width:140px; z-index:1;"/></div></div>');  
	  $('body').append('<button id="bActualiser" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="position: absolute; left: 260px; top: 555px; width:140px; z-index:1; background-color:#00BCD4; color:#37474F;">ACTUALISER</button>');
	  $('body').append('<input type="range" class="mdl-slider mdl-js-slider" id="scaleDiff" name="range" value="1" max="30" min="1" step="1" style="position: absolute; left: 240px; top: 505px; width:140px; z-index:1; background-color:rgb(96,125,139); "><div class="NiceForm" style="margin-t2op: 100px"><label for="scaleDiff" style="position: absolute; left: 260px; top: 475px; width:300px; z-index:1;">Échelle différence</label></div>');
	  $('body').append('<input class="sr-only" id="aside-ctrl" type="checkbox" checked="false"><label class="aside-ctrl--reset" for="aside-ctrl"></label><aside class="aside"><label class="aside-ctrl--label" for="aside-ctrl"></label></aside>');
	  
	  // Get the canvas element from our HTML below
      var canvas = document.querySelector("#renderCanvas");
      // Load the BABYLON 3D engine
      var engine = new BABYLON.Engine(canvas, true); 
	
      // -------------------------------------------------------------
      // Here begins a function that we will 'call' just after it's built
	  function setBgColor(layer,stringColor){
		  var color = getColor(stringColor);
		  layer.color = new BABYLON.Color4(color[0]/255,color[1]/255,color[2]/255,1);
	  }
	  function setMaterialColor(material,stringColor){
		  var color = getColor(stringColor);
		  material.ambientColor = new BABYLON.Color3(color[0]/255,color[1]/255,color[2]/255);		  
		  material.alpha = color[3];
		  
	  }
	  function getRibbon(stringScale, clientTab, sideLeft, alpha, nb_suspente, coeff, scene){
		  var PathA = [];
		  var PathB = [];
		  var PathC = [];
		  var PathD = [];
		  
		  if (sideLeft == true)
		  {
			for(var i = 0; i < nb_suspente; i++)
			{
				 PathA.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[0][i]*stringScale)*coeff,(1300-(30*i))*coeff));
				 PathB.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[1][i]*stringScale)*coeff,(400-(15*i))*coeff));
				 PathC.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[2][i]*stringScale)*coeff,(-400+(15*i))*coeff));
				 PathD.push(new BABYLON.Vector3(-1*((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[3][i]*stringScale)*coeff,(-1300+(30*i))*coeff));
			}
			
		  }
		  else
		  {
			for(var i = 0; i < nb_suspente; i++)
			{
				 PathA.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[0][i]*stringScale)*coeff,(1300-(30*i))*coeff));
				 PathB.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[1][i]*stringScale)*coeff,(400-(15*i))*coeff));
				 PathC.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[2][i]*stringScale)*coeff,(-400+(15*i))*coeff));
				 PathD.push(new BABYLON.Vector3(((7100)*Math.sin(alpha*i))*coeff,((7100)*Math.cos(alpha*i)+clientTab[3][i]*stringScale)*coeff,(-1300+(30*i))*coeff));
			}
		  }
		  return BABYLON.MeshBuilder.CreateRibbon("ff", {pathArray : [PathA, PathB, PathC, PathD]},scene);
	  }
	  
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
      var createScene = function () {
         // Now create a basic Babylon Scene object
         var scene = new BABYLON.Scene(engine);
         // Change the scene background color to green.
         scene.clearColor = new BABYLON.Color3(0.8, 0.8 ,0.8);
		 scene.ambientColor = new BABYLON.Color3(1, 1, 1);
         // This creates and positions a free camera
		 var camera = new BABYLON.ArcRotateCamera("Camera", 3 * Math.PI / 2, Math.PI / 8, 800, new BABYLON.Vector3(0,300,0), scene);
		 
		 var coeff = 0.05;	 
		 camera.attachControl(canvas, true);
         // This targets the camera to scene origin
         camera.setTarget(new BABYLON.Vector3(0,7100*coeff,0));
         // This attaches the camera to the canvas
         camera.attachControl(canvas, false);
         
		 // This creates a light, aiming 0,1,0 - to the sky.
         /*var light = new BABYLON.HemisphericLight("light1", new BABYLON.Vector3(0, 0, 0), scene);
         light.intensity = 1;
		 var light2 = new BABYLON.HemisphericLight("light2", new BABYLON.Vector3(0, 0, 0), scene);
         light2.intensity = 1;	*/	 
		 
		 var constructeurMat = new BABYLON.StandardMaterial("constructeurMat", scene);		 
		 constructeurMat.ambientColor = new BABYLON.Color3(1, 1, 1);
		 constructeurMat.diffuseTexture = new BABYLON.Texture("modele/img/logo.png", scene);
		 constructeurMat.backFaceCulling = false;
		 constructeurMat.wireframe = false ;
				 
		 var matC = new BABYLON.StandardMaterial("matC", scene);
		 matC.ambientColor = new BABYLON.Color3(1, 0.29, 0.1);
		 matC.backFaceCulling = false;
		 matC.wireframe = true;	 
		 		 
		 //ALGORITHME /////////////////////////////////////////////////////////////////////////////////////
		 var RPathA = [];		var LPathA = [];
		 var RPathB = [];		var LPathB = [];
		 var RPathC = [];		var LPathC = [];
		 var RPathD = [];		var LPathD = [];
		 
		 var alpha = 0.07;
		 var nb_suspente = 12;
		 var RclientTab = [];
		 var LclientTab = [];		 
		 
		 var layer = new BABYLON.Layer("layer","modele/img/3.png",scene,true);
		 
		 //VOILE USINE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
		 
		 var ribbon = BABYLON.MeshBuilder.CreateRibbon("ribbonConstr", {pathArray : [RPathA, RPathB, RPathC, RPathD]}, scene);
		 ribbon.material = constructeurMat;
		 //FIN VOILE USINE ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		 
		 
		 //TABLEAU DIFFERENCE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		 var CRTabA = [-17, -16, -11, -14, -22, -20, -20, -20, -24, -32, -26, -29];
		 var CRTabB = [-23, -15, -20, -20, -19, -22, -17, -25, -23, -21, -21, -21];
		 var CRTabC = [-21, -21, -17, -21, -25, -20, -27, -27, -20, -27, -26, -25];
		 var CRTabD = [-30, -32, -27, -35, -24, -24, -27, -28, -28, -24, -31, -28];
		 
		 var CLTabA = [-20, -17, -17, -22, -23, -23, -23, -20, -24, -29, -30, -30];
		 var CLTabB = [-22, -19, -17, -23, -26, -26, -21, -23, -28, -27, -30, -29];
		 var CLTabC = [-26, -24, -20, -22, -25, -24, -28, -29, -30, -29, -27, -32];
		 var CLTabD = [-32, -32, -31, -36, -30, -29, -28, -32, -31, -27, -33, -36];
		 
		 RclientTab.push(CRTabA);
		 RclientTab.push(CRTabB);
		 RclientTab.push(CRTabC);
		 RclientTab.push(CRTabD);
		 LclientTab.push(CLTabA);
		 LclientTab.push(CLTabB);
		 LclientTab.push(CLTabC);
		 LclientTab.push(CLTabD);
		 
		ribbonClientR = getRibbon(document.getElementById("scaleDiff").value, RclientTab, false, alpha, nb_suspente, coeff, scene);
		ribbonClientR.material = matC;

		ribbonClientL = getRibbon(document.getElementById("scaleDiff").value, LclientTab, true, alpha, nb_suspente, coeff, scene);
		ribbonClientL.material = matC;
		//FIN TABLEAU DIFFERENCE /////////////////////////////////////////////////////////////////////////////////////////////////////////////////		 
		 
         // Let's try our built-in 'ground' shape. Params: name, width, depth, subdivisions, scene
         
		 /*var ground = BABYLON.Mesh.CreateGround("ground1", 6, 6, 2, scene);		 
		 ground.material = new BABYLON.StandardMaterial("material", scene);
		 ground.material.backfaceCulling = false;*/
		 
		 
		 //BOUTONS CAMERA /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
		
		$('#bControles').click(function () {
			bootbox.alert({
				message:"<strong>MOLETTE SOURIS:</strong> Zoomer <br> <strong>CTRL + CLIC GAUCHE:</strong> Se déplacer latéralement <br><strong>CLIC GAUCHE APPUYÉ:</strong> Effectuer une rotation <br><strong>Échelle différence:</strong> Permet un agrandissement de la différence de mesure par rapport à la voile constructeur<br><br> Cette modélisation n'est qu'une représentation approximative de la voile, elle a pour but de représenter les déformations des voiles par rapport à leurs structures initiales."				
			}).find('.btn-primary').removeClass("btn-primary").addClass("mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent").css({'background-color':'#00BCD4', 'color' : '#37474F'});
		})
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
		
		
		 // Leave this function
		 return scene;
      };
	  // End of createScene function
      // -------------------------------------------------------------
      // Now, call the createScene function that you just finished creating
      var scene = createScene();
      // Register a render loop to repeatedly render the scene
      engine.runRenderLoop(function () {
         scene.render();
      });
      // Watch for browser/canvas resize events
      window.addEventListener("resize", function () {
         engine.resize();
      });

   </script>
   <script src="modele/cpicker.js"></script>
</body>
</html>