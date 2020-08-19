const { monthName, weekdayName, urlMonth, urlDay } = require('../../utils/date-formatter');

module.exports = {
  permalink: "/blog/{{ blogPosts.year }}/{{ blogPosts.urlMonth }}/index.html",
  layout: "blog-archive-page.njk",
  priority: 0.2,

  pagination: {
    data: "collections.blog",
    size: 1,
    addAllPagesToCollections: true,
    before: data => data.reduce((groupedPosts, blogPost) => {
      // Each element in groupedPosts represents a month that had posts

      // Get year, month and day of the current blogPost
      const postDate = new Date(blogPost.date);
      const year = postDate.getUTCFullYear();
      const month = postDate.getUTCMonth();
      const day = postDate.getUTCDate();
      const weekDay = postDate.getDay();

      // Do we already have a postsGroup for this month?
      let postsGroup = groupedPosts.find(group => (group.year === year && group.month === month));
      if (postsGroup === undefined) {
        // If not, add an empty one
        postsGroup = {
          year,
          month,
          urlMonth: urlMonth(month),
          count: 0,
          groups: [],
        };
        groupedPosts.push(postsGroup);
      }

      // Does it have a sub-group for this day?
      let postsSubGroup = postsGroup.groups.find(subGroup => subGroup.id === day);
      if (postsSubGroup === undefined) {
        // If not, add an empty one
        postsSubGroup = {
          id: day,
          title: `${weekdayName(weekDay)}, ${day}. ${monthName(month)} ${year}`,
          count: 0,
          url: `./${urlDay(day)}/`,
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
    title: (data) =>  `Blog posts from ${ monthName(data.blogPosts.month) } ${ data.blogPosts.year }`,
    description: (data) => `Listing of all blog posts from ${ monthName(data.blogPosts.month) } ${ data.blogPosts.year } in chronological order.`,

    eleventyNavigation: (data) => ({
      key: `Blog-${ data.blogPosts.year }-${ urlMonth(data.blogPosts.month) }`,
      order: data.pagination.pageNumber,
      title: data.title,
      parent: `Blog-${ data.blogPosts.year }`,
    }),
  },
};
