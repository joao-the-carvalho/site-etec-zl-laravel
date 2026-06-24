# ETEC Zona Leste — Site Institucional

Projeto escolar desenvolvido com Laravel e Breeze, simulando o site da ETEC Zona Leste com sistema de autenticação, gerenciamento de cursos, eventos e usuários.

---

## Tecnologias

- Laravel 13
- Laravel Breeze (autenticação)
- MySQL

---

## Funcionalidades

### Público (sem login)
- Página inicial com cursos e eventos em destaque
- Listagem e detalhes de cursos
- Listagem e detalhes de eventos
- Página de contato com localização da ETEC no Google Maps

### Autenticado (aluno/professor)
- Login

### Administrador (professor)
- CRUD completo de cursos (com imagem, turno, vagas, período)
- CRUD completo de eventos (com imagem, data, turno, vagas, local)
- Gerenciamento de usuários (cadastrar alunos e professores, editar email/senha, excluir)

---

## Perfis de Usuário

| Perfil | Registro | Login | CRUD Cursos/Eventos | Gerenciar Usuários |
|---|---|---|---|---|
| Aluno | ❌ (cadastrado pelo admin) | ✅ | ❌ | ❌ |
| Professor | ❌ (cadastrado pelo admin) | ✅ | ✅ | ✅ |

> O registro público está desativado. Apenas administradores (professores) cadastram novos usuários.

---

## Instalação

### Pré-requisitos

- PHP 8.2+
- Composer
- Node.js 18+
- MySQL

### Passo a passo

**1. Clonar o repositório**
```bash
git clone https://github.com/seu-usuario/site-etec-zl.git
cd site-etec-zl
```

**2. Instalar dependências PHP**
```bash
composer install
```

**3. Instalar dependências Node**
```bash
npm install
```

**4. Configurar o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

Edite o `.env` com as credenciais do banco:
```env
DB_DATABASE=site_etec_zl
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

**5. Rodar as migrations**
```bash
php artisan migrate
```

**6. Criar link do storage (para imagens)**
```bash
php artisan storage:link
```

**7. Compilar assets**
```bash
npm run build
```

**8. Criar o usuário administrador**
```bash
php artisan tinker
```
```php
App\Models\User::create([
    'name' => 'admin',
    'email' => 'admin@etec.sp.gov.br',
    'email_verified_at' => now(),
    'password' => Hash::make('sua_senha'),
    'is_admin' => true,
    'role' => 'professor',
]);
```

**9. Iniciar o servidor**
```bash
php artisan serve
npm run dev
```

Acesse: [http://localhost:8000](http://localhost:8000)

---

## Estrutura de Rotas

| Método | Rota | Acesso | Descrição |
|---|---|---|---|
| GET | `/` | Público | Página inicial |
| GET | `/cursos` | Público | Listagem de cursos |
| GET | `/cursos/{id}` | Público | Detalhes do curso |
| GET | `/cursos/create` | Admin | Formulário de novo curso |
| POST | `/cursos` | Admin | Salvar curso |
| GET | `/cursos/{id}/edit` | Admin | Formulário de edição |
| PUT | `/cursos/{id}` | Admin | Atualizar curso |
| DELETE | `/cursos/{id}` | Admin | Excluir curso |
| GET | `/eventos` | Público | Listagem de eventos |
| GET | `/eventos/{id}` | Público | Detalhes do evento |
| GET | `/eventos/create` | Admin | Formulário de novo evento |
| POST | `/eventos` | Admin | Salvar evento |
| GET | `/eventos/{id}/edit` | Admin | Formulário de edição |
| PUT | `/eventos/{id}` | Admin | Atualizar evento |
| DELETE | `/eventos/{id}` | Admin | Excluir evento |
| GET | `/contato` | Público | Página de contato |
| GET | `/admin/usuarios` | Admin | Listagem de usuários |
| GET | `/admin/usuarios/create` | Admin | Formulário de novo usuário |
| POST | `/admin/usuarios` | Admin | Salvar usuário |
| GET | `/admin/usuarios/{id}/edit` | Admin | Editar email/senha |
| PUT | `/admin/usuarios/{id}` | Admin | Atualizar usuário |
| DELETE | `/admin/usuarios/{id}` | Admin | Excluir usuário |

---

## Estrutura de Pastas (Views)

```
resources/views/
├── layouts/
│   └── app.blade.php
├── home.blade.php
├── contato.blade.php
├── cursos/
│   ├── _form.blade.php
│   ├── index.blade.php
│   ├── show.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── eventos/
│   ├── _form.blade.php
│   ├── index.blade.php
│   ├── show.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
└── admin/
    └── usuarios/
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php
```

---

## Banco de Dados

```
users
├── id
├── name
├── email
├── is_admin (boolean)
├── role (aluno | professor)
├── email_verified_at
├── password
└── timestamps

cursos
├── id
├── nome
├── descricao
├── turno (Manhã | Tarde | Noite)
├── vagas
├── periodo
├── imagem (nullable)
└── timestamps

eventos
├── id
├── nome
├── descricao
├── data
├── turno (Manhã | Tarde | Noite)
├── vagas (nullable)
├── local
├── imagem (nullable)
└── timestamps
```

---

## Observações

- A conta `admin@etec.sp.gov.br` não pode ser excluída pelo painel de usuários
- Imagens são armazenadas em `storage/app/public/` e servidas via link simbólico
- O tema escuro é forçado via classe `dark` no `<html>` e variáveis CSS do Tailwind
- Registro público desativado em `routes/auth.php`

---

Desenvolvido por João Victor de Paiva Carvalho — ETEC Zona Leste