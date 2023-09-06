# Contribuindo para o Correios PHP

Primeiramente, muito obrigado por sua contribuição!

Este projeto e todos os participantes estão sob o regimento deste **código de conduta**. Ao participar, espera-se que você mantenha este código.

**Contribuições** são **muito bem vindas** e serão totalmente [**creditadas**](https://github.com/devaguia/correios-php/graphs/contributors).

Nós valorizamos muito as [**contribuições por Pull Requests (PR)**](https://github.com/devaguia/correios-php/pulls) em [GitHub](https://github.com/devaguia/correios-php), mas também adoramos **sugestões de novas features**. Por isso, fique à vontade para **reportar um bug** ou **parabenizar o projeto!**

## Requisitos de um bom Pull Request (PR) para Correios PHP

- **Branches separadas** - Recomendamos que o PR não seja a partir da sua branch `master`.

- **Um PR por feature** - Se você deseja ajudar em mais de uma feature, envie múltiplos PRs :grin:.

- **Clareza** - Além de uma boa descrição sobre a motivação e a solução proposta é possível incluir imagens ou animações que demonstrem quaisquer modificações visuais na interface.

Exemplo de **Motivação** com uma **Solução Proposta**:
### Motivação

> Tratar os dados retornados pela API de CEP

### Solução proposta

> Criar uma nova classe para que os dados de retorno da API sejam validados e tratatos pela biblioteca. 

- **Foco** - Um PR deve possuir um único objetivo bem definido. Evite mais de um viés (bug-fix, feature, refactoring) no mesmo PR.

- **Formatação de código** - Não reformate código que não foi modificado. A reformatação de código deve ser feita exclusiva e obrigatoriamente nos trechos de código que foram afetados pelo contexto da sua alteração.

- **Fragmentação** - Quando um PR for parte de uma tarefa e não entregar valor de forma isolada, será necessário explicitar na motivação quais são os objetivos da tarefa, e na solução proposta, os objetivos que foram concluídos no PR em questão e os que serão concluídos em PRs futuros.

#### Se você nunca criou um Pull Request (PR) na vida, [segue aqui a documentação do GitHub](https://docs.github.com/pt/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request).

1. Faça um [fork](https://docs.github.com/pt/get-started/quickstart/fork-a-repo) do projeto, clone seu repositório (fork):

   ```bash
   # Clone repositório (fork) na pasta corrente
   git clone https://github.com/<username>/correios-php
   # Navegue ate a pasta recém clonada
   cd correios-php
   ```

2. Crie uma branch nova a partir da `master` que vai conter o "tipo/tópico" como nome da branch
- tipos: feature e fix

   ```bash
   git checkout -b feature/cria_metodo_pagamento
   ```

3. Faça um push da sua branch para seu repositório (fork)

   ```bash
   git push -u origin feature/cria_metodo_pagamento
   ```

4. [Abra um Pull Request](https://docs.github.com/pt/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/about-pull-requests) com uma motivação e solução proposta bem claras.


## Revisão da Comunidade

A revisão deve verificar se o PR atende aos requisitos abaixo, na ordem que são apresentados, e a decisão final ficaria com a
equipe Vindi quanto à prioridade:

#### Correto

- O código realmente faz o que o autor está propondo?
- O tratamento de erros está adequado?

#### Seguro

- As modificações introduzem vulnerabilidades de segurança?
- Dados sensíveis estão sendo tratados da maneira correta?

#### Legível

- O código está legível?
- Métodos, classes e variáveis foram nomeadas apropriadamente?
- Os padrões definidos pelo projeto ou pela equipe estão sendo respeitados?

## 
**Agradecemos usa participação!**

<br/>

---
# Contributing to Correios PHP

Firstly, thank you very much for your contribution!

This project and all participants are under the rules of this **code of conduct**. By participating, it is expected that you adhere to this code.

**Contributions** are **very welcome** and will be fully [**credited**](https://github.com/devaguia/correios-php/graphs/contributors).

We highly value [**contributions through Pull Requests (PRs)**](https://github.com/devaguia/correios-php/pulls) on [GitHub](https://github.com/devaguia/correios-php), but we also love **suggestions for new features**. So, feel free to **report a bug** or **congratulate the project!**

## Requirements for a Good Pull Request (PR) for Correios PHP

- **Separate Branches** - We recommend that the PR is not made from your `master` branch.

- **One PR per Feature** - If you want to help with more than one feature, submit multiple PRs :grin:.

- **Clarity** - In addition to a good description of the motivation and proposed solution, you can include images or animations that demonstrate any visual modifications to the interface.

Example of **Motivation** with a **Proposed Solution**:
### Motivation

> Handling data returned by the ZIP code API.

### Proposed Solution

> Create a new class so that the return data from the API is validated and processed by the library.

- **Focus** - A PR should have a single well-defined objective. Avoid more than one focus (bug-fix, feature, refactoring) in the same PR.

- **Code Formatting** - Do not reformat code that has not been modified. Code reformatting should only be done exclusively and mandatorily in code sections affected by the context of your change.

- **Fragmentation** - When a PR is part of a task and does not deliver value in isolation, you must explicitly state in the motivation what the task's objectives are, and in the proposed solution, the objectives that were completed in the PR at hand and those that will be completed in future PRs.

#### If you've never created a Pull Request (PR) before, [here is the GitHub documentation](https://docs.github.com/pt/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/creating-a-pull-request).

1. Fork the project, clone your repository (fork):

   ```bash
   # Clone repository (fork) into the current folder
   git clone https://github.com/<username>/correios-php
   # Navigate to the newly cloned folder
   cd correios-php
   ```

2. Create a new branch from `master` with the "type/topic" as the branch name.
- Types: feature and fix

   ```bash
   git checkout -b feature/cria_metodo_pagamento
   ```

3. Push your branch to your repository (fork)

   ```bash
   git push -u origin feature/cria_metodo_pagamento
   ```

4. [Open a Pull Request](https://docs.github.com/pt/pull-requests/collaborating-with-pull-requests/proposing-changes-to-your-work-with-pull-requests/about-pull-requests) with a clear motivation and proposed solution.

## Community Review

The review should check if the PR meets the following requirements, in the order presented, and the final decision would be with the Vindi team regarding priority:

#### Correct

- Does the code really do what the author is proposing?
- Is error handling appropriate?

#### Secure

- Do the changes introduce security vulnerabilities?
- Are sensitive data being handled correctly?

#### Readable

- Is the code readable?
- Have methods, classes, and variables been named appropriately?
- Are the standards defined by the project or the team being respected?

## 
**We appreciate your participation!**