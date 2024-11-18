# **Ohara**

Bem-vindo ao repositório do **Sistema Escolar Ohara**! Este sistema foi projetado para gerenciar tarefas escolares e administrativas de forma eficiente, utilizando tecnologias modernas como Laravel e MariaDB. Este README fornece todas as instruções necessárias para configurar seu ambiente, entender a estrutura do projeto e contribuir de forma eficaz.

---

## **Índice**

1. [Sobre o Projeto](#sobre-o-projeto)
2. [Requisitos](#requisitos)
3. [Configuração do Ambiente de Desenvolvimento](#configuracao-do-ambiente-de-desenvolvimento)
4. [Explicação Detalhada das Pastas do Projeto](#explicacao-detalhada-das-pastas-do-projeto)
5. [Como Contribuir](#como-contribuir)
6. [Como Reportar Problemas](#como-reportar-problemas)
7. [Contato](#contato)

---

## **Sobre o Projeto**

O **Ohara** é um sistema de gerenciamento escolar que organiza informações sobre professores, alunos e suas respectivas interações. Ele é construído sobre o framework **Laravel**, utilizando um banco de dados relacional para persistência de dados e seguindo boas práticas de design e desenvolvimento.

Principais funcionalidades:
- Gestão de alunos, professores e suas informações.
- Geração de dados de teste para desenvolvimento rápido.
- Controle de autenticação e permissões.
- Configuração modular e extensível.

---

## **Requisitos**

Antes de iniciar, certifique-se de ter as ferramentas abaixo instaladas em seu sistema:

1. **PHP** (>= 8.0): Linguagem principal para rodar o Laravel.
2. **Composer**: Gerenciador de dependências PHP.
3. **MariaDB** ou **MySQL**: Banco de dados relacional.
4. **Node.js** (opcional): Necessário para compilar recursos de frontend (CSS/JS).
5. **Git**: Para clonar e versionar o projeto.

Se estiver em um ambiente Linux, verifique os seguintes pacotes adicionais:
- **php-mbstring**: Para manipulação de strings.
- **php-xml**: Necessário para algumas operações no Laravel.
- **php-curl**: Para conexões HTTP.

---

## **Configuração do Ambiente de Desenvolvimento**

Siga os passos detalhados abaixo para configurar seu ambiente de desenvolvimento:

### **1. Clonar o Repositório**

Use o seguinte comando para clonar o projeto:

```bash
git clone https://github.com/seu-usuario/ohara.git
cd ohara
```

---

### **2. Instalar Dependências**

Instale as dependências do projeto para configurar o ambiente PHP e (opcionalmente) o frontend.

- Instalar as dependências do Composer:

  ```bash
  composer install
  ```

- (Opcional) Instalar dependências do Node.js para recursos de frontend:

  ```bash
  npm install
  npm run dev
  ```

---

### **3. Configurar o Arquivo `.env`**

O Laravel utiliza um arquivo `.env` para centralizar as configurações. Crie o arquivo com base no modelo fornecido:

```bash
cp .env.example .env
```

Gere uma chave única para o aplicativo, necessária para criptografia interna:

```bash
php artisan key:generate
```

Configure as credenciais do banco de dados no arquivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Ohara
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

---

### **4. Criar e Sincronizar o Banco de Dados**

No **MariaDB** ou **MySQL**, crie um banco de dados chamado `Ohara`:

```sql
CREATE DATABASE Ohara;
```

Em seguida, execute o comando para sincronizar as tabelas do projeto com o banco de dados:

```bash
php artisan migrate:fresh
```

---

### **5. Popular o Banco de Dados**

Popule o banco com dados falsos para testes usando os seeders do Laravel:

```bash
php artisan db:seed
```

---

### **6. Iniciar o Servidor**

Finalmente, inicie o servidor local:

```bash
php artisan serve
```

Acesse a aplicação no navegador em: [http://localhost:8000](http://localhost:8000).

---

## **Explicação das Pastas do Projeto**

Aqui está um guia completo das principais pastas do projeto e suas responsabilidades:

### **1. `app/Http/Controllers`**

Contém os controladores que gerenciam a lógica de negócio das rotas. Eles são responsáveis por:
- Processar requisições HTTP.
- Interagir com os modelos para buscar ou modificar dados.
- Retornar respostas, sejam elas JSON, páginas ou redirecionamentos.

Exemplo: Um controlador para gerenciar usuários pode buscar um aluno no banco de dados e retornar suas informações.

---

### **2. `database/migrations`**

Armazena arquivos que definem a estrutura das tabelas do banco de dados. Cada arquivo é uma "migração", representando mudanças incrementais no esquema do banco.

Exemplo:
- Criar a tabela `alunos` com colunas como `nome`, `rm`, e `email`.
- Adicionar ou remover colunas de tabelas existentes.

---

### **3. `database/factories`**

Fornece modelos para gerar dados falsos (mock) para testes ou popular o banco. Usamos o pacote **Faker** para criar informações como nomes, endereços e telefones.

Exemplo:
- Gerar professores com salários aleatórios.
- Criar alunos com datas de nascimento variadas.

---

### **4. `database/seeders`**

Define conjuntos de dados pré-carregados no banco, úteis para testes ou desenvolvimento. Eles utilizam os **factories** para popular tabelas com dezenas ou centenas de registros.

Exemplo:
- Criar 50 registros de alunos com dados fictícios.
- Criar 20 professores em áreas de ensino distintas.

---

### **5. `routes/web.php`**

Arquivo que define todas as rotas acessíveis pela aplicação. As rotas conectam URLs a controladores e métodos específicos.

Exemplo:
- Uma rota para visualizar alunos pode apontar para `AlunoController@index`.
- URLs amigáveis, como `/alunos`, são definidas aqui.

---

### **6. `app/Models`**

Representa as tabelas no banco de dados como classes PHP. Cada modelo:
- Define as colunas e relacionamentos da tabela.
- Encapsula lógica de manipulação dos dados.

Exemplo:
- O modelo `Aluno` pode ter métodos para calcular a idade de um aluno baseado em sua data de nascimento.

---

### **7. `resources/views`**

Contém os arquivos Blade, responsáveis por renderizar o frontend da aplicação. Aqui você encontrará os layouts e as páginas HTML da aplicação.

Exemplo:
- Um arquivo para exibir a lista de alunos.
- Layouts comuns usados em várias páginas (como o cabeçalho e rodapé).

---

## **Como Contribuir**

1. **Faça um fork do repositório.**
2. Crie uma branch para sua feature:

   ```bash
   git checkout -b minha-nova-feature
   ```

3. Faça suas alterações e commit:

   ```bash
   git commit -m "Descrição da nova feature"
   ```

4. Envie as alterações:

   ```bash
   git push origin minha-nova-feature
   ```

5. Abra um Pull Request explicando claramente sua contribuição.

---

## **Como Reportar Problemas**

1. Verifique a aba [Issues](https://github.com/seu-usuario/ohara/issues) para ver se o problema já foi relatado.
2. Caso contrário, crie uma nova issue com:
   - Descrição detalhada.
   - Passos para reproduzir o problema.
   - Logs ou prints relevantes.

Obrigado por contribuir com o **Ohara**! 🚀
