<header style="position:relative;">
    S.O.P.R.O - Sistema de Operações e Pesquisa de Riscos Ocultos
    <button class="btn" style="position:absolute;top:18px;right:32px;font-size:0.95rem;z-index:10;" onclick="document.getElementById('modalInfos').style.display='block'">? Infos Gerais</button>
</header>
<!-- Modal Infos Gerais -->
<div id="modalInfos" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(26,26,26,0.98);z-index:9999;overflow:auto;">
    <div style="max-width:600px;margin:60px auto;background:#181818;border:2px solid #00ff00;border-radius:12px;box-shadow:0 0 24px #00ff00cc;padding:32px;position:relative;color:#e0e0e0;font-family:'Fira Code',monospace;">
        <button onclick="document.getElementById('modalInfos').style.display='none'" style="position:absolute;top:18px;right:18px;background:#00ff00;color:#181818;border:none;border-radius:4px;padding:6px 14px;font-weight:bold;cursor:pointer;">Fechar</button>
        <h2 style="color:#00ff00;text-shadow:0 0 8px #00ff00;">Documentação Rápida</h2>
        <ul style="margin-top:18px;line-height:1.7;">
            <li><b>Designação</b>: Código único da anomalia, ex: EA-074-BR. Use letras, números e hífens.</li>
            <li><b>Apelido</b>: Nome popular ou apelido da anomalia.</li>
            <li><b>Classe de Risco</b>: Nível de perigo da anomalia. As principais classes são:
                <ul style="margin-top:6px;">
                    <li><b>Seguro</b>: Fácil de conter, não representa ameaça se os procedimentos forem seguidos.</li>
                    <li><b>Euclídeo</b>: Requer atenção especial, pode ser imprevisível ou difícil de conter totalmente.</li>
                    <li><b>Keter</b>: Extremamente difícil de conter, representa grande risco e exige procedimentos rigorosos.</li>
                    <li><b>Thaumiel</b>: Utilizada para conter outras anomalias, geralmente colaborativa com a Fundação.</li>
                    <li><b>Neutro</b>: Não apresenta risco ou já foi neutralizada.</li>
                    <li><b>Apollyon</b>: Impossível de conter, ameaça existencial.</li>
                </ul>
            </li>
            <li><b>Descrição</b>: Explique o que é a anomalia, suas características e comportamentos.</li>
            <li><b>Procedimentos de Contenção</b>: Detalhe como manter a anomalia segura e sob controle.</li>
            <li><b>Imagem da Anomalia</b>: Faça upload de uma imagem ilustrativa ou real.</li>
            <li><b>Sítio de Contenção</b>: Local onde a anomalia está contida. Cadastre sítios em "Gerenciar Sítios".</li>
        </ul>
        <hr style="border-color:#00ff00;">
        <h3 style="color:#00ff00;">Menus do Sistema</h3>
        <ul style="margin-top:10px;line-height:1.7;">
            <li><b>Dashboard</b>: Destaques das anomalias.</li>
            <li><b>Registrar Nova Anomalia</b>: Cadastro de novas entidades.</li>
            <li><b>Listar Anomalias Contidas</b>: Visualização e gestão das anomalias.</li>
            <li><b>Gerenciar Sítios de Contenção</b>: Cadastro e edição dos locais de contenção.</li>
        </ul>
        <hr style="border-color:#00ff00;">
        <p style="margin-top:18px;font-size:0.98rem;color:#00ff00;">Consulte esta documentação para garantir o correto preenchimento dos campos e navegação no sistema S.O.P.R.O.</p>
    </div>
</div>
