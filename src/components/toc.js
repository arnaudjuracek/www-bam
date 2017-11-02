'use strict'

import Sticky from './../js/sticky'

const defaultOpts = {
  anchorSelector: '.highlighter',
  tocSelector: '.highlightable',
  className: 'is-highlighted',
  offy: 0,
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})

  const sticky = Sticky({
    selector: opts.anchorSelector,
    className: opts.className,
    offy: opts.offy,
    onStick: el => highlight(el),
    onUnStick: el => highlight(el, false)
  })

  const toc = {}
  document.querySelectorAll(opts.tocSelector).forEach(el => {
    let id = el.getAttribute('href').substring(1) || null
    if (id) toc[id] = el
  })

  function highlight (el, state = true) {
    let id = el.id || null
    if (id === null || id === undefined) return false

    let tocEl = toc[id]
    if (tocEl) {
      if (state) tocEl.classList.add(opts.className)
      else tocEl.classList.remove(opts.className)
    }
  }
}
