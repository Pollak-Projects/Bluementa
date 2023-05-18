import { v4 as uuidv4 } from "https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js";

function generateQuestion(oneData) {
    let returnDivElement = document.createElement(div)
    returnDivElement.id = uuidv4();
    returnDivElement.className = "answers"

    if (oneData.question_type == "1") {
        let fejlec = document.createElement("h5")
        fejlec.innerText = oneData.question_question
        returnDivElement.appendChild(fejlec)

        let leiras = document.createElement("p")
        leiras.innerText = oneData.question_description
        returnDivElement.appendChild(leiras)

        let valaszokbody = document.createElement("div")
        valaszokbody.id = oneData.question_id
        returnDivElement.appendChild(valaszokbody)

        for (let valasz of oneData.question_answers.split(';')) {
            let valaszbody = document.createElement("div")
            valaszbody.className = "form-check"
            document.getElementById(kerdes.question_id).appendChild(valaszbody)

            let radio = document.createElement("input")
            radio.type = "radio"
            radio.className = "form-check-input"
            radio.id = valasz
            radio.name = oneData.question_answer
            valaszbody.appendChild(radio)

            let label = document.createElement("label")
            label.for = oneData.question_answer
            label.innerText = valasz
            valaszbody.appendChild(label)
        }
    }
    else if (oneData.question_type == "2") {
        let fejlec = document.createElement("h5")
        fejlec.innerText = oneData.question_question
        returnDivElement.appendChild(fejlec)

        let leiras = document.createElement("p")
        leiras.innerText = oneData.question_description
        returnDivElement.appendChild(leiras)

        let valaszokbody = document.createElement("div")
        valaszokbody.id = oneData.question_id
        returnDivElement.appendChild(valaszokbody)

        for (let valasz of oneData.question_answers.split(';')) {
            let valaszbody = document.createElement("div")
            valaszbody.className = "form-check"
            document.getElementById(oneData.question_id).appendChild(valaszbody)

            let radio = document.createElement("input")
            radio.type = "checkbox"
            radio.className = "form-check-input"
            radio.id = valasz
            radio.name = oneData.question_answer
            valaszbody.appendChild(radio)

            let label = document.createElement("label")
            label.for = oneData.question_answer
            label.innerText = valasz
            valaszbody.appendChild(label)
        }
    }
    else if (oneData.question_type == "3") {
        let fejlec = document.createElement("h5")
        fejlec.innerText = oneData.question_question
        returnDivElement.appendChild(fejlec)

        let leiras = document.createElement("p")
        leiras.innerText = oneData.question_description
        returnDivElement.appendChild(leiras)

        let container = document.createElement("div")
        container.id = oneData.question_id

        let partSelect = document.createElement("select")

        let valaszok = oneData.question_answers.split(';')

        for (let a = 0; a < valaszok.length; a++) {
            partOption = document.createElement("option")

            partOne = valaszok[a].split(':')[0];

            partOption.value = partOne
            partOption.innerText = partOne

            partSelect.appendChild(partOption)
        }

        for (let index = 0; index < valaszok.length / 2; index++) {
            let par = document.createElement("div")
            par.id = oneData.question_id

            let egyikpar = partSelect.cloneNode(true)
            par.appendChild(egyikpar)

            let masikPar = partSelect.cloneNode(true)
            par.appendChild(masikPar)

            container.appendChild(par)
        }

        returnDivElement.appendChild(container)
    }
    else if (oneData.question_type == "4") {
        let fejlec = document.createElement("h5")
        fejlec.innerText = oneData.question_question
        returnDivElement.appendChild(fejlec)

        let leiras = document.createElement("p")
        leiras.innerText = oneData.question_description
        returnDivElement.appendChild(leiras)

        let container = document.createElement("div")
        container.id = oneData.question_id
        valaszok = oneData.question_answers.split(';')

        let inputField = document.createElement("select")
        for (let a = 0; a <= valaszok.length; a++) {
            let inputFieldOption = document.createElement("option")
            inputFieldOption.value = a
            inputFieldOption.innerText = a
            inputField.appendChild(inputFieldOption)
        }

        let c = 0
        for (let valasz of valaszok) {
            let row = document.createElement("div")

            let jelenlegiValasz = document.createElement("p")
            jelenlegiValasz.innerText = valasz
            jelenlegiValasz.style = "display: inline;"

            row.appendChild(inputField.cloneNode(true))
            row.appendChild(jelenlegiValasz)
            container.appendChild(row)

        }

        returnDivElement.appendChild(container)
    }
    else if (oneData.question_type == "4") {
        let fejlec = document.createElement("h5")
        fejlec.innerText = oneData.question_question
        returnDivElement.appendChild(fejlec)

        let leiras = document.createElement("p")
        leiras.innerText = oneData.question_description
        returnDivElement.appendChild(leiras)

        let dragContainer = document.createElement("div")
        dragContainer.className = "container text-center"
        dragContainer.id = oneData.question_id

        let dragRow = document.createElement("div")
        dragRow.className = "row"

        let dragkartya = document.createElement("div")
        dragkartya.className = "col"
        dragkartya.id = oneData.question_id + "_draglist"

        dragRow.appendChild(dragkartya)
        dragContainer.appendChild(dragRow)
        returnDivElement.appendChild(dragContainer)

        for (let valasz of oneData.question_answers.split(';')) {
            let lista = document.getElementById(oneData.question_id + "_draglist")
            let dragButton = document.createElement("button")
            dragButton.style = "display:flex"
            dragButton.setAttribute("draggable", "true");
            dragButton.innerHTML = valasz
            lista.appendChild(dragButton)
        }
    }

    return returnDivElement
}