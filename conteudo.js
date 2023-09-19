let descricaoAtual = null;

        function mostrarDescricao(recurso) {
            const descricao = {
                cadastro: "Crie uma conta única e personalizada para ter acesso exclusivo à sua área de checklist...",
                checklists: "Tenha o controle total sobre suas atividades acadêmicas. Crie e personalize checklists...",
                datas: "Nunca mais perca uma data importante! Insira datas de provas, entregas de trabalhos e outras atividades...",
                disciplinas: "Mantenha suas tarefas organizadas por disciplina, facilitando o acompanhamento do progresso...",
                lembretes: "Receba lembretes automáticos sobre atividades e prazos iminentes, garantindo que você esteja sempre um passo à frente.",
                progresso: "Acompanhe o andamento das suas atividades e veja o que ainda precisa ser concluído para cada disciplina.",
                acesso: "Nossa plataforma é totalmente responsiva, permitindo que você acesse seus checklists tanto pelo seu computador quanto pelo seu dispositivo móvel.",
                suporte: "Conte com nossa equipe de suporte para ajudá-lo com qualquer dúvida ou problema que possa surgir durante o uso da plataforma."
            };

            const descricaoElement = document.getElementById('descricao');

            if (descricaoAtual === recurso) {
                descricaoElement.innerHTML = '';
                descricaoElement.classList.remove('mostrar');
                descricaoAtual = null;
            } else {
                descricaoElement.innerHTML = `<p>${descricao[recurso]}</p>`;
                descricaoElement.classList.add('mostrar');
                descricaoAtual = recurso;
            }

            if (descricaoAtual === null) {
                descricaoElement.style.display = 'none'; // Esconde a descrição se nenhum item estiver selecionado
            } else {
                descricaoElement.style.display = 'block'; // Exibe a descrição se um item estiver selecionado
            }
        }