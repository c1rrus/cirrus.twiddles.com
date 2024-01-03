// Workaround for 11ty bug (?), where parent dir's computed data is
// not executed.
const postsComputedData = require('../medium.11tydata').eleventyComputed;

module.exports = {
  tags: [
    'blog',
    'buildit'
  ],

  eleventyComputed: {
    ...postsComputedData,

    keywords: data => {
      const deduped = new Set(['buildit', 'wipro digital']);
      if (data.keywords) {
        data.keywords.forEach(keyword => deduped.add(keyword));
      }
      return Array.from(deduped);
    }
  }
};
