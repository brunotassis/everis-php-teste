# AVALIAÇÃO TÉCNICA PHP (Everis)
## Sistema de Chamados

### Descrição
Sistema de chamados para empresa te telemarketing.

### Funcionalidades
- [x] Pagina incial com apresentação do sistema.
- [x] Cadastro de usuário basico.
- [x] Login de usuário com gerencia de permissões.
- [x] Usuarios tipo: USUÁRIO (Default) | ADMINISTRADOR | CLIENTE | FUNCIONARIO.

---

## Requisitos do servidor
- Serviço apache ou ngnix.
- Servidor com a versão PHP 7.0 ou superior.
- Gerenciador de pacotes composer.
- SGBD MySQL para gerencia dos dados do sistema.

## Informações do sistema
- Framework Laravel 6.x

## Implementação
Uma vez que o servidor estiver devidamente configurado vamos a fase de implementação do sistemas.

### Instalação dos pacotes.

- Navegue até o diretorio raiz do projeto:
```
$ composer install
```

### Implementação da base de dados.
- Na raiz do projeto encontre o arquivo .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=php_test
DB_USERNAME=vagrant
DB_PASSWORD=vagrant
```
> Configure esta parte do arquivo com os dados da sua base de dados.

> Antes de rodar os comandos seguintes tenha certeza de ter criado a base de dados e configurado o mesmo no passo anterior.

---

- Uma vez que o composer estiver finalizado a instalação dos pacotes necessarios crie a base de dados:
```
$ php artisan migration:install
```

- Com as tabelas e base de dados devidamente criada vamos semear alguns dados para teste:
```
$ php artisan db:seed
```
---

## LOGIN
Uma vez que toda configuração basica estiver finalizada o sistema possue 3 logins para teste:

- Administrador (Administrador Geral do Sistema)  
LOGIN: admin  
SENHA: admin  

- Cliente  
LOGIN: cliente  
SENHA: cliente  

- Funcionario  
LOGIN: funcionario  
SENHA: funcionario  

> OBS: Recomendavel alterar a senha inicial do administrador.

# Considerações
Todo sistema é passivel de falhas e este tem como status de fase inicial de desenvolvimento.

Garantir a manutenabilidade e eficiencia dos recursos é uma tarefa de extrema importancia, conversar com o cliente buscando entender cada função do sistema é impresindivel.