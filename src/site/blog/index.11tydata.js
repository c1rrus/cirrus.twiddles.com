const { year } = require('../../utils/date-formatter');

module.exports = {

  eleventyComputed: {
    /*
      [ { year, postCount, url } ]
    */
    postYears: (data) => {
      let lastEncounteredYear;
      return data.collections.blog.reduce((postYears, blogEntry) => {
        const currentYear = year(blogEntry.date);
        if (currentYear !== lastEncounteredYear) {
          // We have encountered a new year

          // If we skipped some intervening years, we need to generate empty entries for them
          if ((currentYear-1) !== lastEncounteredYear) {
            for (let gapYear = (lastEncounteredYear+1); gapYear < currentYear; ++gapYear) {
              postYears.push({
                year: gapYear,
                postCount: 0,
              });
            }
          }

          // Append entry for this year
          postYears.push({
            year: currentYear,
            postCount: 1,
            url: `./${currentYear}/`,
          })

          // Update lastEncounteredYear for next iteration
          lastEncounteredYear = currentYear;
        }
        else {
          // Same year as previous, post so just increment post count
          const yearEntry = postYears[postYears.length - 1];
          yearEntry.postCount++;
        }

        return postYears;
      }, []);
    }
  }
};
