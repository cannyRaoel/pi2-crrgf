<?php
/**
 * @classe VueAccueil VueAccueil.class.php "classes/VueAccueil.class.php"
 * @version 0.0.1
 * @date 2014-10-18
 * @author Eric Revelle
 * @brief Affiche le contenue de la page d'accueil.
 * @details Permet d'afficher le contenu de la page d'accueil.
 */
class VueAccueil {

	public static function afficherAccueil() {

		// Inclu les morceaux de pages, dont les metas, l'entete, la navigation et le carousel
		Vue::head('Achetez des oeuvres d\'art', 'Site de vente d\'oeuvres d\'art en ligne');
		Vue::header('Ma recherche');
		Vue::nav();
		Vue::carousel(array(array('src' => 'carousel1.jpg', 'alt' => 'Image 1'), array('src' => 'carousel2.png', 'alt' => 'Image 2'), array('src' => 'carousel3.jpg', 'alt' => 'Image 3'), array('src' => 'carousel4.jpg', 'alt' => 'Image 4'), array('src' => 'carousel5.jpg', 'alt' => 'Image 5'), array('src' => 'carousel6.jpg', 'alt' => 'Image 6')));

		echo "
			<article class=\"accueil container-fluid\">
				<section class=\"le-site row\">
					<article class=\"col-md-6 col-md-offset-3\">
						<header>
							<h1 class=\"text-center\">À propos de nous</h1>
							<p class=\"text-center\">Un site qui rassemble les passionnés d'oeuvres d'art.</p>
						</header>
						<p><strong>Arts aux enchères</strong> permet aux artistes de proposés des oeuvres sous la forme d’enchères. Nous offrons aussi la possibilité aux artistes de proposer leurs oeuvres en  mode achat instantané.</p>
					</article>
				</section>
				<section class=\"compatibilite row\">
					<article class=\"col-md-6 col-md-offset-3\">
						<header>
							<h1 class=\"text-center\">Compatibilité</h1>
							<p class=\"text-center\">Accédez à tout moment et de partout à vos informations via une interface personnalisé.</p>
						</header>
						<ul>
							<li>Accès depuis votre mobile</li>
							<li>Suivi de l'état de vos mises et achats via une interface</li>
							<li>Alertes par courriel</li>
						</ul>
						<p class=\"text-center\"><img src=\"img/mobiles.png\" alt=\"Tableau6\"></p>
					</article>
				</section>
				<section class=\"engagement row\">
					<article class=\"col-md-6 col-md-offset-3\">
						<header>
							<h1 class=\"text-center\">Engagement</h1>
							<p class=\"text-center\">La promesse d'<strong>Arts aux Enchères</strong></p>
						</header>
						<p>Nous élevons votre expérience artistique, grâce à une approche spécialisée, complète et unique dans le monde du marché de l’art.</p>
						<p>Nous offrons des services d’une qualité exemplaires, peu importe la valeur de votre oeuvre.</p>
					</article>
				</section>
			</article>
		";

		Vue::footer();

	}

}