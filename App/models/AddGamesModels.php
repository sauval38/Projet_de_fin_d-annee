<?php
namespace Models; // Déclare l'espace de noms 'Models' pour organiser la classe et éviter les conflits de noms.


use Exception; // Importe la classe 'Exception' pour gérer les erreurs.
use App\Database; // Importe la classe 'Database' pour gérer la connexion à la base de données.
class AddGamesModels { // Déclare la classe 'AddGamesModels', responsable de l'ajout de nouveaux jeux dans la base de données.
    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.
    

    public function __construct() { // Déclare le constructeur, qui initialise la connexion à la base de données.
        $database = new Database(); // Crée une nouvelle instance de la classe 'Database' pour se connecter à la base de données.
        $this->db = $database->getConnection(); // Récupère la connexion à la base de données via la méthode 'getConnection' et l'affecte à la propriété '$db'.
    }

    public function addGameWithImage($titles_article, $descriptions_article, $story_article, $platforms_article, $modes_article, $genres_article, $designers_article, $developers_article, $editors_article, $gameplay_article, $informations_article, $dates_release, $images_article, $path) { // Déclare la méthode 'addGameWithImage' qui prend en paramètres plusieurs champs d'informations sur un jeu, ainsi que l'image et son chemin.
        
        try {  // Bloc 'try' pour gérer les erreurs qui peuvent survenir lors de l'ajout du jeu à la base de données.
            $path = 'assets/images/';  // Définit le chemin de stockage des images dans le dossier 'assets/images/'.
            $this->db->beginTransaction(); // Démarre une transaction de base de données pour s'assurer que toutes les opérations réussissent ou échouent ensemble.
            $img = $images_article['name']; // Récupère le nom du fichier image.
            $storyArticleWithLineBreaks = nl2br($story_article); // Convertit les sauts de ligne dans la variable '$story_article' en balises HTML '<br>' pour un affichage correct.
            $sqlAddGames = "INSERT INTO games (titles_article, descriptions_article, story_article, platforms_article, modes_article, genres_article, designers_article, developers_article, editors_article, gameplay_article, informations_article, dates_release, images_article, path) VALUES (:titles_article, :descriptions_article, :story_article, :platforms_article, :modes_article, :genres_article, :designers_article, :developers_article, :editors_article, :gameplay_article, :informations_article, :dates_release, :images_article, :path)"; // Prépare la requête SQL pour insérer les informations du jeu dans la base de données.
            
            $addGames = $this->db->prepare($sqlAddGames); // Prépare la requête SQL en vue de son exécution.
            $addGames->bindParam(':titles_article', $titles_article); // Lie la valeur de '$titles_article' au paramètre ':titles_article' dans la requête SQL.
            $addGames->bindParam(':descriptions_article', $descriptions_article); // Lie la valeur de '$descriptions_article' au paramètre ':descriptions_article' dans la requête SQL.
            $addGames->bindParam(':story_article', $storyArticleWithLineBreaks); // Lie la version avec des sauts de ligne de '$story_article' au paramètre ':story_article'.
            $addGames->bindParam(':platforms_article', $platforms_article); // Lie la valeur de '$platforms_article' au paramètre ':platforms_article' dans la requête SQL.
            $addGames->bindParam(':modes_article', $modes_article); // Lie la valeur de '$modes_article' au paramètre ':modes_article'.
            $addGames->bindParam(':genres_article', $genres_article); // Lie la valeur de '$genres_article' au paramètre ':genres_article'.
            $addGames->bindParam(':designers_article', $designers_article); // Lie la valeur de '$designers_article' au paramètre ':designers_article'.
            $addGames->bindParam(':developers_article', $developers_article); // Lie la valeur de '$developers_article' au paramètre ':developers_article'.
            $addGames->bindParam(':editors_article', $editors_article); // Lie la valeur de '$editors_article' au paramètre ':editors_article'.
            $addGames->bindParam(':gameplay_article', $gameplay_article); // Lie la valeur de '$gameplay_article' au paramètre ':gameplay_article'.
            $addGames->bindParam(':informations_article', $informations_article); // Lie la valeur de '$informations_article' au paramètre ':informations_article'.
            $addGames->bindParam(':dates_release', $dates_release); // Lie la valeur de '$dates_release' au paramètre ':dates_release'.
            $addGames->bindParam(':images_article', $img); // Lie la valeur de l'image (nom du fichier) à '$img' dans le paramètre ':images_article'. 
            $addGames->bindParam(':path', $path); // Lie le chemin de l'image ('$path') au paramètre ':path'.
            $addGames->execute(); // Exécute la requête SQL pour insérer les données dans la base de données.
            
            if (isset($images_article) && $images_article['error'] === UPLOAD_ERR_OK) { // Vérifie si une image a été téléchargée et si le téléchargement n'a pas rencontré d'erreur.
                $imageTmpPath = $images_article['tmp_name']; // Récupère le chemin temporaire où le fichier image a été stocké.
                $imageName = basename($images_article['name']); // Récupère le nom du fichier image.
                $uploadDir = 'assets/images/'; // Définit le répertoire de destination des images téléchargées.
                $imagePath = $uploadDir . $imageName; // Concatène le répertoire et le nom de l'image pour obtenir le chemin complet où l'image sera stockée.
                if (move_uploaded_file($imageTmpPath, $imagePath)) { // Déplace le fichier image de son emplacement temporaire vers le répertoire cible.
                    echo "Le jeu a été ajouté avec succès."; // Affiche un message de confirmation si l'image a été correctement téléchargée.
                }
            }
            $this->db->commit(); // Valide la transaction en enregistrant définitivement toutes les modifications dans la base de données.
        } 
        catch (Exception $e) { // Capture les exceptions qui peuvent survenir lors de l'exécution de la transaction.
            $this->db->rollBack(); // Annule toutes les modifications effectuées dans la transaction en cas d'erreur.
            throw $e; // Relance l'exception pour qu'elle soit traitée ailleurs.
            
        }
    }
}
