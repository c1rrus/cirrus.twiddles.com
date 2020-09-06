module.exports = {
  eleventyComputed: {
    // Prevent page 2 & onwards from being indexed.
    robots: (data) => {
      if (data.pagination && data.pagination.pageNumber > 0) {
        return {
          noindex: true,
        };
      }
    },
  }
}
