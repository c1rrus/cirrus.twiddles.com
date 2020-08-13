const eleventyNavigationPlugin = require("@11ty/eleventy-navigation");
const pluginRss = require("@11ty/eleventy-plugin-rss");

const dateFormatter = require('./src/utils/date-formatter');

module.exports = function(eleventyConfig) {

  eleventyConfig.addPassthroughCopy("src/site/**/*.{xml,css,ico,jpg,gif,png,rdf}");
  eleventyConfig.addPassthroughCopy({"src/assets": "/"});

  eleventyConfig.addPlugin(eleventyNavigationPlugin);
  eleventyConfig.addPlugin(pluginRss);

  eleventyConfig.addShortcode('humanDate', dateFormatter.humanUTCDate);

  eleventyConfig.addFilter('monthDay', dateFormatter.monthDay);
  eleventyConfig.addFilter('monthName', dateFormatter.monthName);
  eleventyConfig.addFilter('weekdayName', dateFormatter.weekdayName);
  eleventyConfig.addFilter('year', dateFormatter.year);

  return {
    dir: {
      input: 'src/site',
      output: 'dist',

      includes: '_templates',
      data: '_data',
    },
  };
};
