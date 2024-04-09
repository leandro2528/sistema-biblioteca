Sistema de Gerenciamento de Bibliotecas
Este é um sistema para gerenciamento de bibliotecas e empréstimos de livros, permitindo o cadastro de leitores, livros, editoras, gêneros, empréstimos e usuários com diferentes níveis de acesso.

Funcionalidades:
Cadastro de Leitor
Cadastro de Livros com Quantidade
Cadastro de Editora
Cadastro de Gêneros
Cadastro de Empréstimos
Controle da Quantidade de Livros Emprestados
Relatórios:
Livros Cadastrados
Leitores Cadastrados
Editoras Cadastradas
Gêneros Cadastrados
Livros Emprestados
Histórico de Empréstimos

Tecnologias Utilizadas:
Laravel (versão 10.)
Bootstrap 

Instalação
Clone o repositório para o seu ambiente local:
git clone https://github.com/seu-usuario/sistema-biblioteca.git


Navegue até o diretório do projeto:
cd sistema-biblioteca

Instale as dependências do projeto:
composer install

Configure o arquivo .env com as informações do banco de dados:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco_de_dados
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

Execute as migrações do banco de dados para criar as tabelas necessárias:
php artisan migrate

Inicie o servidor local:
php artisan serve

Acesse o sistema no seu navegador através do endereço: http://localhost:8000

Contribuição:
Contribuições são bem-vindas! Se encontrar algum problema ou tiver sugestões de melhorias, por favor, abra uma issue neste repositório.