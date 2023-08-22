<?php
require_once __DIR__ . '/inc/fip-connect.inc.php';

error_reporting(1);


$FIP_url = "https://api.radiofrance.fr/livemeta/pull/7";

// cURL initialisieren
$ch = curl_init();

// cURL-Optionen setzen
curl_setopt($ch, CURLOPT_URL, $FIP_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

// cURL-Ausführung und Ergebnis erhalten
$FIP_api_response = curl_exec($ch);

// cURL-Verbindung schließen
curl_close($ch);

// JSON-Daten in ein Array konvertieren
$FIP_data = json_decode($FIP_api_response, true);

// var_dump($data);

// Überprüfen, ob die JSON-Daten erfolgreich geparst wurden
if ($FIP_data === null) {
    die('Fehler beim Abrufen der API-Daten.');
}

// var_dump($FIP_api_response);
// var_dump($FIP_data);



// var_dump($FIP_data);

$artists = [];
$songs = [];
$released = [];
$albums = [];
$apple_link = []; 
$test[0][0] = NULL;
$test[1][0] = NULL;


if (isset($FIP_data['steps']) && is_array($FIP_data['steps'])) {
    foreach ($FIP_data['steps'] as $step) {
            $artists[] = $step['highlightedArtists'] ;
            $songs[] = $step['title'];
            $released[] = $step['anneeEditionMusique'];
            $albums[] = $step['titreAlbum'];
            $apple_link[] = $step['path'];
        }
};

foreach($albums AS $a) {
    if(empty($a)) {
        $a[] = "unknown artist";
    }
};

// Aktueller Titel & Künstler

if(is_array($artists)){
    foreach($artists AS $a) {
        if(empty($a)) {
            $a = "Keine Künstlerdaten übertragen";
        }
    }
};

// Wenn Transe FIP Express oder Club Jazz a FIP läuft, werden keine Daten übergeben, dann Namen des Podcasts wiedergeben
if(is_array($artists[3]))
{
 $artistName = implode($artists[3]);
    if(empty($artistName)) {
        $artistName = $songs[3];
        }
    }else if(is_null($artists[3])){
        $artistName = $songs[3];;      
    };

$songTitle = $songs[3];


// Formatieren der Suchbegriffe mit urllencode
$searchQuery = urlencode("$songTitle $artistName");

var_dump($searchQuery);

// Genius API-Endpunkt-URL
$geniusApiUrl = "https://api.genius.com/search?q=$searchQuery";

// cURL-Anfrage Genius API für Songtexte des aktuellen Songs
curl_setopt($ch, CURLOPT_URL, $geniusApiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $accessToken,
    'User-Agent: MyApp/1.0', 
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// ausführen und Antwort abrufen
$genius_data_response = curl_exec($ch);

// Überprüfen auf Fehler
if(curl_errno($ch)) {
    echo 'Fehler beim Abrufen der Daten von der Genius API: ' . curl_error($ch);
    curl_close($ch);
    exit;
}

// schliessen
curl_close($ch);

// JSON abspeichern
$genius_data = json_decode($genius_data_response, true);

// var_dump($songs[3]);
// var_dump($genius_data);

// path für die Song ID
$api_path = $genius_data['response']['hits'][0]['result']['api_path'];
// Artist name aus der Genius Abfrage
$genius_artist_name = $genius_data['response']['hits'][0]['result']['artist_names'];
$genius_song_title = $genius_data['response']['hits'][0]['result']['title'];


if(is_null($genius_artist_name)){
    $genius_artist_name = "No Genius name";
};

if(is_null($genius_song_title)){
    $genius_song_title = "No Genius title";
};

// url bauen
$geniusSongUrl = "https://api.genius.com" . $api_path;
// var_dump($geniusSongUrl);

// cURL konfigurieren
curl_setopt($ch, CURLOPT_URL, $geniusSongUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $accessToken,
    'User-Agent: MyApp/1.0', 
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// ausführen und Antwort abrufen
$genius_lyrics_response = curl_exec($ch);

// auf Fehler checken
if(curl_errno($ch)) {
    echo 'Fehler beim Abrufen der Daten von der Genius API: ' . curl_error($ch);
    curl_close($ch);
    exit;
}
// tschüssi api
curl_close($ch);

// json decode
$lyrics_data = json_decode($genius_lyrics_response, true);
// var_dump($lyrics_data);

// Zugriff auf die Liedtexte, um sie auf view anzuzeigen
$embeded_lyrics = $lyrics_data['response']['song']["embed_content"];

$gN = "Genius Name und Titel:";
var_dump($gN);
var_dump($genius_artist_name);
var_dump($genius_song_title);
$fN = "FIP Name und Titel:";
var_dump($fN);
var_dump($artistName);
var_dump($songTitle);
$fNOK = "Artist Name Ok?";
var_dump($fNOK);
var_dump(stringOK($artistName, $genius_artist_name));
$fTOK = "Titel Name Ok?";
var_dump($fTOK);
var_dump(stringOK($songTitle, $genius_song_title));
$lE = "Lyrics empty?";
var_dump($lE);
var_dump(empty($embeded_lyrics));
var_dump(strtolower($genius_song_title));


if(!stringOK($artistName, $genius_artist_name) || !stringOK($songTitle, $genius_song_title) || empty($embeded_lyrics)) {
    $embeded_lyrics = "Keine Liedtexte vorhanden.";
};

    render(__DIR__ . '/views/fip.view.php', [
    'artistName' => $artistName,
    'artists' => $artists,
    'songs' => $songs,
    'albums' => $albums,
    'released' => $released,
    'apple_link' => $apple_link,
    'FIP_data' => $FIP_data,
    'embeded_lyrics' => $embeded_lyrics
]);


/*

// Wenn keine Liedtexte, dann keine Liedtexte
if(empty($embeded_lyrics)) {
    $embeded_lyrics = "Keine Songtexte vorhanden.";
}


var_dump(nameOK($artistName, $genius_artist_name));
var_dump(fullNameOK($artistName, $genius_artist_name));
// var_dump(mb_strlen(e($embeded_lyrics)));
// var_dump(mb_strlen($embeded_lyrics));
// var_dump(strlen($embeded_lyrics));
// var_dump($embeded_lyrics);
// Sicherstellen, dass FIP und Genius die selben Künstler wiedergeben, Kontrolle des zweiten Worts des Strings (The BEATLES statt The), wenm nicht vorhanden erstes Wort
function getSecond($string) {
    $second_word_pattern ='/^\w+\s+(\w+)/';
    $first_word_pattern='/^\w+/';
    preg_match($second_word_pattern, $string, $matches);
    if(empty($matches)){
        preg_match($first_word_pattern, $string, $matches);
    }
    return $matches;
}

*/
