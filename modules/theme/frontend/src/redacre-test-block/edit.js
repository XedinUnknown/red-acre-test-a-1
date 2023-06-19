const React = require('react')
const Editor = require('@wordpress/block-editor')

module.exports = function () {
  const attrs = Editor.useBlockProps()
  return (<div {...attrs}>Could there be some content here?</div>);
}
