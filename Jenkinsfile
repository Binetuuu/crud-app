pipeline {
    agent any

    environment {
        CONTAINER_NAME = 'crud-php'
        GIT_REPO = 'https://github.com/Binetuuu/crud-app.git'
    }

    stages {

        stage('Cloner le code') {
            steps {
                git branch: 'main', url: "${env.GIT_REPO}"
            }
        }

        stage('Tests') {
            steps {
                echo 'Exécution des tests PHP...'
                // Remplace ceci par tes vraies commandes de test si nécessaire
                sh "docker exec ${env.CONTAINER_NAME} php -v"
                // Si tu as PHPUnit :
                // sh "docker exec ${env.CONTAINER_NAME} ./vendor/bin/phpunit"
            }
        }

        stage('Déploiement') {
            steps {
                echo "Déploiement sur le conteneur ${env.CONTAINER_NAME}..."
                sh "docker exec ${env.CONTAINER_NAME} git pull origin main"
                sh "docker restart ${env.CONTAINER_NAME}"
            }
        }
    }

    post {
        failure {
            echo 'Le pipeline a échoué !'
        }
        success {
            echo 'Déploiement réussi 🎉'
        }
    }
}

