#### !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! A LOT OF THINGS HAVE CHANGED !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
# Intro : 
L'objectif de ce cahier des charges est de définir les exigences fonctionnelles pour le developpement d'une application web qui permettra de gerer la deroulement du tvshow Starlight. 

# Gestion des utilisateurs : 
les utilisateurs qui vont utiliser cette application web sont : Administrateur, jurys
donc on a deux *roles* :  <admin>   <jury>
- chaque user va avoir: name, image, email, password 
- chaque utilisateur se connecter en utilisant email, password .
- chaque utilisateur ne peut ouvrir qu'une seule session à la fois. (laisse ça jusqu'à apres)

********admin*
- SEULEMENT l' Admin qui a un profile et peut modifier ses infos (éliminer option supprimer compte pour admin)
### Gestion des jurys :
- Admin qui registre les jurys ( 5 jurys OBLIGATION if more => modify the jurys votestable ) => CRUD
- Admin can update les infos d'un jury : image, name, email

### Gestion des condidats (AVANT LE JEU : ce n'est pas vraiment lié au jeu) :

### Gestion JEU :
- générer episodes (table), chaque episode va avoir: day (le jour exact), prime (1,2,3,4 // 5,6 // 7 // 8 // 9), category (5 category related to 5 levels : audition // face-a-face // ultimes face-a-face // demi-finale // finale) => CRUD

- générer les 5 levels, chaque level va avoir: 
            - MEME ORDER DES CONDIDATS dans ces trois tableaux
           <table de condidats> 
            - colonnes : 
           <table de votes par jurys> 
            - colonnes :
            - 5 jurys ===> 1 vote = 20 points
                           2 vote = 40 points
                           3 vote = 60 points
                           4 vote = 80 points
                           5 vote = 100 points
           <table de votes par public> 
           (*ONLY dans le passage from level "ultimes face-a-face" to "demi-finale" / "demi-finale" to "finale"*)
            - colonnes : ????
            - 100 membres de public ===> 1 vote = 1 points

    **audition**
    - Premièrement , on doit remplir <aud_condidats> (64 condidats)
         => CRUD ou (voir l'option d'importer un fichier excel au Database ??? problem: table de vote )
         en même temps, il faut insérer dans <aud_juryVotes> les id des condidats en initialiasant les votes du jurys en 0 (boolean) et jury_points en 0 (integer)
    - dans le tableau <aud_juryVotes>, lorsqu'un des jurys vote, l'intersection de sa colonne avec la ligne du  candidat choisi passe de 0 à 1 et les jury_points de ce candidat va incremeter par 20 points
    - chaque tableau de candidats après "aud_candidats" sera remplie en basant sur les résultats des votes du level precedent.
    -dans cette level les photo des condidats sont des avatar (image) soit female or male.

    **face-a-face**
    - remplir <faf_condidats> (32 condidats) selon le resultat de vote par jurys <aud_juryVotes> 
        condidat avec 5 votes ===> automatiquement dans <faf_condidats>
        condidat avec 4 votes ===> repe-charge (afficher tous les condidtas qu'ont 4 votes 
            admin peut les ajouter manuellement dans <faf_condidats> on click ==> ajour de candidat + incrementer son jury_points par 20 points)
        condidat avec <= 3  votes ===> Eliminer, NE l'ajouter pas au table (reste dans table "aud_condidats")

    **ultimes face-a-face**
    - remplir <ufaf_condidats> (16 condidats) selon le resultat de vote par jurys

    **demi-finale**
    - remplir <demiFinale_condidats> (10 condidats) selon le resultat de vote => 8 par jurys & 2 par public
    - le vote till the end of the performances

    **finale**
    - remplir <finale_condidats> (5 condidats) selon le resultat de vote par jurys & par public
    - le vote till the end of the performances



********jury*