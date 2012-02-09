#!/bin/sh
#
# General OpenLib setup script
# Run after clone/checkout
#

# Set cleanup script name
cleanupscript=cleanup.sh

# Set Cake archive name and contained directory name
cakearchive=cakephp-2.0.4.zip
cakeroot=cakephp				# base dir within archive

# Set Plugin directory
plugindir=app/Plugin

# Set NiceAuth archive name
# Note: base directory within archive must be 'NiceAuth'
#niceautharchive=NiceAuth-Mag22.zip
niceautharchive=niceauth.zip

# Set mysql username for db import
mysqlusername=root

# DB init file. Forward engineered from .mwb file
sqlschemafile=schema.sql

echo ===========================
echo OpenLib Install Script
echo \(c\) 2012 Cloud One Systems
echo ===========================

# Install Cake, creating a script for easy cleanup prior to git add .
echo 'echo Removing installed CakePHP files...' > $cleanupscript
echo "Unpacking $cakearchive..."
unzip $cakearchive | grep -v 'Archive:' |  cut -f2 -d':' | sed s/"$cakeroot\/"// | sed 's/^ \{1,\}//;s/ \{1,\}$//;/^$/d' | sed s/' '/'\\ '/g | sed s/^/'rm '/ | sed s/'$'/' 2> \/dev\/null'/ >> $cleanupscript

# Move extracted files to current dir
echo "Moving $cakeroot contents to current directory..."
cp -pRf $cakeroot/* .
cp -pRf $cakeroot/.htaccess .
rm -rf $cakeroot

# Copy customized Cake files
cp -pRf custom/* .

# Make tmp writeable (better security than 777?)
chmod 777 app/tmp

# Install NiceAuth, continuing to build the cleanup script
echo 'echo Removing installed NiceAuth files...' >> $cleanupscript
echo "Unpacking $niceautharchive..."
unzip $niceautharchive -d $plugindir | grep -v 'Archive:' |  cut -f2 -d':' | sed s/"$cakeroot\/"// | sed 's/^ \{1,\}//;s/ \{1,\}$//;/^$/d' | sed s/' '/'\\ '/g | sed s/^/'rm '/ | sed s/'$'/' 2> \/dev\/null'/ >> $cleanupscript

# Remove other misc files and directories that were generated on install
echo 'echo Removing database.php...' >> $cleanupscript
echo 'rm app/Config/database.php' >> $cleanupscript
echo 'echo Removing tmp dir...' >> $cleanupscript
echo 'rm -rf app/tmp' >> $cleanupscript

# Remove remaining empty directories
echo 'echo Removing empty directories...' >> $cleanupscript
echo 'find . -type d | tail -r | xargs rmdir 2>/dev/null' >> $cleanupscript

echo 'echo Removing this script...' >> $cleanupscript
echo "rm $cleanupscript" >> $cleanupscript
echo 'echo Done.' >> $cleanupscript

# Make the script executable
chmod +x $cleanupscript

# Init db with schema and sample data
echo 'Initializing database...'
mysql -u$mysqlusername -p < $sqlschemafile

# Baking database config file
echo 'Baking database config file...'
echo '**Take all defaults, but enter DB name, username, and passwd.'
echo "**Note: DB name should be the same as that named in $sqlschemafile"
app/Console/cake bake

# Run NiceAuth db_init
echo 'Initializing NiceAuth... (choose Y for all prompts)'
app/Console/cake nice_auth.nice_auth db_init

echo 'echo Done.'
