'use strict'

const defaultOpts = {
  pusher: '.metas',
  selector: '.footnotes li',
  backrefNotation: 'fnref-%v',
  offy: 0,
  margin: 10
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})

  let footnotes = document.querySelectorAll(opts.selector)

  if (!footnotes || !footnotes.length) return
  if (!footnotes.forEach) footnotes = [...footnotes]

  footnotes.forEach(el => el.classList.add('is-loading'))

  window.addEventListener('load', calc)
  window.addEventListener('resize', () => window.requestAnimationFrame(calc))

  function calc () {
    const pusher = document.querySelector(opts.pusher)
    const initialY = pusher && pusher.clientHeight > 0 ? pusher.clientHeight + opts.offy + opts.margin : 0
    let nextMinY = initialY

    footnotes.forEach(el => {
      const backrefID = opts.backrefNotation.replace('%v', el.value)
      const backref = document.getElementById(backrefID)

      let y = backref.offsetParent.offsetTop + opts.offy
      if (y < nextMinY) y = nextMinY

      el.style.position = 'absolute'
      el.style.top = y + 'px'

      nextMinY = y + el.clientHeight + opts.margin

      el.classList.remove('is-loading')
      el.classList.add('is-loaded')
    })

    // Force <main> to be as tall as the footnote container.
    // This allows a sticky footer to sticky to the bottom of the page if the footnotes
    // go below <main>.
    const main = document.querySelector('main')
    const footnotesContainerHeight = nextMinY + 65
    if (footnotesContainerHeight > main.clientHeight) main.style.minHeight = footnotesContainerHeight + 'px'
  }
}
