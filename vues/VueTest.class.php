<?php 
class VueTest{

	public static function afficherTest() {
		Vue::head('Titre','La description');
		Vue::header();
		Vue::nav();
		$oTest = new Test();
		echo $oTest->echoTest()."<br>";
        echo "test de canny";
		Vue::footer();
	}
}