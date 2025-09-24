<section id="contato" class="section">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-copy">
                <h2>Vamos construir algo juntos?</h2>
                <p>Conte sobre seu projeto e retornaremos com próximos passos em até 24h úteis.</p>
                <ul class="contact-points">
                    <li>Kickoff em 30 minutos</li>
                    <li>Estimativa inicial e roadmap</li>
                    <li>Contrato flexível por sprint</li>
                    <li>Suporte e monitoramento</li>
                </ul>
                <div class="contact-info">
                    <div class="ci"><span class="ci-ico">📧</span><a
                            href="mailto:contato@devrad.example">contato@devrad.example</a></div>
                    <div class="ci"><span class="ci-ico">🌐</span><a href="#portfolio">Ver portfólio</a></div>
                </div>
            </div>

            <form class="contact card" method="post" action="contact_submit.php" novalidate>
                <div class="row two">
                    <label for="ct-nome">Nome
                        <input id="ct-nome" type="text" name="nome" placeholder="Seu nome" required>
                    </label>
                    <label for="ct-email">E-mail
                        <input id="ct-email" type="email" name="email" placeholder="voce@empresa.com" required>
                    </label>
                </div>
                <div class="row two">
                    <label for="ct-empresa">Empresa
                        <input id="ct-empresa" type="text" name="empresa" placeholder="Nome da empresa">
                    </label>
                    <label for="ct-assunto">Assunto
                        <input id="ct-assunto" type="text" name="assunto"
                            placeholder="Ex.: Novo produto, Integrações, Site">
                    </label>
                </div>
                <div class="row">
                    <label for="ct-msg">Mensagem
                        <textarea id="ct-msg" name="mensagem" rows="6" placeholder="Como podemos ajudar?"
                            required></textarea>
                    </label>
                </div>
                <div class="row">
                    <label class="chk"><input type="checkbox" name="aceite" required> Concordo em ser contactado pela
                        DEVRAD</label>
                </div>
                <div class="contact-actions">
                    <button class="btn btn-primary" type="submit">Enviar mensagem</button>
                    <button class="btn btn-ghost" type="reset">Limpar</button>
                </div>
            </form>
        </div>
    </div>
</section>