## Trabalho acadêmico — Página em PHP (DEVRAD)

Projeto acadêmico que desenvolve uma página institucional usando PHP, SCSS e JavaScript. O site simula uma software house fictícia chamada DEVRAD e carrega parte do conteúdo a partir de arquivos JSON.

### Objetivos didáticos
- Exercitar PHP com includes e renderização de dados vindos de JSON.
- Organizar o projeto em parciais para facilitar manutenção.
- Aplicar estilos modernos (gradientes, glassmorphism) e interações em JS.

### Tecnologias
- PHP 8+
- SCSS (compilado para CSS)
- JavaScript (ES5+)
- Dados em JSON (portfólio, clientes, timeline, depoimentos)

### Como executar localmente
1. Abra o PowerShell na pasta do projeto:
   - `C:\Users\user\Documents\GitHub\aula-php`
2. Inicie o servidor embutido do PHP:
   ```bash
   php -S localhost:8000 -t .
   ```
3. Acesse no navegador: `http://localhost:8000`

### Estrutura de pastas (resumo)
- `index.php`: ponto de entrada; inclui as seções via `partials/*.php`.
- `partials/`: seções separadas do layout
  - `header.php`, `hero.php`, `services.php`, `metrics.php`, `portfolio.php`, `clients.php`, `timeline.php`, `testimonials.php`, `cta.php`, `about.php`, `contact.php`, `footer.php`
- `assets/css/style.scss`: origem dos estilos (SCSS)
- `assets/css/style.css`: CSS gerado (compilado)
- `assets/js/app.js`: interações (contadores, carrossel, toasts, submit do formulário)
- `assets/data/`: dados em JSON
  - `portfolio.json`, `clients.json`, `timeline.json`, `testimonials.json`
- `contact_submit.php`: endpoint PHP que valida e responde ao formulário

### Funcionalidades implementadas
- Hero com chamada, botões e badges.
- Seção de serviços com ícones SVG e microcopy.
- Métricas com animação de contagem ao entrar em viewport.
- Portfólio gerado por `assets/data/portfolio.json`.
- Clientes em “bolhas” com SVGs coloridos a partir de `clients.json`.
- Timeline histórica carregada de `timeline.json`.
- Depoimentos em carrossel horizontal via `testimonials.json`.
- CTA persuasiva com ilustração SVG.
- Sobre (pilares, stack, cards de fundadores).
- Contato em 2 colunas com formulário e toasts.
- Backend de contato em `contact_submit.php` (retorno JSON, validação e log).

### Estilos (SCSS)
- Edite `assets/css/style.scss` e gere `assets/css/style.css`.

Opções de compilação:
```bash
sass assets/css/style.scss assets/css/style.css --style=expanded --no-source-map
```
Ou usando a extensão “Live Sass Compiler” (VS Code) com Watch.

### Validação e toasts
- Validação básica de e-mail no front.
- Mensagens de sucesso/erro via toasts (container presente no `index.php`).

### Observações
- Os SVGs dos clientes possuem IDs de gradiente ajustados dinamicamente para evitar conflitos.
- O projeto foi organizado em parciais para facilitar manutenção e reuso.

### Possíveis extensões (opcional)
- Persistir contatos em banco de dados.
- Páginas internas de portfólio (cases).
- Testes automatizados (PHPUnit) e pipeline simples de build.
