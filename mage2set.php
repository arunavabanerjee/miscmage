
//setting up mage2 in new server
chmod -R 777 pub
chmod -R 777 var
rm -rf ./pub/static/*
rm -rf ./var/view_preprocessed/*
/opt/lampp/bin/php ./bin/magento setup:static-content:deploy 



