const Blocks = require('@wordpress/blocks')
const BlockDef = require('../../blocks/redacre-test-block.json')
const Edit = require('./redacre-test-block/edit')
const Save = require('./redacre-test-block/save')

const settings = {
  ...BlockDef,
  edit: Edit,
  save: Save,
};
Blocks.registerBlockType(BlockDef.name, settings)
