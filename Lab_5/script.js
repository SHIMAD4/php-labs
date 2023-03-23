const arrOfButtons = document.querySelectorAll('.btn'),
      inputScreen  = document.querySelector('#input'),
      outputScreen  = document.querySelector('#output')

arrOfButtons.forEach(btn => {
    btn.addEventListener('click', () => {
        if(btn.getAttribute('data-value').indexOf('0123456789+-*/AC')) {
            inputScreen.value += btn.innerText
            if(btn.getAttribute('data-value') == 'AC') {
                inputScreen.value  = ''
                outputScreen.value = ''
            }
        }
    })
})