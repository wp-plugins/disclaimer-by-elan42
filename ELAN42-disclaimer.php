<?php
/**
 * Plugin Name: Disclaimer by ELAN42
 * Plugin URI: http://www.elan42.com
 * Description: Add Credits - Privacy Policy - Cookie - Return Policy links with popup and  hover box.
 * Author: ELAN42
 * Author URI: http://www.elan42.com
 * Version: 0.7
 * Text Domain: elan42-disclaimer
 * Domain Path: /languages
 *
 */

load_plugin_textdomain( 'elan42-disclaimer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

function elan42_disclaimer_get_option($key) {
	$options = get_option( 'elan42_disclaimer_options' );

	return $options[$key];
}

/**
* Setup function
**/

function elan42_setup_disclaimer_plugin() {
	$options = array(
		'company_name' => __('Company Name', 'elan42-disclaimer'),
		'policy_title' => __('Privacy Policy', 'elan42-disclaimer'),
		'terms_title' => __('Terms &amp; Conditions', 'elan42-disclaimer'),
		'return_title' => __('Return Policy', 'elan42-disclaimer'),
		'credits_title' => __('Credits', 'elan42-disclaimer'),
		'credits_url' => 'http://example.com',
		'agree_text' => __('Accetto', 'elan42-disclaimer'),
		'hover_text' => __("Per offrirti un'esperienza di navigazione ottimizzata e in linea con le tue preferenze, utilizziamo i cookies, anche di terze parti. Cliccando questo banner acconsenti al loro impiego in conformit&agrave; alle nostre {PRIVACY} e {TERMS}.", "elan42-disclaimer"),
		'policy_text' => __("<p>I tuoi dati personali verranno utilizzati da {COMPANY} (titolari del trattamento dei dati) per inviarti i nostri prodotti eventualmente richiesti e per la
conseguente partecipazione alle nostre iniziative e concorsi oltre che per il perseguimento degli scopi statutari dell'associazione.
I dati verranno trattati con mezzi informatici e potranno essere da te consultati, modificati, integrati o cancellati, in base all'art 7 del D. Lgs 196/2003
(Legge sulla Privacy). I dati non verranno diffusi. Essi potranno essere comunicati ai soggetti che svolgono attivit&agrave; strumentali ai fini sopra indicati
(etichettatura, spedizione, etc). Il responsabile dei dati &egrave; {COMPANY}, presso il quale possono essere esercitati i diritti previsti dall' art 7 del D. Lgs 196/2003
ed &egrave; disponibile l'elenco aggiornato dei responsabili dei singoli trattamenti. In caso di mancata indicazione dei dati richiesti, non potremo procedere all'invio
delle pubblicazioni richieste n&egrave; dar corso al rapporto associativo. Se tu acconsenti, i dati potranno inoltre essere utilizzati da {DOMAIN} oltre che per la
ricezione della newsletter informativa, per proporti altre pubblicazioni o servizi rivolti ai consumatori mediante strumenti di comunicazione a distanza
(posta, telefono, sms, mms, posta elettronica, social media). Se non sei interessato a queste iniziative, ti preghiamo di barrare l'apposita casella sul
modulo di raccolta dati. In ogni caso, tu potrai in qualunque momento e del tutto gratuitamente chiedere l'aggiornamento, la correzione, l'integrazione
dei dati e potrai opporti al loro utilizzo per le suddette finalit&agrave; scrivendo all'indirizzo sopra indicato.</p>", 'elan42-disclaimer'),

		'terms_text' => __("<h3>INFORMATIVA SUL TRATTAMENTO DEI DATI PERSONALI</h3>
<p>I tuoi dati personali verranno utilizzati da {COMPANY} (titolari del trattamento dei dati) per inviarti i nostri prodotti eventualmente richiesti e per
la conseguente partecipazione alle nostre iniziative e concorsi oltre che per il perseguimento degli scopi statutari dell'associazione. I dati verranno
trattati con mezzi informatici e potranno essere da te consultati, modificati, integrati o cancellati, in base all'art 7 del D. Lgs 196/2003 (Legge sulla Privacy).
I dati non verranno diffusi. Essi potranno essere comunicati ai soggetti che svolgono attivit&agrave; strumentali ai fini sopra indicati (etichettatura, spedizione, etc).
Il responsabile dei dati &egrave; {COMPANY} presso il quale possono essere esercitati i diritti previsti dall' art 7 del D. Lgs 196/2003 ed &egrave; disponibile l'elenco
aggiornato dei responsabili dei singoli trattamenti. In caso di mancata indicazione dei dati richiesti, non potremo procedere all'invio delle pubblicazioni
richieste n&eacute; dar corso al rapporto associativo. Se tu acconsenti, i dati potranno inoltre essere utilizzati da {COMPANY} oltre che per la ricezione della
newsletter informativa, per proporti altre pubblicazioni o servizi rivolti ai consumatori mediante strumenti di comunicazione a distanza (posta, telefono, sms,
mms, posta elettronica, social media). Sei non sei interessato a queste iniziative, ti preghiamo di barrare l'apposita casella sul modulo di raccolta dati.
In ogni caso, tu potrai in qualunque momento e del tutto gratuitamente chiedere l'aggiornamento, la correzione, l'integrazione dei dati e potrai opporti al
loro utilizzo per le suddette finalit&agrave; scrivendo all'indirizzo sopra indicato.</p>
<h3>TERMINE E CONDIZIONE DEL SERVIZIO</h3>
<p>Tutti gli utenti sono tenuti a prendere attenta visione dei Termini e delle Condizioni del Servizio per poter utilizzare questo sito e usufruire dei servizi e
prodotti offerti da {DOMAIN}. Il presente sito web &egrave; gestito da {COMPANY}. L'accesso a questo sito ed ai suoi servizi sono soggetti ai seguenti termini e
condizioni d'uso. La societ&agrave; si riserva il diritto di modificare, variare o cambiare i presenti termini a sua sola discrezione e l'utente accetta di rimanere
vincolato a tali modifiche, variazioni o cambiamenti.</p>
<h3>CONTENUTO</h3>
<p>I contenuti attuali o futuri del sito: testi, commenti, fotografie, illustrazioni, video, marchi, loghi, nomi di dominio, nomi commerciali e qualsiasi
altro materiale coperto da diritto d'autore e/o ogni altra forma di propriet&agrave; intellettuale sono di propriet&agrave; di {COMPANY} che &egrave; stata autorizzata al loro utilizzo.
Tale materiale &egrave; protetto dall'uso non autorizzato, dalla copia e dalla diffusione secondo quanto previsto dalle leggi vigenti in materia. Per poter continuare
a mantenere le nostre informazioni e la nostra immagine libere e indipendenti da condizionamenti economici e politici, ed evitarne utilizzi per finalit&agrave; non vicine
al nostro scopo associativo, abbiamo la necessit&agrave; di tutelare i nostri contenuti e la nostra grafica distintiva (prima di tutto, il logo) da usi indiscriminati. 
E' vietato utilizzare copie parziali o totali del sito e delle informazioni ivi contenute in una rete o con un prodotto, un sistema, un'applicazione senza il
consenso preliminare scritto di {COMPANY} &egrave; espressamente vietata qualsiasi consultazione, copia o riproduzione totale o parziale del sito a fini diversi da
quelli previsti nel presente contratto. Per questo ti chiediamo di collaborare ad un uso corretto dei nostri materiali, segnalandocene l'utilizzo e/o
richiedendone l'autorizzazione mediante i seguenti moduli.
Desidero inserire nel mio sito il logo o un banner di {DOMAIN}
Desidero utilizzare i contenuti di {COMPANY} sul mio sito o su una newsletter
{DOMAIN} rispetta i diritti di propriet&agrave; intellettuale e/o industriale degli altri. Ove si ritenga che un'opera sia stata copiata o \"trattata\" da terzi
all'interno del Servizio, in modo da integrare una violazione delle norme sul diritto d'autore, si prega di fornire a {DOMAIN} tutte le informazioni possibili
a riguardo al fine di poter intervenire tempestivamente.</p>", 'elan42-disclaimer'),
		'return_text' => "<h3>INFORMATIVA PER L'ESERCIZIO DEL DIRITTO DI RECESSO</h3>
<p>Ai sensi dell'art. 49 comma 4 del Codice del Consumo,
ed ai sensi e nei limiti di cui al Decreto Legislativo n. 206/2005 e successive modifiche (Codice del Consumo), il Cliente ha diritto, entro 14 giorni dal ricevimento della merce richiesta, di esercitare il diritto di recesso. </p>
<p>Il Cliente dovrÃ  inviare la comunicazione di recesso prima della scadenza del termine predetto. Per  comunicare  la  propria  volontÃ   di  recedere,  il  Cliente  dovrÃ   inoltrare  a  {COMPANY},  entro  il  termi
ne suddetto, comunicazione a mezzo lettera raccomandata con ricevuta di ritorno, allâ€™indirizzo della nostra sede.</p>
<h3>EFFETTI DEL RECESSO</h3>
<p>A integrazione delle Condizioni Generali di Vendita di {COMPANY}
Il Cliente dovrÃ  restituire il bene acquistato, inutilizzato e integro, nella sua confezione originale completa in tutte le sue parti, insieme con una copia della conferma dâ€™ordine e una copia cartecea della ricevuta dâ€™acquisto, entro 14 giorni dal ricevimento della merce al nostro indirizzo.</p>
<p>Il Cliente Ã¨ responsabile della diminuzione del valore risultante da una manipolazione diversa da quella che sarebbe  sufficiente  per  accertare  la  natura,  le  caratteristiche  e  il  funzionamento  del  bene  stesso. 
Le spese di spedizione relative alla restituzione del bene sono a carico del Cliente.  Sono  esclusi  dal  diritto  di  recesso  (ex  art.  59  Codice  del  Consumo)  i  â€œbeni  confenzionati  su  misura  o chiaramente personalizzatiâ€�.
Il diritto di recesso non potrÃ  essere esercitato nemmeno su beni che sono venduti sigillati per motivi igienici o connessi alla protezione della salute (es. materassi, guanciali o articoli di biancheria) e che in quanto tali non si prestano ad essere restituiti o sostituiti dopo che sono stati aperti.
Quando  lâ€™esercizio  del  diritto  di  recesso  avviene  nel  rispetto  delle  disposizioni  dettate  dal  Codice  del Consumo e delle Condizioni Generali di Vendita, il Cliente ha diritto al rimborso del prezzo del prodotto. </p>
<p>{COMPANY} procederÃ , nel minor tempo possibile a partire dal giorno della ricezione dei prodotti restituiti, al riaccredito della somma attraverso la stessa modalitÃ  utilizzata dal Cliente per il pagamento dellâ€™ordine. </p>
<p>I  costi  e  i  rischi  legati  alla  restituzione  dei  prodotti  sono  a  carico  del  Cliente,  che  Ã¨  responsabile  della diminuzione del valore risultante dalla sua manipolazione o dal deterioramento subito durante il trasporto. 
{COMPANY} si riserva la facoltÃ  di chiedere il risarcimento dell'eventuale diminuzione di valore accertata. </p>",
		);

	add_option( 'elan42_disclaimer_options', $options, '', 'yes' );
}
register_activation_hook( __FILE__, 'elan42_setup_disclaimer_plugin' );

/**
* Enqueue the disclaimer script and css.
**/

function elan42_enqueue_disclaimer_scripts() {
	wp_enqueue_script( 'jquery-cookie', '//cdn.jsdelivr.net/jquery.cookie/1.4.1/jquery.cookie.min.js', array('jquery'), '1.4.1', true );

	wp_register_script( 'elan42-disclaimer-script', plugins_url( '/assets/ELAN42-disclaimer.js', __FILE__ ), array('jquery', 'jquery-cookie'), '0.5', true );

	wp_localize_script( 'elan42-disclaimer-script', 'elan42_disclaimer', array(
		'hover_box' => elan42_disclaimer_get_option( 'hover_text' ),
		'button' => elan42_disclaimer_get_option( 'agree_text' ),
		'policy_title' => elan42_disclaimer_get_option( 'policy_title' ),
		'terms_title' => elan42_disclaimer_get_option( 'terms_title' ),
		'return_title' => elan42_disclaimer_get_option( 'return_title' ),
		'policy_text' => elan42_disclaimer_get_option( 'policy_text' ),
		'terms_text' => elan42_disclaimer_get_option( 'terms_text' ),
		'return_text' => elan42_disclaimer_get_option( 'return_text' ),
		'company_name' => elan42_disclaimer_get_option( 'company_name' ),
		'site_url' => get_site_url(),
		'site_name' => str_replace('http://', '', home_url())
		));

	wp_enqueue_script( 'elan42-disclaimer-script' );

	wp_enqueue_style( 'elan42-disclaimer-style', plugins_url( '/assets/ELAN42-disclaimer.css', __FILE__ ));
	wp_enqueue_style( 'elan42-disclaimer-icomoon-icons', plugins_url( '/assets/icons.css', __FILE__ ));						
}
add_action( 'wp_enqueue_scripts', 'elan42_enqueue_disclaimer_scripts' );



/**
* get_the_elan42_disclaimer
*
* The php function that returns the credits line. Tooks the options saved in the Plugin options Page.
**/

function get_the_elan42_disclaimer($elan42_disclaimer_pretty_links = false) {

	$policy_title = elan42_disclaimer_get_option( 'policy_title' );
	$terms_title = elan42_disclaimer_get_option( 'terms_title' );
	$return_title = elan42_disclaimer_get_option( 'return_title' );
	$credits_title = elan42_disclaimer_get_option( 'credits_title' );
	$credits_url = elan42_disclaimer_get_option( 'credits_url' );

	$elan42_disclaimer_divider = '-';

	if($elan42_disclaimer_pretty_links){
		$elan42_disclaimer_classes = 'elan42-disclaimer-pretty-links ';
		$elan42_disclaimer_divider = '';
	}

	$output = '<div class="'.$elan42_disclaimer_classes.'elan42-disclaimer">';

	/**
	 * Check if WooCommerce is active
	 **/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	    $output .= '<a class="elan42-disclaimer-return-button" href="#">'.$return_title.'</a> '.$elan42_disclaimer_divider.' ';
	}

	$output .= '<a class="elan42-disclaimer-policy-button" href="#">'.$policy_title.'</a> '.$elan42_disclaimer_divider.' <a class="elan42-disclaimer-conditions-button" href="#">'.$terms_title.'</a>';

	if(!empty($credits_title) && !is_null($credits_title)) {
		$output .= $elan42_disclaimer_divider.' <a class="elan42-disclaimer-credits-button" target="_blank" href="'.$credits_url.'">'.$credits_title.'</a>';
	}

	$output .= '</div>';

	return $output;

}



/**
* the_elan42_disclaimer function
*
* The php function that outputs the credits line. Tooks the options saved in the Plugin options Page.
**/

function the_elan42_disclaimer() {
	
	echo get_the_elan42_disclaimer();
}

/**
* the_elan42_pretty_disclaimer function
*
* The php function that outputs the credits line. Tooks the options saved in the Plugin options Page.
**/

function the_elan42_pretty_disclaimer() {
	
	echo get_the_elan42_disclaimer(true);
}



/**
* [elan42_disclaimer] shortcode
*
* The shortcode for the credits output.
**/

function elan42_disclaimer_shortcode() {

	return get_the_elan42_disclaimer();

}
add_shortcode('elan42_disclaimer', 'elan42_disclaimer_shortcode');

/**
* [elan42_pretty_disclaimer] shortcode
*
* The shortcode for the credits output. Try it, it's a surprise!!
**/

function elan42_pretty_disclaimer_shortcode() {

	return get_the_elan42_disclaimer(true);

}
add_shortcode('elan42_pretty_disclaimer', 'elan42_pretty_disclaimer_shortcode');

/**
* [elan42_disclaimer_links] shortcode
*
* The shortcode for the credits output.
**/

function elan42_links_only_shortcode() {

	$policy_title = elan42_disclaimer_get_option( 'policy_title' );
	$terms_title = elan42_disclaimer_get_option( 'terms_title' );
	$return_title = elan42_disclaimer_get_option( 'return_title' );
	$credits_title = elan42_disclaimer_get_option( 'credits_title' );
	$credits_url = elan42_disclaimer_get_option( 'credits_url' );

	/**
	 * Check if WooCommerce is active
	 **/
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	    $output .= '<a class="elan42-disclaimer-return-button" href="#">'.$return_title.'</a> - ';
	}

	$output .= '<a class="elan42-disclaimer-policy-button" href="#">'.$policy_title.'</a> - <a class="elan42-disclaimer-conditions-button" href="#">'.$terms_title.'</a> - <a target="_blank" href="'.$credits_url.'">'.$credits_title.'</a>';

	return $output;

}
add_shortcode('elan42_disclaimer_links', 'elan42_links_only_shortcode');

class ELAN42_Disclaimer_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'elan42_disclaimer_widget', // WIDGET ID
			__('ELAN42 Disclaimer Widget', 'elan42-disclaimer'), // WIDGET NAME
			array('description' => __("Add's some links to the position of the widget to show the Credits, the Privacy Policy and the terms and conditions. If
				woocommerce is active it shows the Return Policy aswell.", 'elan42-disclaimer'))
			);
	}


	/**
	*
	* Output the widget
	*
	**/
	public function widget ( $args, $instance ) {

		echo $args['before_widget'];

		the_elan42_disclaimer();

		echo $args['after_widget'];

	}

	/**
	*
	* Output the backend Form
	*
	**/
	public function form ($instance) {
		?>

		<p>
			<?php _e('You can find the options under Tools->Disclaimer. Please be sure to visit it and save at least the default values. Thank you.', 'elan42-disclaimer') ?>
		</p>

		<?php

	}

	/**
	*
	* Save the widget values
	*
	**/
	public function update($new_instance, $old_instance) {

	}

}

function elan42_disclaimer_register_widget() {
	register_widget( 'ELAN42_Disclaimer_Widget' );
}
add_action( 'widgets_init', 'elan42_disclaimer_register_widget' );

require_once(plugin_dir_path( __FILE__) . '/inc/admin.php');