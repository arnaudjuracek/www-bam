'use strict'

const defaultOpts = {
  selector: '.footnotes li',
  backrefNotation: 'fnref-%v',
  offy: 0,
  margin: 10,
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})

  const footnotes = document.querySelectorAll(opts.selector)
  footnotes.forEach(el => el.classList.add('is-loading'))

  window.addEventListener('load', calc)
  window.addEventListener('resize', () => requestAnimationFrame(calc))

  function calc () {
    let nextMinY = 0

    footnotes.forEach(el => {
      const backrefID = opts.backrefNotation.replace('%v', el.value)
      const backref = document.getElementById(backrefID)

      let y = backref.offsetTop + opts.offy
      if (y < nextMinY) y = nextMinY

      el.style.position = 'absolute'
      el.style.top = y + 'px'

      nextMinY = y + el.clientHeight + opts.margin

      el.classList.remove('is-loading')
      el.classList.add('is-loaded')
    })
  }
}

