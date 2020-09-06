const { monthName, urlMonth } = require('../../utils/date-formatter');

module.exports = {
  permalink: "/blog/{{ blogPosts.year }}/index.html",
  layout: "blog-archive-page.njk",
  priority: 0.3,

  pagination: {
    data: "collections.blog",
    size: 1,
    addAllPagesToCollections: true,
    before: data => data.reduce((groupedPosts, blogPost) => {
      // Each element in groupedPosts represents a year that had posts

      // Get year & month of the current blogPost
      const postDate = new Date(blogPost.date);
      const year = postDate.getUTCFullYear();
      const month = postDate.getUTCMonth();

      // Do we already have a postsGroup for this year?
      let postsGroup = groupedPosts.find(group => group.year === year);
      if (postsGroup === undefined) {
        // If not, add an empty one
        postsGroup = {
          year,
          count: 0,
          groups: [],
        };
        groupedPosts.push(postsGroup);
      }

      // Does it have a sub-group for this post's month?
      let postsSubGroup = postsGroup.groups.find(subGroup => subGroup.id === month);
      if (postsSubGroup === undefined) {
        // If not, add an empty one
        postsSubGroup = {
          id: month,
          title: `${monthName(month)} ${year}`,
          count: 0,
          url: `./${urlMonth(month)}/`,
          posts: [],
        };
        postsGroup.groups.push(postsSubGroup);
      }

      // Add current post to the sub group
      postsSubGroup.posts.push(blogPost);
      postsSubGroup.count++;
      postsGroup.count++;

      return groupedPosts;
    }, []),
    alias: 'blogPosts',
  },

  eleventyComputed: {
    title: (data) => `Blog posts from ${ data.blogPosts.year }`,
    description: (data) => `Listing of all blog posts from ${ data.blogPosts.year } in chronological order.`,

    eleventyNavigation: (data) => ({
      key: `Blog-${ data.blogPosts.year }`,
      order: data.pagination.pageNumber + 1, // we use 0 for "collections"
      title: data.title,
      parent: `Blog`
    }),
  },
};
