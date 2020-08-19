const { humanUTCDate, urlMonth, urlDay } = require('../../utils/date-formatter');

module.exports = {
  permalink: "/blog/{{ blogPosts.year }}/{{ blogPosts.urlMonth }}/{{ blogPosts.urlDay }}/index.html",
  layout: "blog-archive-page.njk",
  priority: 0.1,

  pagination: {
    data: "collections.blog",
    size: 1,
    addAllPagesToCollections: true,
    before: data => data.reduce((groupedPosts, blogPost) => {
      // Each element in groupedPosts represents a day that had posts

      // Get year, month and day of the current blogPost
      const postDate = new Date(blogPost.date);
      const year = postDate.getUTCFullYear();
      const month = postDate.getUTCMonth();
      const day = postDate.getUTCDate();

      // Do we already have a postsGroup for this day?
      let postsGroup = groupedPosts.find(group => (group.year === year && group.month === month && group.day === day));
      if (postsGroup === undefined) {
        // If not, add an empty one
        postsGroup = {
          date: postDate,
          year,
          month,
          day,
          urlMonth: urlMonth(month),
          urlDay: urlDay(day),
          count: 0,

          // No sub groups here
          posts: [],
        };
        groupedPosts.push(postsGroup);
      }

      postsGroup.posts.push(blogPost);
      postsGroup.count++;

      return groupedPosts;
    }, []),
    alias: 'blogPosts',
  },

  eleventyComputed: {
    title: (data) => `Blog posts from ${ humanUTCDate(data.blogPosts.date) }`,
    description: (data) => `Listing of all blog posts from ${ humanUTCDate(data.blogPosts.date) } in chronological order.`,

    eleventyNavigation: (data) => ({
      key: `Blog-${ data.blogPosts.year }-${ urlMonth(data.blogPosts.month) }-${ urlDay(data.blogPosts.day) }`,
      order: data.pagination.pageNumber,
      title: data.title,
      parent: `Blog-${ data.blogPosts.year }-${ urlMonth(data.blogPosts.month) }`,
    }),
  },

};
