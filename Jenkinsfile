#!/usr/bin/env groovy

node('master') {
    try {
        stage('build') {
            git url: 'git@github.com:4kit-development/sharedspace.git'

            // Start services (Let docker-compose build containers for testing)
            sh "./develop up -d"

            // Get composer dependencies
            sh "./develop composer install"

           // Create .env file for testing
            sh '/var/lib/jenkins/.venv/bin/aws s3 cp s3://sharedspace-secrets/env.ci .env'
            sh './develop art key:generate'
        }
        stage('test') {
           // sh "APP_ENV=testing ./develop test"
        }

        if( env.BRANCH_NAME == 'master' ) {
            stage('package') {
                sh './docker/build'
            }

            stage('deploy') {
                sh 'ssh -i ~/.ssh/id_ root@134.209.105.143 sudo /opt/deploy'
            }
        }
    } catch(error) {
        // Maybe some alerting?
        throw error
    } finally {
        // Spin down containers no matter what happens
        sh './develop down'
    }
}
