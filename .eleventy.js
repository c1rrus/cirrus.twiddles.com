const eleventyNavigationPlugin = require("@11ty/eleventy-navigation");

module.exports = function(eleventyConfig) {

  eleventyConfig.addPassthroughCopy("src/site/**/*.{xml,css,ico,jpg,gif,png,rdf}");
  eleventyConfig.addPassthroughCopy({"src/assets": "/"});

  eleventyConfig.addPlugin(eleventyNavigationPlugin);

  return {
    dir: {
      input: 'src/site',
      output: 'dist',

      includes: '_templates',
      data: '_data',
    },
  };
};
