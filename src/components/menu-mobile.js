'use strict'

const defaultOpts = {
  selector: '.menu-mobile li',
  class: 'is-open'
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})
  window.addEventListener('load', () => {
    let categories = document.querySelectorAll(opts.selector)

    if (!categories || !categories.length) return

    // iOS hack
    if (!categories.forEach) categories = [...categories]

    categories.forEach(cat => {
      const clone = cat.cloneNode(true)
      clone.classList.add(opts.class)

      const expandedClone = cat.parentNode.appendChild(clone)
      const height = expandedClone.offsetHeight

      expandedClone.remove()

      cat.style.setProperty('--height', height + 'px')

      cat.addEventListener('click', () => {
        console.log(cat)
        categories.forEach(c => c.classList && c.classList.contains(opts.class) && c.classList.remove(opts.class))

        if (!cat) return
        if (cat.classList) cat.classList.add(opts.class)
      })
    })
  }, false)
}
