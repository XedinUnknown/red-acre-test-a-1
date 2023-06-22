const React = require('react')
const Editor = require('@wordpress/block-editor')

module.exports = function () {
  const attrs = Editor.useBlockProps.save()
  return (<div {...attrs}>Some other content, perhaps...</div>);
}
