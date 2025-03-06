import ajaxPost from './modules/ajaxpost.js'

const loginForm = document.querySelector('form')

// Form on submit
loginForm.onsubmit = event => {
  event.preventDefault()

  const formData = new FormData(loginForm);

  ajaxPost('/login/ajax', formData)
  .then(data => {
    console.log(data) // use this line and comment all code below on debugging
    return
    if(data.error === 403){
      window.location.assign('/fail/403')
      return
    }

    window.location.reload()
  })
}
