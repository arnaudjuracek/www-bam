'use strict'

import MOBILE from './js/is-mobile'
import SmoothScroll from 'smooth-scroll'
import Blazy from 'blazy'
import Zoom from 'medium-zoom'
import TocHighlighter from './components/toc'
import Footnotes from './components/footnotes'
import RemoteDescription from './components/remote-description'
import Gallery from './components/gallery'

const blazy = new Blazy({
  selector: 'figure.lazyload img',
  successClass: 'is-loaded'
})


if (!MOBILE) {
  TocHighlighter({
    anchorSelector: 'article .anchor',
    tocSelector: 'aside.sidebar .toc a',
    className: 'is-active',
    offy: 100
  })


  const scroll = new SmoothScroll('a[href*="#"]', {
    ignore: '[data-scroll-ignore]',
    speed: 300,
    easing: 'easeInOutQuad'
  })

  Gallery({
    class: 'gallery'
  })

  Footnotes({ offy: -80 + 5 })

  RemoteDescription({
    selector: '.preview-project-infos',
    container: 'aside.outside'
  })

  Zoom(document.querySelectorAll('article img'), {
    background: '#FFF',
    margin: 10,
    scrollOffset: 1
  })
}
