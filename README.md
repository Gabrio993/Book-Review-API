# Book-Review-API
Developing REST APIs for a book review service  

# Linee Guida per la Collaborazione

## Situazione Attuale

Attualmente, la repository è strutturata come segue:

- **Branch `main`**: Contiene la struttura principale del progetto.
- **Branch `development`**: È il branch di sviluppo dal quale ogni membro del team dovrà partire per le proprie modifiche.

## Creazione di Branch Personali

Ogni membro del team dovrebbe seguire questi passaggi per lavorare:

1. **Passare al branch `development`**:
   ```bash
   git checkout development
   ```
2. **Creare un branch personale**: Utilizzare un nome convenzionale per i branch, ad esempio `nome_membro_feature`  
    ```bash
    git checkout -b nome_membro_feature
    ```
3. **Lavorare sul proprio branch**: Fare commit delle modifiche man mano che si procede. Usare una convenzione anche per i commit.  
    Consiglio estensione di vscode **Conventional Commits** 

4. **Pushare il branch sul remoto**: La prima volta che si effettua il push, utilizzare:  
    ```bash
    git push -u origin nome_membro_feature
    ```
    Per le successive modifiche basterà usare `git push`  

## Creazione di Pull Request  

Quando un membro ha completato il lavoro e desidera unire le modifiche al branch development, deve:

1. Creare una pull request (PR) dal proprio branch al branch development su GitHub.  

2. Revisione e discussione: Gli altri membri del team possono rivedere la PR e discutere eventuali modifiche necessarie.  

## Accortezze da tenere a mente

1. **sincronizzazione**: Prima di iniziare a lavorare, assicurati di avere l'ultima versione del branch `development`:  
    ```bash
    git checkout development
    git pull origin development
    ```
2. **Commit frequenti**: Fai commit delle tue modifiche frequentemente e con messaggi chiari per rendere la storia del progetto comprensibile agli altri.  

3. **Codice e commenti**: Cerca di utilizzare una scrittura del codice pulita, coerente e ordinata per tutto il progetto.  
     Mantieni coerenza con l'indentazione e aggiungi commenti significativi al codice.  

4. **Documentazione**: Se stai implementando una nuova funzionalità o facendo modifiche significative, considera di aggiornare  
     anche la documentazione nel README o in altri file pertinenti.  

5. **Comunicazione**: Mantieni una comunicazione aperta con il team riguardo allo stato del tuo lavoro e chiedi aiuto se necessario.  

## Prossimo Step

Entro venerdì bisognerebbe arrivare con l'API funzionante per quanto riguarda le operazioni CRUD (create, update, delete) delle entità scelte.  

Oggi abbiamo deciso di suddividere il lavoro in funzione delle varie entità che abbiamo in modo che ognuno di noi  
possa lavorare su tutta l'architettura MVC.

Le entità che abbiamo sono:  
1. autore --> Francesco.
2. libro --> Gabriele F.
3. casa_editrice --> Ale/Gabriele C.
4. recensione --> Gabriel
5. utente --> Serena    





