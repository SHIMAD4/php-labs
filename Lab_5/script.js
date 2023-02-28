const arrOfButtons = document.querySelectorAll('.btn'),
      inputScreen  = document.querySelector('#input'),
      outputScreen  = document.querySelector('#output')

arrOfButtons.forEach(btn => {
    btn.addEventListener('click', (event) => {
        event.preventDefault()
        inputScreen.value += btn.innerText
        if(btn.getAttribute('data-value') == '=') {
            inputScreen.value = inputScreen.value.slice(0, -1)
            let result = 0
            result = eval(inputScreen.value)
            outputScreen.value = result
        }
        if(btn.getAttribute('data-value') == 'AC') {
            inputScreen.value  = ''
            outputScreen.value = ''
        }
    })
})