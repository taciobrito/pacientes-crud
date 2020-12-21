# Aplicação em CodeIgniter 4

## Passos da criação do projeto

- A Criação do projeto foi realizada via composer usando a versão 4 do Codeigniter;
- Foi realizada a Configuração da conexão com o banco de dados Postgre;
- Criação da migration da tabela de pacientes;
- Criação dos endpoints de pacientes;
- Uso do postman para testar as requisições;
- Desenvolvimento do front utilizando bootstrap 4 e Vue Js;
- Para efetuar requisições para a API foi utlizado a bliblioteca axios.

## Passos para rodar o projeto

- Clonar o projeto;
- Via CMD, no diretório do projeto rodar o comando ` composer install `;
- Criar o banco de dados local, no caso, criei com o nome "desafio-om30";
- Após criar o banco de dados, configurar os dados de conexão do mesmo no arquivo `app\Config\Database.php`, no array $default;
- Para rodar a(s) migrate(s), é necessário rodar o comando no diretório do projeto: `php spark migrate`;
- Após a migrate executada, é necessário iniciar a aplicação e testar, por meio do comando `php spark serve`, por padrão irá rodar em `http:localhost:8080`, caso queira trocar a porta, adicione ao comando o seguinte parâmetro: `--port=8003`, sendo a porta 8003 um exemplo, pois poderá colocar a porta que desejar.

## O que faltou

O projeto se encontra incompleto, porém, funciona todo o CRUD, portanto, segue a lista dos itens que estava em mente de ainda finalizar:

- Upload de foto do paciente, assim como a remoção da mesma;
- Validação dos atributos no frontend (atualmente só possue na API);
- Autenticação via token;
- Utilização da bibliota Sweet Alert para exibição dos alertas, ao invés do alert nativo do javascript.