'use strict'

const defaultOpts = {
  selector: 'ul li figure',
  class: 'gallery'
}

/* global Element */
// Element.closest polyfill
// SEE https://developer.mozilla.org/en-US/docs/Web/API/Element/closest

if (!Element.prototype.matches) {
  Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector
}

if (!Element.prototype.closest) {
  Element.prototype.closest = function (s) {
    var el = this
    if (!document.documentElement.contains(el)) return null
    do {
      if (el.matches(s)) return el
      el = el.parentElement
    } while (el !== null)
    return null
  }
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})

  let medias = document.querySelectorAll(opts.selector)
  if (!medias || !medias.length) return
  if (!medias.forEach) medias = [...medias]

  medias.forEach(media => {
    const li = media.closest('li')
    if (li) {
      !li.classList.contains(`${opts.class}-item`) && li.classList.add(`${opts.class}-item`)
      const ul = li.closest('ul')
      if (ul && ul.classList) {
        !media.classList.contains(`${opts.class}-media`) && media.classList.add(`${opts.class}-media`)
        !ul.classList.contains(opts.class) && ul.classList.add(opts.class)
      }
    }
  })
}
