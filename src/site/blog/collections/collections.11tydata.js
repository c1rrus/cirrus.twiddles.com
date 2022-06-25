const { collectionItemIndex } = require('../../../utils/collection-utils');

module.exports = {
  layout: 'blog-collection.njk',

  eleventyComputed: {
    eleventyNavigation: data => {
      if (data.eleventyNavigation) {
        return data.eleventyNavigation;
      }
      else {
        const index = collectionItemIndex(data.collections.blogCollections, data.page.url);
        return {
          key: `Blog-Collection-${index}`,
          order: index,
          parent: 'Blog-Collections',
          title: data.title,
        };
      }
    },
  }
};
