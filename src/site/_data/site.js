// If Netlify's CONTEXT env var says this is production,
// we're deploying to the public site. All other cases
// (preview, local dev, etc.) are considered non-production
const isProduction = process.env['CONTEXT'] === 'production';

// Figure out our base URL from (in order of
// priority):
// - Netlify env var (URL for prod, or else DEPLOY_PRIME_URL)
// - local dev URL
const siteUrl = (isProduction ? process.env['URL'] : process.env['DEPLOY_PRIME_URL']) || 'http://localhost:8080'



module.exports = {
  url: siteUrl,

  isProduction,
};
