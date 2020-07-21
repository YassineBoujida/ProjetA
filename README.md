         
             # Instructions à suivre pour bien démarrer ce projet 

1- Cloner le projet et ouvrir un terminal à la racine de ce projet

2- Executer la commande "composer install"

3- Creer une base de donnée avec le nom de votre choix 

4- Aller sur le fichier .env et configurer la base de donnée avec mysql

5- Démarrer le serveur avec la commande "php artisan serve"

6- Test des migrations : 

    => Executer la commande "php artisan migrate" pour insérer les tables dans la BD

7- Test du Database Seeder :

    => Executer la commande "php artisan db:seed" pour remplir les tables partners and cities

8- Test du EndPoint cities en utilisant par exemple l'outil Postman :

    => method : POST
    => url :  /api/cities
    => body : name

9- Test du EndPoint "Delivery times" :

    => method : POST
    => url :  /api/delivery-times
    => body : delivery_at (il faut ajouter les 6 heures de livraison mentionnées dans l'énoncé)

10- Test du EndPoint "Attaching cities to delivery times"

    => method : POST
    => url :  /api/cities/{city_id}/delivery-times
    => body : delivery_time (sous forme d'un id mais on va afficher au utilisateur le label                    
                             approprié dans un select dans la partie frontend par exemple)

11- "Excluding delivery times from some dates" :

    => J'ai ajouter une table dans la base de donnée qui contient la date d'exclusion et les ID de la table "delivery_time" à exclure et à partir de cette table on peut accéder à la table cities via la table intermédieres entre "delivery_times" and "cities"


    => method : POST
    => url :  /api/cities/delivery-times/exclusions
    => body : 
                + day : (ex : 2020-07-25)
                + exclusion_time : (sous forme d'un tableau parce que on peut exclure soit une partie soit tous les heures de livraison dans une ville donnée)

    Exemple d'application dans postman :

                + day : 2020-07-25
                + exclusion_time[0] : id "delivery_time" souhaité 
                + exclusion_time[1] : un autre id (si une ville à 2 "delivery_time" c'est considéré comme "All")

                sinon on peut indiquer un seul exclusion_time[0].
                On peut savoir la ville exclue à partir de sa relation avec la table "delivery_times"

12- "User EndPoint" :

    => method : GET
    => url :  /api/cities/{city_id}/delivery-dates-times/{number_of_days}
    => params : + number_of_days : (ex 1,2,3 ..... )
                + order_date : (ex : 2020-07-22)

    J'ai fait l'exclusion par exemple du jour 2020-07-25 de la ville Tangier qui contient 3 "delivery_time par jour" , en fait j'ai exclus 2 et laisser 1 afin d'afficher dans le résultat comme ça :


    "dates": [
        {
            "day_name": "Saturday",
            "date": "2020-07-25",
            "delivery_times": [
                {
                    "id": 10,
                    "delivery_at": "9->13",                                     // il y avait 3 ici
                    "created_at": "2020-07-21 01:59:22",
                    "updated_at": "2020-07-21 01:59:23"
                }
            ]
        } 

    