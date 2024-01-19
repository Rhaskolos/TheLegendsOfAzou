READ ME (Main Branch)

GameState

La classe GameState est chargée de contenir l’état de l’application ce qui permet que son instance soit passée en paramètres aux méthodes qui ont besoin d’intéragir avec la logique du jeu. L’interface IGameAction en est un exemple avec la méthode run qui accepte ce type d’instance en paramètre pour pouvoir implémenter sa logique.


GameLoop
La classe GameLoop est chargée de faire tourner la boucle principale du jeu et de réaliser les actions commandées par le joueur. Grâce aux méthodes registerAction et unregisterAction il est possible de définir ce que le joueur peut faire à un moment donné (tour de boucle). L’interface IGameAction existe pour formaliser cette agrégation d’actions dans GameLoop.

GameException
La classe GameException hérite directement de Exception sans y apporter de modifications. Sa seule fonction est de définir un type d’erreur propre au jeu ce qui permet de faciliter le debugging en différenciant les erreurs natives de celles générées par notre code.



Classe Table (sera renommé Map par la suite ) : 
Description : 

Cette classe permet d'instancier des objets qui seront des tableaux (map) sur lequel évoluera le joueur.

Paramètres : 

Elle ne possède qu’un seul paramètre (grid) qui est une matrice représentant le tableau en bi-dimension (x et y) X représente l’axe horizontal et Y l’axe vertical.

Méthodes : 

Construct : La classe possède un construct qui permet d'instancier un nouveau tableau. En entrée, on donne X et Y qui correspondent à la largeur et hauteur du tableau. Lors de l’instanciation de l’objet, l'ensemble des cases de la matrice sont représentées par un 0 qui correspond à une case vide.

isValidPosition : Méthode cœur de la classe permettant de définir si une case sélectionnée selon des coordonnées X et Y se trouve bien à l'intérieur du tableau instancié. retourne True ou False.

addObstacle : Méthode permettant de rajouter un obstacle dans le tableau en mettant en entrée X et Y. La case comportant l’obstacle contiendra un 1 au lieu d’un 0. La méthode utilise aussi isValidPosition pour s’assurer que l’objet se trouve bien avec des coordonnées dans le tableau avant de l’instancier.

isObstacleAtPosition : Méthode attendent en entrée X et Y permettant de vérifier si une case contient un obstacle ou non. Utilise aussi la méthode isValidPosition  pour s’assurer que la case recherchée se trouve dans le tableau.

cleanCase : Méthode attendant en entrée X et Y et permettant de mettre un 0 en remplacement dans une case selon les coordonnées. Utilise isValidPosition  pour s’assurer que les coordonnées sélectionnées se trouvent dans le tableau.

initializeCharacterPosition : Méthode attendant en entrée un objet de classe Character. La méthode récupère les coordonnées du character est le place sur la case selon les coordonnées. Il est représenté par un “C”. La méthode isValidPosition  s’assure qu’on se trouve bien dans le tableau.

displayTable : Cette méthode permet d’afficher dans la console l’ensemble des cases de la matrice. Les 0 représentent les cases vides, les 1 les obstacles et le C le Character.

getGrid : Getter du paramètre “grid”

setGrid : Setter du paramètre “grid”





Classe Character  : 

Description : 

Classe abstrait servant de modèle pour les différentes classes jouables.

Paramètres : 

Name : Correspond au nom donné au personnage jouable par le joueur.

Level : Correspond au niveau actuel du personnage.

Vitality : correspond au point de vie.

physicalDamage : correspond aux points de caractéristiques calculant les dégâts physiques qu’inflige le Character.

magicDamage :correspond aux points de caractéristiques calculant les dégâts magique qu’inflige le Character.

physicalResistance : correspond aux points de caractéristiques calculant la résistance physique que possède le Character.

magicResistance : correspond aux points de caractéristiques calculant la résistance magique que possède le Character.

orientationCharacter : correspond à la direction dans laquelle le Character regarde et attaque.

positionXCharacter : correspond aux coordonnées X du Character dans le tableau.

positionYCharacter : correspond aux coordonnées Y du Character dans le tableau.

table : correspond au tableau dans lequel le Character est instancié.

Méthodes : 

construct : 

MoveRight : Cette méthode n’attend pas de paramètre d’entrée. Permet de ce déplacer d’un pas à droite. Pour valider le mouvement, on vérifie que le personnage se déplace sur une case valide (case ne contenant pas d'obstacle et case se trouvant sur la map). cette validation se réalise grâce à la récupération des méthodes isObstacleAtPosition et isValidPosition de la classe table. 

Si déplacement valide, message indiquant que le mouvement s’effectue et la position du character sur la map est réinitialisé grâce à la méthode initializeCharacterPosition. Son ancienne position est nettoyée grâce à la méthode cleanCase. Le paramètre orientationCharacter  est mis à jour avec la direction du déplacement.
SI déplacmeent non valide. Le Character reste à sa place. Le paramètre orientationCharacter  est quand même mis à jour selon la direction du déplacement qui était souhaitée.

MoveLeft : Même logique que  MoveRight  pour le déplacement à gauche.

MoveUp : Même logique que  MoveRight  pour le déplacement en haut.

MoveDown : Même logique que  MoveRight  pour le déplacement en bas.

movePattern  : Méthode attend en paramètre une combinaison des lettres “RLUD”. Permet de donner une indication unique pour utiliser en une fois plusieurs actions de mouvement. (est aussi utilisé pour créer des itinéraire de patrouille pour la méthode reverseMovePattern

getInverseMove : Méthode qui sert uniquement de composant à la méthode reverseMovePattern permet d’écrire l’inverse de la suite  “RLUD” qui sera utilisé par movePattern dans la méthode  reverseMovePattern.

reverseMovePattern : Méthode qui permet de créer une boucle infinie de déplacement selon un itinéraire “RLUD”. EN premier la boucle utilise la boucle l’ itinéraire “RLUD” dans la méthode move pattern pour le déplacement allée puis la méthode getInverseMove  pour le déplacement retour créant un chemin de tour de garde.



Travail en cours concernant le déplacement : 

Sortir les actions de déplacement de la class character pour en faire des classes action propres selon l’interface IGameAction. 

gestion des coordonnées selon l’interface et la classe position.
