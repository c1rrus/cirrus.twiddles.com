// Figure out our base URL from (in order of
// priority):
// - Netlify env var (DEPLOY_PRIME_URL)
// - local dev URL
const siteUrl = process.env['DEPLOY_PRIME_URL'] || 'http://localhost:8080'

module.exports = {
  url: siteUrl
};
