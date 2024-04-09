<h1>Sistema de Gerenciamento de Bibliotecas</h1><br/>
Este é um sistema para gerenciamento de bibliotecas e empréstimos de livros, <br/>
permitindo o cadastro de leitores, livros, editoras, gêneros, <br/>
empréstimos e usuários com diferentes níveis de acesso.<br/>

<h4>Funcionalidades:</h4><br/>
Cadastro de Leitor<br/>
Cadastro de Livros com Quantidade<br/>
Cadastro de Editora<br/>
Cadastro de Gêneros<br/>
Cadastro de Empréstimos<br/>
Controle da Quantidade de Livros Emprestados<br/>

<h4>Relatórios:</h4><br/>
Livros Cadastrados<br/>
Leitores Cadastrados<br/>
Editoras Cadastradas<br/>
Gêneros Cadastrados<br/>
Livros Emprestados<br/>
Histórico de Empréstimos<br/>

<h4>Tecnologias Utilizadas:</h4><br/>
Laravel (versão 10.)<br/>
Bootstrap <br/>

<h4>Instalação</h4><br/>
Clone o repositório para o seu ambiente local:<br/><br/>
git clone https://github.com/seu-usuario/sistema-biblioteca.git<br/>


<h4>Navegue até o diretório do projeto:</h4><br/>
cd sistema-biblioteca<br/>

<h4>Instale as dependências do projeto:</h4><br/>
composer install<br/>

<h4>Configure o arquivo .env com as informações do banco de dados:</h4><br/>
DB_CONNECTION=mysql<br/>
DB_HOST=127.0.0.1<br/>
DB_PORT=3306<br/>
DB_DATABASE=seu_banco_de_dados<br/>
DB_USERNAME=seu_usuario<br/>
DB_PASSWORD=sua_senha<br/>

<h1>Execute as migrações do banco de dados para criar as tabelas necessárias:</h4><br/>
php artisan migrate<br/>

<h1>Inicie o servidor local:</h4><br/>
php artisan serve<br/>

<h4>Acesse o sistema no seu navegador através do endereço:</h4><br/>
 http://localhost:8000<br/>

<h4>Contribuição:</4><br/>
Contribuições são bem-vindas! Se encontrar algum problema ou tiver sugestões de melhorias, por favor, abra uma issue neste repositório.<br/>