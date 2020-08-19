const { year, urlMonth, urlDay } = require('../../../utils/date-formatter');

function collectionItemIndex(collection, itemUrl) {
  return collection.findIndex(colItem => colItem.url === itemUrl);
}

module.exports = {
  title: 'untitled',
  permalink: "/blog/{{ page.date | date: '%Y/%m/%d' }}/{{ slug or title | slug }}/index.html",
  tags: ['blog'],
  layout: 'blog-post.njk',
  priority: 0.9,
  // changeFreq: 'monthly',

  eleventyComputed: {
    description: (data) => data.description || data.summary,

    eleventyNavigation: (data) => {
      const index = collectionItemIndex(data.collections.blog, data.page.url);
      return {
        key: `Blog-post-${ index }`,
        order: index,
        title: data.title,
        parent: `Blog-${ year(data.date) }-${ urlMonth(data.date) }-${ urlDay(data.date) }`,
      };
    },

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
