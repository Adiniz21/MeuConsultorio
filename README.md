# Meu Consultório

Bem-vindo(a) ao projeto **Meu Consultório**, um sistema em **Laravel** para gerenciar **Pacientes**, **Médicos** e **Atendimentos**, com layout Bootstrap e funcionalidades de relatórios.

---

## Sumário

- [Visão Geral](#visão-geral)
- [Tecnologias](#tecnologias)
- [Instalação e Configuração](#instalação-e-configuração)
- [Banco de Dados](#banco-de-dados)
- [Execução](#execução)
- [Funcionalidades Principais](#funcionalidades-principais)
- [Contato](#contato)

---

## Visão Geral

Este projeto realiza o **CRUD** (Create, Read, Update, Delete) de:
- **Pacientes**: nome, CPF, data de nascimento, email  
- **Médicos**: nome, CRM, especialidade  
- **Atendimentos**: data/hora, médico e paciente associados  

Além disso, oferece:
- **Relatório** de atendimentos por médico em `/relatorios/medico/{id}`  
- **Validações** de dados (ex.: CRM, CPF, email)  
- **Interface** estilizada com Bootstrap 5  
- **Navbar responsiva** com Offcanvas em telas pequenas  

---

## Tecnologias

<p align="center">
<img alt="Static Badge" src="https://img.shields.io/badge/php-8.2.12-black">
<img alt="Static Badge" src="https://img.shields.io/badge/composer-2.8.5-white">
<img alt="Static Badge" src="https://img.shields.io/badge/laravel-11.31.0-red">
<img alt="Static Badge" src="https://img.shields.io/badge/npm-10.9.2-purple">
</p>

---

## Instalação e Configuração

1. **Clonar** o repositório:
   ```bash
   git clone https://github.com/seu-usuario/meu-consultorio.git
   cd meu-consultorio
- Instale as dependências do projeto.
  
        composer install
        npm install
  
2. Configurar o arquivo .env:
   ```bash
   cp .env.example .env

- No .env, edite as variáveis de banco:
     ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=consultorio_db
    DB_USERNAME=root
    DB_PASSWORD=

3. Gerar a chave da aplicação:
   ```bash
    php artisan key:generate



---

## Banco De Dados
1. Crie o banco de dados manualmente ou via terminal:
   ```bash
    CREATE DATABASE consultorio_db;
2. Execute as migrações:
   ```bash
    php artisan migrate
    php artisan db:seed
---

## Execução
<h3>Modo Local</h3>

        php artisan serve
Abra http://127.0.0.1:8000.

## Funcionalidades Principais

- **Pacientes:**  listar, criar, editar, excluir (CRUD completo)
- **Médicos:**  listar, criar, editar, excluir (CRUD completo), validação de CRM
- **Atendimentos:** vincular médico e paciente, data/hora (CRUD completo)
- **Relatórios:**  listar atendimentos por médico em /relatorios/medico/{id}
- **Validações:**  CPF (11 dígitos), CRM (regex, unique), e-mail (unique, email), datas.

---

## Contato
- Para dúvidas, sugestões ou suporte, entre em contato via arturdlmeira@gmail.com.


   
     
