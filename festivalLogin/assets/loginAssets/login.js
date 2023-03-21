// Variáveis globais
const user = document.getElementById('user')
const pass = document.getElementById('pass')
const btnSubmit = document.getElementById('submit')
const error = document.querySelector('.error')

const eye = document.getElementById('eye')

function eyeClick() {
    const typePass = pass.type == 'password'

    if (typePass) {
        showPassword()
    } else {
        hidePassword()
    }
}

function showPassword() {
    pass.setAttribute('type', 'text')
    eye.src = './imgs/eye-close.svg'
}

function hidePassword() {
    pass.setAttribute('type', 'password')
    eye.src = './imgs/eye-open.svg'
}

validateError()
validateForm()