## OnFramework 1.0 

Framework MVC para desenvolvimento web

## Recursos
  - MVC (Model com implementação Entity e Table com o ORM CakePHP 3)  
  - Template  
  - Sessão  
  - CakeORM 3.3.4
  - Monolog 1.18.1
  - PHPUnit 4.3.3

## Requisitos
  - Composer
  - Git
  - PHP Versão 5.3+
  
## Instalação

1) Faça o clone do projeto para o ambiente de desenvolvimento

2) Execute composer install

```sh
php composer.phar install
```

2) Depois acesse: http://localhost/onframework

## Criando uma aplicação de exemplo, somente listagem de nomes de clientes

1) Crie um banco de dados chamado onframework e crie a tabela abaixo:

```php
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `clients` (`id`, `name`) VALUES
(1, 'Pedro'),
(2, 'Maria');

ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
```

2) Faça a configuração do banco de dados em: src/config/database.php: 

```php
...
ConnectionManager::config('default', [
  'className' => 'Cake\Database\Connection',
  'driver' => 'Cake\Database\Driver\Mysql',
  'database' => 'onframework',
  'username' => 'root',
  'password' => '123456'
]);
```

# Modelo

O modelo de domínio da aplicação é dividido em 2 tipos de objetos principais. 
Os primeiros são table objects (objetos de tabela). Estes objetos fornecem acesso a coleções de dados. Eles permitem a você salvar novos registros, modificar/deletar os que já existem, definir relacionamentos, e executar operações em massa. 

O segundo tipo de objetos são as entities (entidades). Entities representam registros individuais e permitem a você definir comportamento em nível de linha/registro e funcionalidades.

A camada de domínio utiliza o ORM do Cake3, mais detalhes podem ser encontrado em http://book.cakephp.org/3.0/pt/orm.html

1) Crie uma classe de entidade para clients: src/model/entity/Client.php:

```php
<?php
namespace OnFramework\Model\Entity;

use Cake\ORM\Entity;

/**
 * Description of Client
 *
 * @author Tayron
 */
class Client extends Entity
{

}
```

2) Crie uma classe table para clients: src/model/table/ClientsTable.php:

```php
<?php
namespace OnFramework\Model\Table;

use Cake\ORM\Table;

/**
 * Description of ClientsTable
 *
 * @author Tayron
 */
class ClientsTable extends Table
{
    /**
     * 
     * @param array $config
     */
    public function initialize(array $config)
    {
        $this->table('clients');
    }
    
    /**
     * 
     */
    public function getNomes()
    {
        return $this->find('all')->select('name');
    }
}
```

# Controller

1) Crie um controller para clients: src/controller/ClientsController.php:

```php
<?php
namespace OnFramework\Controller;
use Cake\ORM\TableRegistry;

/**
 * Controller que exibe a tela principal do sistema
 * 
 * @author Tayron Miranda <dev@tayron.com.br>
 */
class ClientsController extends AppController 
{   
    /**
     * IndexController::index
     * 
     * Exibe a tela inicial do sistema
     * 
     * @return void
     * @author Tayron Miranda <dev@tayron.com.br>
     */
    public function index()
    {
        $clientes = TableRegistry::get('Clients');
        $listaClientes = $clientes->getNomes();  
        
        $this->template->setParametros([
            'titulo' => 'Clientes',
            'listaClientes' => $listaClientes
        ]);  
        
        $this->template->render('index');
    }    
}

```

# View

1) Crie uma view para o método index: src/view/clients/index.php:

```php
<div class="row">
    <div class="col-md-12">
        <h1><?= $titulo ?></h1>
    </div>
    
    <div class="col-md-12">
        <?php foreach($listaClientes as $cliente): ?>
        <p><?= $cliente->name?></p>                    
        <?php endforeach ?>
    </div>    
</div>
```

5) Em seguida acesse: http://onframework/clients
