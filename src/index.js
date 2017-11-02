'use strict'

import MOBILE from './js/is-mobile'
import Blazy from 'blazy'
import Zoom from 'medium-zoom'
import TocHighlighter from './components/toc'
import Footnotes from './components/footnotes'

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

  Footnotes({ offy: -80 + 5 })

  Zoom(document.querySelectorAll('article img'), {
    background: '#FFF',
    margin: 10,
    scrollOffset: 1
  })
}
