// Workaround for 11ty bug (?), where parent dir's computed data is
// not executed.
const postsComputedData = require('../posts.11tydata').eleventyComputed;

module.exports = {

  eleventyComputed: {
    ...postsComputedData,

    keywords: data => {
      const deduped = new Set(['symbian', 'mwc', 'mobile world congress', 'mobile', 'smartphone']);
      if (data.keywords) {
        data.keywords.forEach(keyword => deduped.add(keyword));
      }
      return Array.from(deduped);
    }
  }
};
