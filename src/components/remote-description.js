'use strict'

const defaultOpts = {
  selector: '.preview-project-infos',
  container: 'aside.outside',
  offy: 0
}

export default function (opts) {
  opts = Object.assign({}, defaultOpts, opts || {})
  const container = document.querySelector(opts.container)

  if (container) {
    const remotes = []
    document.querySelectorAll(opts.selector).forEach(el => {
      const parent = el.parentNode
      parent.classList.add('has-remote-description')

      const remote = el.cloneNode(true)
      remote.className = 'remote-description is-hidden'
      remote.parent = parent
      remotes.push(remote)
      container.appendChild(remote)

      parent.addEventListener('mouseover', () => show(remote))
      parent.addEventListener('mouseout', () => hide(remote))

    })

    window.addEventListener('load', () => {
      remotes.forEach(remote => {
        const y = remote.parent.parentNode.offsetTop + opts.offy
        remote.style.position = 'absolute'
        remote.style.top = y + 'px'
      })
    })
  }

  function show (remote) {
    remote.classList.remove('is-hidden')
    remote.classList.add('is-visible')
  }

  function hide (remote) {
    remote.classList.add('is-hidden')
    remote.classList.remove('is-visible')
  }
}

