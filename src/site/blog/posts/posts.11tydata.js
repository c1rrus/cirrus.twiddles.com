function collectionItemIndex(collection, itemUrl) {
  return collection.findIndex(colItem => colItem.url === itemUrl);
}

module.exports = {
  title: 'untitled',
  permalink: "/blog/{{ page.date | date: '%Y/%m/%d' }}/{{ title | slug }}/index.html",
  tags: ['blog'],
  layout: 'blog-post.njk',

  eleventyComputed: {
    prevPost: (data) => {
      const currentPostIndex = collectionItemIndex(data.collections.blog, data.page.url);
      if (currentPostIndex !== -1 && currentPostIndex > 0) {
        // i.e. we are not the oldest post
        return data.collections.blog[currentPostIndex - 1];
      }
    },

    nextPost: (data) => {
      const currentPostIndex = collectionItemIndex(data.collections.blog, data.page.url);
      if (currentPostIndex !== -1 && currentPostIndex < (data.collections.blog.length - 1)) {
        // i.e. we are not the most recent post
        return data.collections.blog[currentPostIndex + 1];
      }
    },
  },
};
