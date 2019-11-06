#!/usr/bin/env groovy

node('master') {
    try {
        stage('build') {
            git url: 'git@github.com:4kit-development/sharedspace.git'

            // Start services (Let docker-compose build containers for testing)
            sh "./develop up -d"

            // Get composer dependencies
            sh "./develop composer install"

            // Get composer dependencies
            sh "./develop npm install"

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
                sh 'ssh -i ~/.ssh/id_ss root@157.245.202.90 /opt/deploy.sh'
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
