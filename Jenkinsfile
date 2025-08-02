pipeline {
  agent any

  environment {
    COMPOSE_PROJECT_NAME = "crud-app"
  }

  stages {

    stage('Vérification Docker') {
      steps {
        echo 'Vérification de l\'installation de Docker...'
        sh 'docker --version'
        sh 'docker-compose --version || echo "Docker Compose non trouvé (ignorable si installé autrement)"'
      }
    }

    stage('Tests') {
      steps {
        echo 'Exécution des tests PHP sur tous les fichiers...'
        sh '''
          for file in src/*.php; do
            echo "Test de syntaxe : $file"
            php -l "$file" || exit 1
          done
        '''
      }
    }

    stage('Nettoyage des anciens conteneurs') {
      steps {
        echo 'Suppression des anciens conteneurs Docker...'
        sh '''
          docker rm -f crud-php crud-mysql crud-phpmyadmin 2>/dev/null || true
        '''
      }
    }

    stage('Build') {
      steps {
        echo 'Reconstruction des images Docker...'
        sh 'docker-compose build'
      }
    }

    stage('Déploiement') {
      steps {
        echo 'Démarrage de l\'application avec Docker Compose...'
        sh 'docker-compose up -d'
      }
    }
  }

  post {
    failure {
      echo '❌ Le pipeline a échoué.'
    }
    success {
      echo '✅ Pipeline terminé avec succès.'
    }
  }
}

