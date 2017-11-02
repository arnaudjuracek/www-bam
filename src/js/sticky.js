'use strict'

const defaultOpts = {
  selector: '.is-sticky',
  className: 'is-sticked',
  offy: 0,
  onStick: null,
  onUnStick: null,
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})

  const elems = document.querySelectorAll(opts.selector)

  if (elems) {
    window.addEventListener('load', () => {
      elems.forEach(el => {
        el.y = window.pageYOffset + el.getBoundingClientRect().top
        el.offy = opts.offy || 0
        stick(el)
      })
    })

    window.addEventListener('scroll', () => {
      requestAnimationFrame(() => elems.forEach(el => stick(el)))
    })
  }


  function stick (el) {
    if (el === undefined || el === null) return false

    let y = window.pageYOffset
    if (el.classList.contains(opts.className)) {
      if (el.y > y + el.offy) {
        el.classList.remove(opts.className)
        typeof opts.onUnStick === 'function' && opts.onUnStick(el)
      }
    } else {
      if (el.y < y + el.offy) {
        el.classList.add(opts.className)
        typeof opts.onStick === 'function' && opts.onStick(el)
      }
    }
  }
}
