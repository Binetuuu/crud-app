pipeline {
    agent any

    stages {
        stage('Cloner le dépôt') {
            steps {
                git url: 'https://github.com/utilisateur/ton-projet.git', branch: 'main'
            }
        }

        stage('Vérifier la syntaxe PHP') {
            steps {
                echo "Vérification syntaxe avec php -l"
                sh 'find src/ -name "*.php" -exec php -l {} \\;'
            }
        }

        stage('Tests unitaires (si tu en as)') {
            steps {
                echo "Lancer PHPUnit si disponible"
                sh 'vendor/bin/phpunit tests' // seulement si tu as PHPUnit installé
            }
        }

        stage('Build Docker') {
            steps {
                sh 'docker-compose down'
                sh 'docker-compose build'
            }
        }

        stage('Déploiement') {
            steps {
                sh 'docker-compose up -d'
            }
        }
    }
}
