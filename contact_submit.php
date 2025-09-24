<?php
// Simples handler de POST: valida campos básicos, loga no terminal (stdout) e retorna JSON de sucesso

header('Content-Type: application/json; charset=utf-8');

// Coleta segura
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$empresa = isset($_POST['empresa']) ? trim($_POST['empresa']) : '';
$assunto = isset($_POST['assunto']) ? trim($_POST['assunto']) : '';
$mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';
$aceite = isset($_POST['aceite']) ? true : false;

// Validação mínima
$erros = [];
if ($nome === '') {
  $erros[] = 'Nome é obrigatório.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $erros[] = 'E-mail inválido.';
}
if ($mensagem === '') {
  $erros[] = 'Mensagem é obrigatória.';
}
if (!$aceite) {
  $erros[] = 'É necessário concordar em ser contactado.';
}

if (!empty($erros)) {
  http_response_code(400);
  echo json_encode(['ok' => false, 'errors' => $erros], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  exit;
}

// Loga no "terminal" (stdout do servidor). Em ambientes como PHP -S ou Apache/Nginx, irá para o log de erro/acesso.
error_log('Contato recebido: ' . json_encode([
  'nome' => $nome,
  'email' => $email,
  'empresa' => $empresa,
  'assunto' => $assunto,
  'mensagem' => $mensagem,
  'aceite' => $aceite,
  'quando' => date('c'),
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

echo json_encode([
  'ok' => true,
  'message' => 'Mensagem enviada com sucesso. Entraremos em contato em breve.',
  'data' => [
    'nome' => $nome,
    'email' => $email,
    'empresa' => $empresa,
    'assunto' => $assunto,
    'mensagem' => $mensagem,
  ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
