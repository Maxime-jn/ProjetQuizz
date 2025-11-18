#!/usr/bin/env bash

# Script de déploiement automatique pour ton dump MariaDB.
# Il va importer le fichier quiz_dump.sql dans MariaDB.

SQL_FILE="sql/READY_TO_DEPLOY_DB.sql"
DB_NAME="QuizGame"
DB_USER="$1"
DB_PASS="$2"

if [ -z "$DB_USER" ] || [ -z "$DB_PASS" ]; then
    echo "Donner l'utilisateur et le mot de passe."
    echo "Usage: $0 utilisateur mot_de_passe"
    exit 1
fi

if [ ! -f "$SQL_FILE" ]; then
    echo "Le fichier $SQL_FILE est introuvable."
    exit 1
fi

echo "Import du fichier SQL dans MariaDB."

mysql -u "$DB_USER" -p"$DB_PASS" < "$SQL_FILE"

if [ $? -eq 0 ]; then
    echo "Import terminé."
else
    echo "Import raté. Comme d’hab."
fi
