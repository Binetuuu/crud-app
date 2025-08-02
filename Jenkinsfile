pipeline {
  agent any

  environment {
    PROJECT_NAME = "crud-app"
  }

  stages {
    stage('Vérification Docker') {
      steps {
        echo '🔍 Vérification de Docker et Docker Compose...'
        sh 'docker --version'
        sh 'docker-compose --version'
      }
    }

    stage('Nettoyage des anciens conteneurs') {
      steps {
        echo '🧹 Suppression des anciens conteneurs...'
        sh '''
          docker rm -f crud-php crud-mysql crud-phpmyadmin || true
          docker network rm ${PROJECT_NAME}_default || true
        '''
      }
    }

    stage('Build') {
      steps {
        echo '🔧 Construction des images Docker...'
        sh 'docker-compose build'
      }
    }

    stage('Tests PHP') {
      steps {
        echo '🧪 Test de tous les fichiers PHP dans le conteneur crud-php...'
        sh '''
          docker-compose up -d
          sleep 5
          FILES=$(docker exec crud-php sh -c "find /var/www/html -type f -name '*.php'")
          for f in $FILES; do
            echo "✅ Test de syntaxe : $f"
            docker exec crud-php php -l "$f" || exit 1
          done
        '''
      }
    }

    stage('Déploiement') {
      steps {
        echo '🚀 Déploiement avec Docker Compose...'
        sh 'docker-compose up -d'
      }
    }
  }

  post {
    success {
      echo '✅ Pipeline terminé avec succès.'
    }
    failure {
      echo '❌ Le pipeline a échoué.'
    }
  }
}

