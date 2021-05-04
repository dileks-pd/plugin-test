const manipulateFn = (e) => {
  const body = document.querySelector('body')
  const interactArea = document.getElementById('smth')
  const submitBtn = document.getElementById('submit-btn')
  const popupGlobal = document.getElementById('modal-container')
  const closeBtn = document.getElementById('close-btn')
  body.addEventListener('mousemove', someFn)
  body.addEventListener('keydown', otherFn)
  popupGlobal.addEventListener('submit', removeClass)
  popupGlobal.action = 'popup-plugin.php'
  popupGlobal.method = 'POST'
  submitBtn.addEventListener('click', submitForm)
  closeBtn.addEventListener('click', closeFn)
}

window.onload = function () {
  inactivityTime()
}

document.addEventListener('DOMContentLoaded', manipulateFn)
document.addEventListener('DOMContentLoaded', otherFn)

const closeFn = () => {
  const overlayContainter = document.getElementById('overlay')
  const popup = document.getElementById('modal-container')
  console.log('fn')
  overlayContainter.classList.remove('modal-overlay')
  popup.classList.remove('modal-container')
}

const submitForm = () => {
  const popupGlobal = document.getElementById('modal-container')
  console.log('submitting')
  popupGlobal.submit()
}

const someFn = (event) => {
  const overlayContainter = document.getElementById('overlay')
  const popup = document.getElementById('modal-container')
  if (event.pageY < 245) {
    overlayContainter.classList.add('modal-overlay')
    overlayContainter.onclick = function (e) {
      // отменяю действие по-умолчанию. Без него клик в любой области приводит к перезагрузке страницы
      e.preventDefault()
    }
    popup.classList.add('modal-container')
  }
}

function displayPopup(event) {
  const overlayContainter = document.getElementById('overlay')
  const popup = document.getElementById('modal-container')
  overlayContainter.classList.add('modal-overlay')
  popup.classList.add('modal-container')
}

function otherFn(event) {
  const overlayContainter = document.getElementById('overlay')
  const popup = document.getElementById('modal-container')
  if (event.key === 'Escape') {
    overlayContainter.classList.remove('modal-overlay')
    popup.classList.remove('modal-container')
  }
}

function removeClass() {
  popupGlobal.classList.remove('modal-container')
}

// IDLE TIME DETECTION
var inactivityTime = function () {
  var time
  window.onload = resetTimer
  // DOM Events
  document.onmousemove = resetTimer
  document.onkeypress = resetTimer

  function resetTimer() {
    clearTimeout(time)
    time = setTimeout(displayPopup, 5000)
  }
}
