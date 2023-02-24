-> Ativar/Desativar o ambiente do ecommerce
1 . C: >> Windows >> System32 >> drivers >> etc >> hosts
Inserir/Remover linha: 
127.0.0.1		www.hcodecommerce.com.br
2 . C: >> xampp >> apache >> conf >> extra >> httpd-vhosts.conf
Inserir/Remover script:
<VirtualHost *:80>
    ServerAdmin webmaster@hcode.com.br
    DocumentRoot "C:/ecommerce"
    ServerName www.hcodecommerce.com.br
    ErrorLog "logs/dummy-host2.example.com-error.log"
    CustomLog "logs/dummy-host2.example.com-access.log" common
	<Directory "C:/ecommerce">
        Require all granted

        RewriteEngine On

        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteRule ^ index.php [QSA,L]
	</Directory>
</VirtualHost>