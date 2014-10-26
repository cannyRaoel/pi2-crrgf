<?php
/**
 * @class ControleurSite.class.php "controleurs/ControleurSite.class.php"
 * @version 0.0.1
 * @date 2014-10-17
 * @author Eric Revelle
 * @brief Controleur de la section des utilisateurs
 * @details Gère et controle la section des utilisateurs
 */
class ControleurSite extends Controleur{

	public function __construct(){
		$this->gererSite();
	}

	public function gererSite(){
		try{
			if ( !isset($_GET['page']) ) {
				$_GET['page'] = 'accueil';
			}

			switch ( $_GET['page'] ) {
				case 'mes-oeuvres':
					$this->gererOeuvres();
					break;
				
				case 'accueil':
					$this->gererAccueil();
					break;
				
				default:
					$this->gererErreurs();
			}

		} catch ( Exception $e ) {
			echo "<p class=\"alert alert-danger\">".$e->getMessage()."</p>";
		}
	}

	public function gererAccueil(){
		VueAccueil::afficherAccueil();
	}
	
	public function gererOeuvres()
	{		
		try{	
				if(isset($_POST['cmd'])==false && isset($_POST['rech'])==false)
				{
					$aOeuvres=Oeuvre::rechercherListeDesOeuvresEnVente();
					VueOeuvre::afficherLesOeuvres($aOeuvres);				
				}else if(isset($_POST['cmd']))
					{
						//Récupérer le texte saisi par l'internaute $_POST['txt']
						$recherche=$_POST['txt'];
						echo $recherche;
						$aOeuvres =Oeuvre::rechercherDesOeuvresParMotCle($recherche);
											
						//Si l'oeuvre existe					
						if($aOeuvres  == true)
						{
							//echo "trouvé";
								
							//afficher les oeuvres correspondant au mot clé
							VueOeuvre::afficherLesOeuvres($aOeuvres);
						}else
							{
								//echo "Aucun produit ne correspond à votre recherche";													
								VueOeuvre::afficherLesOeuvres(0,"aucun produit ne correspond à votre recherche");
							}						
					
					} else	if(isset($_POST['rech']))
						{
							//effectue la recherche si l'internaute a selectionné à la fois: theme ET technique
							if (isset($_POST['theme'])==true && isset($_POST['technique'])==true)
							{								
								//Récupère le theme choisi par l'utilisateur
								$Theme= $_POST['theme'];
								//echo $Theme;
								//Instancier un objet Theme avec le numéro de theme choisi par l'internaute $Theme
								$oTheme = new Theme($Theme);													
								//Recherche le nom du theme associé à ce numéro
								$bRechercherTheme=$oTheme->rechercherNomThemeParSonId();
								//Récupère le résultat
								$nomTheme= $oTheme->getNomTheme();
							
								//Récupère la technique choisie par l'utilisateur
								$Technique= $_POST['technique'];
								//echo $Technique;
								//Instancier un objet Technique avec le numéro de technique saisi par l'internaute $Technique
								$oTechnique = new Technique($Technique);													
								//Recherche le nom de la technique associé à ce numéro
								$bRechercherTechnique=$oTechnique->rechercherNomTechniqueParSonId();
								//Récupère le résultat
								$nomTechnique= $oTechnique->getNomTechnique();									
								
								if($bRechercherTheme == true && $bRechercherTechnique == true)
								{			
									//echo 'trouvé';								
								
									//Instancier un objet Oeuvre 
									$oOeuvre=new Oeuvre();
									//Recherche les oeuvres correspondant aux noms du theme ET de la technique choisis par l'internaute
									$aOeuvres=$oOeuvre->rechercherParThemeTechnique($nomTheme,$nomTechnique);
								
									if($aOeuvres==true)
									{
										VueOeuvre::afficherLesOeuvres($aOeuvres);						
									} else 
										{								
											VueOeuvre::afficherLesOeuvres(0,"Aucun produit ne correspond à votre recherche");
										}
								} else
								
									{
										echo 'non trouvé';
									}	
							
							} else	//effectue la recherche si l'internaute a selectionné une des categories: theme OU technique
							
								{	//si seulement theme est choisi					
									if (isset($_POST['theme']))
									{
										//Récupérer la valeur du theme choisi par l'utilisateur(classique,moderne....)
										$Theme= $_POST['theme'];
										//donne une categorie à la valeur récupérée
										$categorie='theme';
																			
										//Instancier un objet Theme avec le numéro de theme saisi par l'internaute $Theme
										$oTheme = new Theme($Theme);													
										//Recherche le nom du theme associé à ce numéro
										$bRechercherTheme=$oTheme->rechercherNomThemeParSonId();
										//Récupère le résultat
										$nomTheme= $oTheme->getNomTheme();
											
											if($bRechercherTheme == true)
											{	
												//affecte la valeur du theme dans une variable critère 
												$critere=$nomTheme;
											}										
										
									} 	else	//si seulement technique est choisie											
									
										{
											//Récupérer la valeur de la technique choisie par l'utilisateur(acrylique,peinture a l'huile....)
											$Technique= $_POST['technique'];
											//donne une categorie à la valeur récupérée
											$categorie='technique'	;
											
											//Instancier un objet Technique avec le numéro de technique saisi par l'internaute $Technique
											$oTechnique = new Technique($Technique);													
											//Recherche le nom de la technique associé à ce numéro
											$bRechercherTechnique=$oTechnique->rechercherNomTechniqueParSonId();
											//Récupère le résultat
											$nomTechnique= $oTechnique->getNomTechnique();	
												if($bRechercherTechnique == true)
												{
													//affecte la valeur de la technique dans une variable critère
													$critere=$nomTechnique;
												}
										}
								
								//Récupération des oeuvres correspondants au theme OU à la technique										
								//Instancier un objet Oeuvre 
								$oOeuvre=new Oeuvre();
								//Recherche les enregistrements en fonction du:
								//critère récupéré:$nomTheme ou $nomTechnique 
								//et de la categorie (type) à qui il appartient:Theme ou Technique
								$aOeuvres=$oOeuvre->rechercherParCritere($critere,$categorie);
							
								if($aOeuvres==true)
								{
									VueOeuvre::afficherLesOeuvres($aOeuvres);						
								} 
								 else 
									{								
										VueOeuvre::afficherLesOeuvres(0,"Aucun produit ne correspond à votre recherche");
									}
								}											
						}				
													
			}catch(Exception $e){				
				echo "<p>".$e->getMessage()."</p>";
			}
	}
}
	

