module.exports = {

  eleventyComputed: {
    keywords: data => {
      const deduped = new Set(['symbian', 'mwc', 'mobile world congress', 'mobile', 'smartphone']);
      if (data.keywords) {
        data.keywords.forEach(keyword => deduped.add(keyword));
      }
      return Array.from(deduped);
    }
  }
};
